<?php

namespace App\Core\User\Application\Query\GetEmailsByInactiveStatus;

use App\Core\User\Domain\Status\UserStatus;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class GetEmailsByInactiveStatusQuery
{
    public function __construct(public readonly UserStatus $userStatus)
    {
    }
}
