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
 *   createdAt?: \DateTimeInterface|null,
 *   emailVerifiedAt?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
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

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('email_verified_at', nullable: true)]
    public ?\DateTimeInterface $emailVerifiedAt;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

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
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $emailVerifiedAt = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['email'] = $email;
        $self['name'] = $name;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $emailVerifiedAt && $self['emailVerifiedAt'] = $emailVerifiedAt;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withEmailVerifiedAt(
        ?\DateTimeInterface $emailVerifiedAt
    ): self {
        $self = clone $this;
        $self['emailVerifiedAt'] = $emailVerifiedAt;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
