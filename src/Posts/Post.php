<?php

declare(strict_types=1);

namespace SDKAbuAPI\Posts;

use SDKAbuAPI\Core\Attributes\Optional;
use SDKAbuAPI\Core\Attributes\Required;
use SDKAbuAPI\Core\Concerns\SdkModel;
use SDKAbuAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type PostShape = array{
 *   id: int,
 *   content: string,
 *   title: string,
 *   userID: int,
 *   createdAt?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Post implements BaseModel
{
    /** @use SdkModel<PostShape> */
    use SdkModel;

    #[Required]
    public int $id;

    #[Required]
    public string $content;

    #[Required]
    public string $title;

    #[Required('user_id')]
    public int $userID;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new Post()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Post::with(id: ..., content: ..., title: ..., userID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Post)->withID(...)->withContent(...)->withTitle(...)->withUserID(...)
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
        string $content,
        string $title,
        int $userID,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['content'] = $content;
        $obj['title'] = $title;
        $obj['userID'] = $userID;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withContent(string $content): self
    {
        $obj = clone $this;
        $obj['content'] = $content;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj['title'] = $title;

        return $obj;
    }

    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
