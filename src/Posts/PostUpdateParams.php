<?php

declare(strict_types=1);

namespace SDKAbuAPI\Posts;

use SDKAbuAPI\Core\Attributes\Optional;
use SDKAbuAPI\Core\Concerns\SdkModel;
use SDKAbuAPI\Core\Concerns\SdkParams;
use SDKAbuAPI\Core\Contracts\BaseModel;

/**
 * Update post.
 *
 * @see SDKAbuAPI\Services\PostsService::update()
 *
 * @phpstan-type PostUpdateParamsShape = array{
 *   content?: string, title?: string, userID?: int
 * }
 */
final class PostUpdateParams implements BaseModel
{
    /** @use SdkModel<PostUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $content;

    #[Optional]
    public ?string $title;

    #[Optional('user_id')]
    public ?int $userID;

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
        ?string $content = null,
        ?string $title = null,
        ?int $userID = null
    ): self {
        $self = new self;

        null !== $content && $self['content'] = $content;
        null !== $title && $self['title'] = $title;
        null !== $userID && $self['userID'] = $userID;

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
