<?php

declare(strict_types=1);

namespace SDKAbuAPI\ServiceContracts;

use SDKAbuAPI\Core\Exceptions\APIException;
use SDKAbuAPI\Posts\Post;
use SDKAbuAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKAbuAPI\RequestOptions
 */
interface PostsContract
{
    /**
     * @api
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
    ): Post;

    /**
     * @api
     *
     * @param int $id Post ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): Post;

    /**
     * @api
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
    ): Post;

    /**
     * @api
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
    ): array;

    /**
     * @api
     *
     * @param int $id Post ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
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
    ): Post;
}
