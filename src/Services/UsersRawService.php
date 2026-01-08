<?php

declare(strict_types=1);

namespace SDKAbuAPI\Services;

use SDKAbuAPI\Client;
use SDKAbuAPI\Core\Contracts\BaseResponse;
use SDKAbuAPI\Core\Conversion\ListOf;
use SDKAbuAPI\Core\Exceptions\APIException;
use SDKAbuAPI\RequestOptions;
use SDKAbuAPI\ServiceContracts\UsersRawContract;
use SDKAbuAPI\Users\User;
use SDKAbuAPI\Users\UserCreateParams;
use SDKAbuAPI\Users\UserPartialUpdateParams;
use SDKAbuAPI\Users\UserUpdateParams;

/**
 * @phpstan-import-type RequestOpts from \SDKAbuAPI\RequestOptions
 */
final class UsersRawService implements UsersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new user
     *
     * @param array{
     *   email: string, name: string, password: string
     * }|UserCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<User>
     *
     * @throws APIException
     */
    public function create(
        array|UserCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'users',
            body: (object) $parsed,
            options: $options,
            convert: User::class,
        );
    }

    /**
     * @api
     *
     * Get user by ID
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['users/%1$s', $id],
            options: $requestOptions,
            convert: User::class,
        );
    }

    /**
     * @api
     *
     * Update user
     *
     * @param int $id User ID
     * @param array{
     *   email?: string, name?: string, password?: string
     * }|UserUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = UserUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['users/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: User::class,
        );
    }

    /**
     * @api
     *
     * Get all users
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<User>>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'users',
            options: $requestOptions,
            convert: new ListOf(User::class),
        );
    }

    /**
     * @api
     *
     * Delete user
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['users/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Partially update user
     *
     * @param int $id User ID
     * @param array{email?: string, name?: string}|UserPartialUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = UserPartialUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['users/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: User::class,
        );
    }
}
