<?php declare(strict_types=1);

namespace App\Component\User\Persistence\Mapper;

use App\Shared\Dto\UserDataTransferObject;
use Generated\User;

class UserMapper implements UserMapperInterface
{
    public function map(array $user) : UserDataTransferObject
    {

        $userDataTransferObject = new UserDataTransferObject();
        $userDataTransferObject->setId((int)$user['id']);
        $userDataTransferObject->setUserName($user['username']);
        $userDataTransferObject->setPassword($user['password']);
        $userDataTransferObject->setUserRole($user['userrole']);

        return $userDataTransferObject;
    }

    public function mapFromPropel(User $user) : UserDataTransferObject
    {
        $userDataTransferObject = new UserDataTransferObject();
        $userDataTransferObject->setId($user->getId());
        $userDataTransferObject->setUserName($user->getUsername());
        $userDataTransferObject->setPassword($user->getPassword());
        $userDataTransferObject->setUserRole($user->getUserrole());

        return $userDataTransferObject;
    }

}