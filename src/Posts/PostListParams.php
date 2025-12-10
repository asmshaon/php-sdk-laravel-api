<?php

declare(strict_types=1);

namespace SDKAbuAPI\Posts;

use SDKAbuAPI\Core\Attributes\Optional;
use SDKAbuAPI\Core\Concerns\SdkModel;
use SDKAbuAPI\Core\Concerns\SdkParams;
use SDKAbuAPI\Core\Contracts\BaseModel;

/**
 * Get all posts.
 *
 * @see SDKAbuAPI\Services\PostsService::list()
 *
 * @phpstan-type PostListParamsShape = array{userID?: int}
 */
final class PostListParams implements BaseModel
{
    /** @use SdkModel<PostListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter posts by user ID.
     */
    #[Optional]
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
    public static function with(?int $userID = null): self
    {
        $self = new self;

        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    /**
     * Filter posts by user ID.
     */
    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
