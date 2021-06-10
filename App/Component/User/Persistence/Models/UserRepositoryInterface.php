<?php declare(strict_types=1);

namespace App\Component\User\Persistence\Models;

use App\Shared\Dto\UserDataTransferObject;

interface UserRepositoryInterface
{
    public function getUser(string $username, string $password): ?UserDataTransferObject;

    public function getUserById(int $id): ?UserDataTransferObject;

    public function getUserList(): array;

}