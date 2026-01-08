<?php

declare(strict_types=1);

namespace SDKAbuAPI\ServiceContracts;

use SDKAbuAPI\Core\Exceptions\APIException;
use SDKAbuAPI\RequestOptions;
use SDKAbuAPI\Users\User;

/**
 * @phpstan-import-type RequestOpts from \SDKAbuAPI\RequestOptions
 */
interface UsersContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $email,
        string $name,
        string $password,
        RequestOptions|array|null $requestOptions = null,
    ): User;

    /**
     * @api
     *
     * @param int $id User ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): User;

    /**
     * @api
     *
     * @param int $id User ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $id,
        ?string $email = null,
        ?string $name = null,
        ?string $password = null,
        RequestOptions|array|null $requestOptions = null,
    ): User;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<User>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param int $id User ID
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
     * @param int $id User ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function partialUpdate(
        int $id,
        ?string $email = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): User;
}
