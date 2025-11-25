<?php

declare(strict_types=1);

namespace SDKAbuAPI\Posts;

use SDKAbuAPI\Core\Attributes\Api;
use SDKAbuAPI\Core\Concerns\SdkModel;
use SDKAbuAPI\Core\Concerns\SdkResponse;
use SDKAbuAPI\Core\Contracts\BaseModel;
use SDKAbuAPI\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type PostShape = array{
 *   id: int,
 *   content: string,
 *   title: string,
 *   user_id: int,
 *   created_at?: \DateTimeInterface|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class Post implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PostShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public int $id;

    #[Api]
    public string $content;

    #[Api]
    public string $title;

    #[Api]
    public int $user_id;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    /**
     * `new Post()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Post::with(id: ..., content: ..., title: ..., user_id: ...)
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
        int $user_id,
        ?\DateTimeInterface $created_at = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->content = $content;
        $obj->title = $title;
        $obj->user_id = $user_id;

        null !== $created_at && $obj->created_at = $created_at;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withContent(string $content): self
    {
        $obj = clone $this;
        $obj->content = $content;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }

    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj->user_id = $userID;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
