<?php namespace App\Models;

namespace App\Component\User\Persistence\Models;

use App\Shared\Dto\UserDataTransferObject;

interface UserManagerInterface
{
    public function delete(UserDataTransferObject $userDataTransferObject): void;

    public function save(UserDataTransferObject $userDataTransferObject): UserDataTransferObject;
}