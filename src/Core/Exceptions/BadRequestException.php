<?php

namespace SDKAbuAPI\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SDKAbuAPI Bad Request Exception';
}
