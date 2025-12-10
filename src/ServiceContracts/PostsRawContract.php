<?php

declare(strict_types=1);

namespace SDKAbuAPI\ServiceContracts;

use SDKAbuAPI\Core\Contracts\BaseResponse;
use SDKAbuAPI\Core\Exceptions\APIException;
use SDKAbuAPI\Posts\Post;
use SDKAbuAPI\Posts\PostCreateParams;
use SDKAbuAPI\Posts\PostListParams;
use SDKAbuAPI\Posts\PostPartialUpdateParams;
use SDKAbuAPI\Posts\PostUpdateParams;
use SDKAbuAPI\RequestOptions;

interface PostsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|PostCreateParams $params
     *
     * @return BaseResponse<Post>
     *
     * @throws APIException
     */
    public function create(
        array|PostCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $id Post ID
     *
     * @return BaseResponse<Post>
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $id Post ID
     * @param array<mixed>|PostUpdateParams $params
     *
     * @return BaseResponse<Post>
     *
     * @throws APIException
     */
    public function update(
        int $id,
        array|PostUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PostListParams $params
     *
     * @return BaseResponse<list<Post>>
     *
     * @throws APIException
     */
    public function list(
        array|PostListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $id Post ID
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $id Post ID
     * @param array<mixed>|PostPartialUpdateParams $params
     *
     * @return BaseResponse<Post>
     *
     * @throws APIException
     */
    public function partialUpdate(
        int $id,
        array|PostPartialUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
