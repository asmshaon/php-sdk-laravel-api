<?php

declare(strict_types=1);

namespace SDKAbuAPI\Posts;

use SDKAbuAPI\Core\Attributes\Optional;
use SDKAbuAPI\Core\Concerns\SdkModel;
use SDKAbuAPI\Core\Concerns\SdkParams;
use SDKAbuAPI\Core\Contracts\BaseModel;

/**
 * Partially update post.
 *
 * @see SDKAbuAPI\Services\PostsService::partialUpdate()
 *
 * @phpstan-type PostPartialUpdateParamsShape = array{
 *   content?: string, title?: string
 * }
 */
final class PostPartialUpdateParams implements BaseModel
{
    /** @use SdkModel<PostPartialUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $content;

    #[Optional]
    public ?string $title;

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
        ?string $title = null
    ): self {
        $obj = new self;

        null !== $content && $obj['content'] = $content;
        null !== $title && $obj['title'] = $title;

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
}
