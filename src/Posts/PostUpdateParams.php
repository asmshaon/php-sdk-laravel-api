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
        $obj = new self;

        null !== $content && $obj['content'] = $content;
        null !== $title && $obj['title'] = $title;
        null !== $userID && $obj['userID'] = $userID;

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
}
