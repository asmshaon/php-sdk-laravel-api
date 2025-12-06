<?php

declare(strict_types=1);

namespace SDKAbuAPI\Posts;

use SDKAbuAPI\Core\Attributes\Api;
use SDKAbuAPI\Core\Concerns\SdkModel;
use SDKAbuAPI\Core\Concerns\SdkParams;
use SDKAbuAPI\Core\Contracts\BaseModel;

/**
 * Create a new post.
 *
 * @see SDKAbuAPI\Services\PostsService::create()
 *
 * @phpstan-type PostCreateParamsShape = array{
 *   content: string, title: string, user_id: int
 * }
 */
final class PostCreateParams implements BaseModel
{
    /** @use SdkModel<PostCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $content;

    #[Api]
    public string $title;

    #[Api]
    public int $user_id;

    /**
     * `new PostCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostCreateParams::with(content: ..., title: ..., user_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostCreateParams)->withContent(...)->withTitle(...)->withUserID(...)
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
        string $content,
        string $title,
        int $user_id
    ): self {
        $obj = new self;

        $obj['content'] = $content;
        $obj['title'] = $title;
        $obj['user_id'] = $user_id;

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
        $obj['user_id'] = $userID;

        return $obj;
    }
}
