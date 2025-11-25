<?php

declare(strict_types=1);

namespace SDKAbuAPI\Core\Conversion\Contracts;

use SDKAbuAPI\Core\Conversion\CoerceState;
use SDKAbuAPI\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
