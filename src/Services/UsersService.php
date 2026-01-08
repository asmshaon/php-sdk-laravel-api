<?php

declare(strict_types=1);

namespace SDKAbuAPI\Services;

use SDKAbuAPI\Client;
use SDKAbuAPI\Core\Exceptions\APIException;
use SDKAbuAPI\Core\Util;
use SDKAbuAPI\RequestOptions;
use SDKAbuAPI\ServiceContracts\UsersContract;
use SDKAbuAPI\Users\User;

/**
 * @phpstan-import-type RequestOpts from \SDKAbuAPI\RequestOptions
 */
final class UsersService implements UsersContract
{
    /**
     * @api
     */
    public UsersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UsersRawService($client);
    }

    /**
     * @api
     *
     * Create a new user
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
    ): User {
        $params = Util::removeNulls(
            ['email' => $email, 'name' => $name, 'password' => $password]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get user by ID
     *
     * @param int $id User ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): User {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update user
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
    ): User {
        $params = Util::removeNulls(
            ['email' => $email, 'name' => $name, 'password' => $password]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all users
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<User>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete user
     *
     * @param int $id User ID
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
     * Partially update user
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
    ): User {
        $params = Util::removeNulls(['email' => $email, 'name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->partialUpdate($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
