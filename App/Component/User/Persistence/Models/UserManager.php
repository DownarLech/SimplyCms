<?php declare(strict_types=1);

namespace App\Component\User\Persistence\Models;

use App\Shared\Dto\UserDataTransferObject;
use Generated\User;
use Generated\UserQuery;

class UserManager implements UserManagerInterface
{

    public function delete(UserDataTransferObject $userDataTransferObject): void
    {
        $id = $userDataTransferObject->getId();

        if (isset($id)) {
            UserQuery::create()
                ->filterById($id)
                ->delete();
        } else {
            throw new \Exception("User is not in database");
        }
    }

    /**
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function save(UserDataTransferObject $userDataTransferObject): UserDataTransferObject
    {
        $userName = $userDataTransferObject->getUserName();
        $password = $userDataTransferObject->getPassword();
        $userRole = $userDataTransferObject->getUserRole();

        if ($userDataTransferObject->getId() !== 0) {

            $id = $userDataTransferObject->getId();

            $user = UserQuery::create()
                ->findOneById($id);

            if ($user !== null) {
                $user->setUserName($userName)
                    ->setPassword($password)
                    ->setUserrole($userRole)
                    ->save();
            }
        } else {
            $user = new User();
            $user->setUserName($userName)
                ->setPassword($password)
                ->setUserrole($userRole)
                ->save();

            $id = $user->getId();
        }

        $userDataTransferObjectNew = new UserDataTransferObject();
        $userDataTransferObjectNew->setId($id);
        $userDataTransferObjectNew->setUserName($userDataTransferObject->getUserName());
        $userDataTransferObjectNew->setPassword($userDataTransferObject->getPassword());
        $userDataTransferObjectNew->setUserRole($userDataTransferObject->getUserRole());

        return $userDataTransferObjectNew;
    }
}