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

/**
 * @phpstan-import-type RequestOpts from \SDKAbuAPI\RequestOptions
 */
interface PostsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PostCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Post>
     *
     * @throws APIException
     */
    public function create(
        array|PostCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $id Post ID
     * @param array<string,mixed>|PostUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PostListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Post>>
     *
     * @throws APIException
     */
    public function list(
        array|PostListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $id Post ID
     * @param array<string,mixed>|PostPartialUpdateParams $params
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
    ): BaseResponse;
}
