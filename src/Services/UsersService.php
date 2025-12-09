<?php

declare(strict_types=1);

namespace SDKAbuAPI\Services;

use SDKAbuAPI\Client;
use SDKAbuAPI\Core\Contracts\BaseResponse;
use SDKAbuAPI\Core\Conversion\ListOf;
use SDKAbuAPI\Core\Exceptions\APIException;
use SDKAbuAPI\RequestOptions;
use SDKAbuAPI\ServiceContracts\UsersContract;
use SDKAbuAPI\Users\User;
use SDKAbuAPI\Users\UserCreateParams;
use SDKAbuAPI\Users\UserPartialUpdateParams;
use SDKAbuAPI\Users\UserUpdateParams;

final class UsersService implements UsersContract
{
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
     *
     * @throws APIException
     */
    public function create(
        array|UserCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): User {
        [$parsed, $options] = UserCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<User> */
        $response = $this->client->request(
            method: 'post',
            path: 'users',
            body: (object) $parsed,
            options: $options,
            convert: User::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get user by ID
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        ?RequestOptions $requestOptions = null
    ): User {
        /** @var BaseResponse<User> */
        $response = $this->client->request(
            method: 'get',
            path: ['users/%1$s', $id],
            options: $requestOptions,
            convert: User::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update user
     *
     * @param array{
     *   email?: string, name?: string, password?: string
     * }|UserUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $id,
        array|UserUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): User {
        [$parsed, $options] = UserUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<User> */
        $response = $this->client->request(
            method: 'put',
            path: ['users/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: User::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all users
     *
     * @return list<User>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): array
    {
        /** @var BaseResponse<list<User>> */
        $response = $this->client->request(
            method: 'get',
            path: 'users',
            options: $requestOptions,
            convert: new ListOf(User::class),
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete user
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['users/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Partially update user
     *
     * @param array{email?: string, name?: string}|UserPartialUpdateParams $params
     *
     * @throws APIException
     */
    public function partialUpdate(
        int $id,
        array|UserPartialUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): User {
        [$parsed, $options] = UserPartialUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<User> */
        $response = $this->client->request(
            method: 'patch',
            path: ['users/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: User::class,
        );

        return $response->parse();
    }
}
