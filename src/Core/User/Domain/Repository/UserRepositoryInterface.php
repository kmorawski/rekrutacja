<?php

namespace App\Core\User\Domain\Repository;

use App\Core\User\Domain\Exception\UserNotFoundException;
use App\Core\User\Domain\Status\UserStatus;
use App\Core\User\Domain\User;

interface UserRepositoryInterface
{
    /**
     * @throws UserNotFoundException
     */
    public function getByEmail(string $email): User;

    /**
     * Save.
     *
     * @param User $user
     *
     * @return void
     */
    public function save(User $user): void;

    /**
     * Flush.
     *
     * @return void
     */
    public function flush(): void;

    /**
     * Get by status.
     *
     * @param UserStatus $userStatus
     *
     * @return array
     */
    public function getByStatus(UserStatus $userStatus): array;
}
