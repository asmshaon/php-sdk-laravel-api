<?php

declare(strict_types=1);

namespace SDKAbuAPI\Posts;

use SDKAbuAPI\Core\Attributes\Api;
use SDKAbuAPI\Core\Concerns\SdkModel;
use SDKAbuAPI\Core\Concerns\SdkParams;
use SDKAbuAPI\Core\Contracts\BaseModel;

/**
 * Update post.
 *
 * @see SDKAbuAPI\Services\PostsService::update()
 *
 * @phpstan-type PostUpdateParamsShape = array{
 *   content?: string, title?: string, user_id?: int
 * }
 */
final class PostUpdateParams implements BaseModel
{
    /** @use SdkModel<PostUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $content;

    #[Api(optional: true)]
    public ?string $title;

    #[Api(optional: true)]
    public ?int $user_id;

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
        ?int $user_id = null
    ): self {
        $obj = new self;

        null !== $content && $obj['content'] = $content;
        null !== $title && $obj['title'] = $title;
        null !== $user_id && $obj['user_id'] = $user_id;

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
