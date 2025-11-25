<?php

namespace SDKAbuAPI\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SDKAbuAPI Unprocessable Entity Exception';
}
