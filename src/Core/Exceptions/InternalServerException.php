<?php

namespace SDKAbuAPI\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SDKAbuAPI Internal Server Exception';
}
