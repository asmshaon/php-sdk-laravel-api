<?php

declare(strict_types=1);

namespace SDKAbuAPI\Users;

use SDKAbuAPI\Core\Attributes\Optional;
use SDKAbuAPI\Core\Attributes\Required;
use SDKAbuAPI\Core\Concerns\SdkModel;
use SDKAbuAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type UserShape = array{
 *   id: int,
 *   email: string,
 *   name: string,
 *   created_at?: \DateTimeInterface|null,
 *   email_verified_at?: \DateTimeInterface|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class User implements BaseModel
{
    /** @use SdkModel<UserShape> */
    use SdkModel;

    #[Required]
    public int $id;

    #[Required]
    public string $email;

    #[Required]
    public string $name;

    #[Optional]
    public ?\DateTimeInterface $created_at;

    #[Optional(nullable: true)]
    public ?\DateTimeInterface $email_verified_at;

    #[Optional]
    public ?\DateTimeInterface $updated_at;

    /**
     * `new User()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * User::with(id: ..., email: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new User)->withID(...)->withEmail(...)->withName(...)
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
        int $id,
        string $email,
        string $name,
        ?\DateTimeInterface $created_at = null,
        ?\DateTimeInterface $email_verified_at = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['email'] = $email;
        $obj['name'] = $name;

        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $email_verified_at && $obj['email_verified_at'] = $email_verified_at;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    public function withEmailVerifiedAt(
        ?\DateTimeInterface $emailVerifiedAt
    ): self {
        $obj = clone $this;
        $obj['email_verified_at'] = $emailVerifiedAt;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
