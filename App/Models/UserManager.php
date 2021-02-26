<?php
declare(strict_types=1);

namespace App\Models;

use App\Models\Dto\UserDataTransferObject;
use App\Services\Container;
use App\Services\QueryBuilder;
use App\Services\SQLConnector;
use App\Services\ViewService;

class UserManager
{
    private QueryBuilder $queryBuilder;
    private SQLConnector $sqlConnector;
    private UserRepository $userRepository;

    public function __construct(Container $container)
    {
        $this->sqlConnector = $container->get(SQLConnector::class);
        $this->queryBuilder = $container->get(QueryBuilder::class);
        $this->userRepository = $container->get(UserRepository::class);
    }


    public function delete(UserDataTransferObject $userDataTransferObject): void
    {
        $id = $userDataTransferObject->getId();

        if (isset($id)) {
            $this->queryBuilder->deleteWhereId('Users', $id);

        } else {
            throw new \Exception("User is not in database");
        }
    }


    public function save(UserDataTransferObject $userDataTransferObject): UserDataTransferObject
    {
        $userName = $userDataTransferObject->getUserName();
        $password = $userDataTransferObject->getPassword();
        $userRole = $userDataTransferObject->getUserRole();

        if ($userDataTransferObject->getId() !== 0) {

            $id = $userDataTransferObject->getId();
            $this->queryBuilder->updateTableSetNamePasswordRoleWhereId('Users', $userName, $password, $userRole, $id);

        } else {
            $id = $this->queryBuilder->insertIntoTableNamePasswordRole('Users', $userName, $password, $userRole);
        }

        $userDataTransferObjectNew = new UserDataTransferObject();
        $userDataTransferObjectNew->setId($id);
        $userDataTransferObjectNew->setUserName($userDataTransferObject->getUserName());
        $userDataTransferObjectNew->setPassword($userDataTransferObject->getPassword());
        $userDataTransferObjectNew->setUserRole($userDataTransferObject->getUserRole());

        return $userDataTransferObjectNew;
    }
}