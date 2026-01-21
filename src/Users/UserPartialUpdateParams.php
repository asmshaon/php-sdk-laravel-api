<?php

declare(strict_types=1);

namespace SDKAbuAPI\Users;

use SDKAbuAPI\Core\Attributes\Optional;
use SDKAbuAPI\Core\Concerns\SdkModel;
use SDKAbuAPI\Core\Concerns\SdkParams;
use SDKAbuAPI\Core\Contracts\BaseModel;

/**
 * Partially update user.
 *
 * @see SDKAbuAPI\Services\UsersService::partialUpdate()
 *
 * @phpstan-type UserPartialUpdateParamsShape = array{
 *   email?: string|null, name?: string|null
 * }
 */
final class UserPartialUpdateParams implements BaseModel
{
    /** @use SdkModel<UserPartialUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $email;

    #[Optional]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $email = null, ?string $name = null): self
    {
        $self = new self;

        null !== $email && $self['email'] = $email;
        null !== $name && $self['name'] = $name;

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
}
