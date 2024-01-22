<?php

namespace App\Core\User\Application\Query\GetEmailsByInactiveStatus;

use App\Core\User\Domain\Repository\UserRepositoryInterface;
use App\Core\User\Domain\User;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class GetEmailsByInactiveStatusHandler
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    )
    {
    }

    public function __invoke(GetEmailsByInactiveStatusQuery $query): array
    {
        $users = $this->userRepository->getByStatus($query->userStatus);

        return array_map(function (User $user) {
            return $user->getEmail();
        }, $users);
    }
}
