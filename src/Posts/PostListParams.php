<?php

declare(strict_types=1);

namespace SDKAbuAPI\Posts;

use SDKAbuAPI\Core\Attributes\Api;
use SDKAbuAPI\Core\Concerns\SdkModel;
use SDKAbuAPI\Core\Concerns\SdkParams;
use SDKAbuAPI\Core\Contracts\BaseModel;

/**
 * Get all posts.
 *
 * @see SDKAbuAPI\Services\PostsService::list()
 *
 * @phpstan-type PostListParamsShape = array{user_id?: int}
 */
final class PostListParams implements BaseModel
{
    /** @use SdkModel<PostListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter posts by user ID.
     */
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
    public static function with(?int $user_id = null): self
    {
        $obj = new self;

        null !== $user_id && $obj['user_id'] = $user_id;

        return $obj;
    }

    /**
     * Filter posts by user ID.
     */
    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj['user_id'] = $userID;

        return $obj;
    }
}
