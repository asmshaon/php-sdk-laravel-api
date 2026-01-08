<?php

declare(strict_types=1);

namespace SDKAbuAPI\Services;

use SDKAbuAPI\Client;
use SDKAbuAPI\Core\Exceptions\APIException;
use SDKAbuAPI\Core\Util;
use SDKAbuAPI\Posts\Post;
use SDKAbuAPI\RequestOptions;
use SDKAbuAPI\ServiceContracts\PostsContract;

/**
 * @phpstan-import-type RequestOpts from \SDKAbuAPI\RequestOptions
 */
final class PostsService implements PostsContract
{
    /**
     * @api
     */
    public PostsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PostsRawService($client);
    }

    /**
     * @api
     *
     * Create a new post
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $content,
        string $title,
        int $userID,
        RequestOptions|array|null $requestOptions = null,
    ): Post {
        $params = Util::removeNulls(
            ['content' => $content, 'title' => $title, 'userID' => $userID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get post by ID
     *
     * @param int $id Post ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): Post {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update post
     *
     * @param int $id Post ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $id,
        ?string $content = null,
        ?string $title = null,
        ?int $userID = null,
        RequestOptions|array|null $requestOptions = null,
    ): Post {
        $params = Util::removeNulls(
            ['content' => $content, 'title' => $title, 'userID' => $userID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all posts
     *
     * @param int $userID Filter posts by user ID
     * @param RequestOpts|null $requestOptions
     *
     * @return list<Post>
     *
     * @throws APIException
     */
    public function list(
        ?int $userID = null,
        RequestOptions|array|null $requestOptions = null
    ): array {
        $params = Util::removeNulls(['userID' => $userID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete post
     *
     * @param int $id Post ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Partially update post
     *
     * @param int $id Post ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function partialUpdate(
        int $id,
        ?string $content = null,
        ?string $title = null,
        RequestOptions|array|null $requestOptions = null,
    ): Post {
        $params = Util::removeNulls(['content' => $content, 'title' => $title]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->partialUpdate($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
