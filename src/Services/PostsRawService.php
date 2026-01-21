<?php

declare(strict_types=1);

namespace SDKAbuAPI\Services;

use SDKAbuAPI\Client;
use SDKAbuAPI\Core\Contracts\BaseResponse;
use SDKAbuAPI\Core\Conversion\ListOf;
use SDKAbuAPI\Core\Exceptions\APIException;
use SDKAbuAPI\Core\Util;
use SDKAbuAPI\Posts\Post;
use SDKAbuAPI\Posts\PostCreateParams;
use SDKAbuAPI\Posts\PostListParams;
use SDKAbuAPI\Posts\PostPartialUpdateParams;
use SDKAbuAPI\Posts\PostUpdateParams;
use SDKAbuAPI\RequestOptions;
use SDKAbuAPI\ServiceContracts\PostsRawContract;

/**
 * @phpstan-import-type RequestOpts from \SDKAbuAPI\RequestOptions
 */
final class PostsRawService implements PostsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new post
     *
     * @param array{
     *   content: string, title: string, userID: int
     * }|PostCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Post>
     *
     * @throws APIException
     */
    public function create(
        array|PostCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PostCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'posts',
            body: (object) $parsed,
            options: $options,
            convert: Post::class,
        );
    }

    /**
     * @api
     *
     * Get post by ID
     *
     * @param int $id Post ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Post>
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['posts/%1$s', $id],
            options: $requestOptions,
            convert: Post::class,
        );
    }

    /**
     * @api
     *
     * Update post
     *
     * @param int $id Post ID
     * @param array{
     *   content?: string, title?: string, userID?: int
     * }|PostUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Post>
     *
     * @throws APIException
     */
    public function update(
        int $id,
        array|PostUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PostUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['posts/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: Post::class,
        );
    }

    /**
     * @api
     *
     * Get all posts
     *
     * @param array{userID?: int}|PostListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Post>>
     *
     * @throws APIException
     */
    public function list(
        array|PostListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PostListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'posts',
            query: Util::array_transform_keys($parsed, ['userID' => 'user_id']),
            options: $options,
            convert: new ListOf(Post::class),
        );
    }

    /**
     * @api
     *
     * Delete post
     *
     * @param int $id Post ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['posts/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Partially update post
     *
     * @param int $id Post ID
     * @param array{content?: string, title?: string}|PostPartialUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Post>
     *
     * @throws APIException
     */
    public function partialUpdate(
        int $id,
        array|PostPartialUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PostPartialUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['posts/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: Post::class,
        );
    }
}
