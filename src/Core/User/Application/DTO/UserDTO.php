<?php

namespace App\Core\User\Application\DTO;

use App\Core\User\Domain\Status\UserStatus;

class UserDTO
{

    public function __construct(
        public readonly int        $id,
        public readonly string     $email,
        public readonly UserStatus $userStatus
    )
    {}
}