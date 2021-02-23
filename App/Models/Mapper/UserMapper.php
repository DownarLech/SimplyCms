<?php

declare(strict_types=1);

namespace App\Models\Mapper;

use App\Models\Dto\UserDataTransferObject;

class UserMapper
{
    public function map(array $user) : UserDataTransferObject {

        $userDataTransferObject = new UserDataTransferObject();
        $userDataTransferObject->setId((int)$user['id']);
        $userDataTransferObject->setUserName($user['username']);
        $userDataTransferObject->setPassword($user['password']);
        $userDataTransferObject->setUserRole($user['userrole']);

        return $userDataTransferObject;
    }

}