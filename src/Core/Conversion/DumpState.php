<?php

declare(strict_types=1);

namespace SDKAbuAPI\Core\Conversion;

/**
 * @internal
 */
final class DumpState
{
    public function __construct(
        public bool $canRetry = true
    ) {}
}
