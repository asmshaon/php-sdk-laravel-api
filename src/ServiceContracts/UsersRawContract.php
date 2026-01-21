<?php

declare(strict_types=1);

namespace SDKAbuAPI\ServiceContracts;

use SDKAbuAPI\Core\Contracts\BaseResponse;
use SDKAbuAPI\Core\Exceptions\APIException;
use SDKAbuAPI\RequestOptions;
use SDKAbuAPI\Users\User;
use SDKAbuAPI\Users\UserCreateParams;
use SDKAbuAPI\Users\UserPartialUpdateParams;
use SDKAbuAPI\Users\UserUpdateParams;

/**
 * @phpstan-import-type RequestOpts from \SDKAbuAPI\RequestOptions
 */
interface UsersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|UserCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<User>
     *
     * @throws APIException
     */
    public function create(
        array|UserCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $id User ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<User>
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
     * @param int $id User ID
     * @param array<string,mixed>|UserUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<User>
     *
     * @throws APIException
     */
    public function update(
        int $id,
        array|UserUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<User>>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $id User ID
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
     * @param int $id User ID
     * @param array<string,mixed>|UserPartialUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<User>
     *
     * @throws APIException
     */
    public function partialUpdate(
        int $id,
        array|UserPartialUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
