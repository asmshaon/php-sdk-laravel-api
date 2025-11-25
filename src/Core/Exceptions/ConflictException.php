<?php

namespace SDKAbuAPI\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SDKAbuAPI Conflict Exception';
}
