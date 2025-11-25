<?php

declare(strict_types=1);

namespace SDKAbuAPI\Core\Conversion;

use SDKAbuAPI\Core\Conversion\Concerns\ArrayOf;
use SDKAbuAPI\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
