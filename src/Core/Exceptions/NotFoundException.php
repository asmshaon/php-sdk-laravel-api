<?php

namespace SDKAbuAPI\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SDKAbuAPI Not Found Exception';
}
