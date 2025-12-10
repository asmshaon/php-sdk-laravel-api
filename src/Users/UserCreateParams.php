<?php

declare(strict_types=1);

namespace SDKAbuAPI\Users;

use SDKAbuAPI\Core\Attributes\Required;
use SDKAbuAPI\Core\Concerns\SdkModel;
use SDKAbuAPI\Core\Concerns\SdkParams;
use SDKAbuAPI\Core\Contracts\BaseModel;

/**
 * Create a new user.
 *
 * @see SDKAbuAPI\Services\UsersService::create()
 *
 * @phpstan-type UserCreateParamsShape = array{
 *   email: string, name: string, password: string
 * }
 */
final class UserCreateParams implements BaseModel
{
    /** @use SdkModel<UserCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $email;

    #[Required]
    public string $name;

    #[Required]
    public string $password;

    /**
     * `new UserCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserCreateParams::with(email: ..., name: ..., password: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserCreateParams)->withEmail(...)->withName(...)->withPassword(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $email,
        string $name,
        string $password
    ): self {
        $self = new self;

        $self['email'] = $email;
        $self['name'] = $name;
        $self['password'] = $password;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }
}
