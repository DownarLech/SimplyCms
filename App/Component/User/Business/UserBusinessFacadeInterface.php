<?php

namespace App\Component\User\Business;

use App\Shared\Dto\UserDataTransferObject;

interface UserBusinessFacadeInterface
{
    public function delete(UserDataTransferObject $userDataTransferObject): void;

    public function save(UserDataTransferObject $userDataTransferObject): UserDataTransferObject;

    public function getUser(string $username, string $password): UserDataTransferObject;

    public function getUserById(int $id): UserDataTransferObject;

    public function getUserList(): array;

}