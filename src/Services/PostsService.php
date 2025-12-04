<?php

declare(strict_types=1);

namespace SDKAbuAPI\Services;

use SDKAbuAPI\Client;
use SDKAbuAPI\Core\Conversion\ListOf;
use SDKAbuAPI\Core\Exceptions\APIException;
use SDKAbuAPI\Posts\Post;
use SDKAbuAPI\Posts\PostCreateParams;
use SDKAbuAPI\Posts\PostListParams;
use SDKAbuAPI\Posts\PostPartialUpdateParams;
use SDKAbuAPI\Posts\PostUpdateParams;
use SDKAbuAPI\RequestOptions;
use SDKAbuAPI\ServiceContracts\PostsContract;

final class PostsService implements PostsContract
{
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
     *   content: string, title: string, user_id: int
     * }|PostCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PostCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): Post {
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
     * @throws APIException
     */
    public function retrieve(
        int $id,
        ?RequestOptions $requestOptions = null
    ): Post {
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
     * @param array{
     *   content?: string, title?: string, user_id?: int
     * }|PostUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $id,
        array|PostUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Post {
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
     * @param array{user_id?: int}|PostListParams $params
     *
     * @return list<Post>
     *
     * @throws APIException
     */
    public function list(
        array|PostListParams $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = PostListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'posts',
            query: $parsed,
            options: $options,
            convert: new ListOf(Post::class),
        );
    }

    /**
     * @api
     *
     * Delete post
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
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
     * @param array{content?: string, title?: string}|PostPartialUpdateParams $params
     *
     * @throws APIException
     */
    public function partialUpdate(
        int $id,
        array|PostPartialUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Post {
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
