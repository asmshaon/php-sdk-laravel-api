<?php

namespace SDKAbuAPI\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SDKAbuAPI Rate Limit Exception';
}
