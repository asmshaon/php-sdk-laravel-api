<?php

declare(strict_types=1);

namespace SDKAbuAPI\ServiceContracts;

use SDKAbuAPI\Core\Exceptions\APIException;
use SDKAbuAPI\RequestOptions;
use SDKAbuAPI\Users\User;
use SDKAbuAPI\Users\UserCreateParams;
use SDKAbuAPI\Users\UserPartialUpdateParams;
use SDKAbuAPI\Users\UserUpdateParams;

interface UsersContract
{
    /**
     * @api
     *
     * @param array<mixed>|UserCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|UserCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): User;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        ?RequestOptions $requestOptions = null
    ): User;

    /**
     * @api
     *
     * @param array<mixed>|UserUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $id,
        array|UserUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): User;

    /**
     * @api
     *
     * @return list<User>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): array;

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
     * @param array<mixed>|UserPartialUpdateParams $params
     *
     * @throws APIException
     */
    public function partialUpdate(
        int $id,
        array|UserPartialUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): User;
}
