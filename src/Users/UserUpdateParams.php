<?php

declare(strict_types=1);

namespace SDKAbuAPI\Users;

use SDKAbuAPI\Core\Attributes\Optional;
use SDKAbuAPI\Core\Concerns\SdkModel;
use SDKAbuAPI\Core\Concerns\SdkParams;
use SDKAbuAPI\Core\Contracts\BaseModel;

/**
 * Update user.
 *
 * @see SDKAbuAPI\Services\UsersService::update()
 *
 * @phpstan-type UserUpdateParamsShape = array{
 *   email?: string, name?: string, password?: string
 * }
 */
final class UserUpdateParams implements BaseModel
{
    /** @use SdkModel<UserUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $email;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $password;

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
        ?string $email = null,
        ?string $name = null,
        ?string $password = null
    ): self {
        $self = new self;

        null !== $email && $self['email'] = $email;
        null !== $name && $self['name'] = $name;
        null !== $password && $self['password'] = $password;

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
