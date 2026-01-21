<?php

declare(strict_types=1);

namespace SDKAbuAPI\Posts;

use SDKAbuAPI\Core\Attributes\Required;
use SDKAbuAPI\Core\Concerns\SdkModel;
use SDKAbuAPI\Core\Concerns\SdkParams;
use SDKAbuAPI\Core\Contracts\BaseModel;

/**
 * Create a new post.
 *
 * @see SDKAbuAPI\Services\PostsService::create()
 *
 * @phpstan-type PostCreateParamsShape = array{
 *   content: string, title: string, userID: int
 * }
 */
final class PostCreateParams implements BaseModel
{
    /** @use SdkModel<PostCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $content;

    #[Required]
    public string $title;

    #[Required('user_id')]
    public int $userID;

    /**
     * `new PostCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostCreateParams::with(content: ..., title: ..., userID: ...)
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
        int $userID
    ): self {
        $self = new self;

        $self['content'] = $content;
        $self['title'] = $title;
        $self['userID'] = $userID;

        return $self;
    }

    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
