<?php

namespace App\Core\User\Application\Query\GetEmailsByInactiveStatus;

use App\Core\User\Domain\Status\UserStatus;

class GetEmailsByInactiveStatusQuery
{
    public function __construct(public readonly UserStatus $userStatus)
    {}
}
