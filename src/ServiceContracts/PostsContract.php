<?php

declare(strict_types=1);

namespace SDKAbuAPI\ServiceContracts;

use SDKAbuAPI\Core\Exceptions\APIException;
use SDKAbuAPI\Posts\Post;
use SDKAbuAPI\Posts\PostCreateParams;
use SDKAbuAPI\Posts\PostListParams;
use SDKAbuAPI\Posts\PostPartialUpdateParams;
use SDKAbuAPI\Posts\PostUpdateParams;
use SDKAbuAPI\RequestOptions;

interface PostsContract
{
    /**
     * @api
     *
     * @param array<mixed>|PostCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PostCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): Post;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        ?RequestOptions $requestOptions = null
    ): Post;

    /**
     * @api
     *
     * @param array<mixed>|PostUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $id,
        array|PostUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Post;

    /**
     * @api
     *
     * @param array<mixed>|PostListParams $params
     *
     * @return list<Post>
     *
     * @throws APIException
     */
    public function list(
        array|PostListParams $params,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PostPartialUpdateParams $params
     *
     * @throws APIException
     */
    public function partialUpdate(
        int $id,
        array|PostPartialUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Post;
}
