<?php

namespace SDKAbuAPI\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SDKAbuAPI Permission Denied Exception';
}
