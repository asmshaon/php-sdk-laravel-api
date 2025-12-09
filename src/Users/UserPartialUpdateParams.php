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
 *   email?: string, name?: string
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
        $obj = new self;

        null !== $email && $obj['email'] = $email;
        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
