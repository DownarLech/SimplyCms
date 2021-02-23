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
    private ViewService $viewService;

    /**
     * UserManager constructor.
     * @param SQLConnector $sqlConnector
     */
    public function __construct(SQLConnector $sqlConnector)
    {
        $this->sqlConnector = $sqlConnector;
        $this->queryBuilder = new QueryBuilder($this->sqlConnector);
        $this->userRepository = new UserRepository($this->sqlConnector);
        $this->viewService = new ViewService();
    }

    public function delete(UserDataTransferObject $userDataTransferObject): void
    {
        $id = $userDataTransferObject->getId();

        if (isset($id)) {
            //$sql = "DELETE FROM Users  WHERE id = '" . $id . "';";
            //$this->queryBuilder->prepareExecute($sql);

            $this->queryBuilder->deleteWhereId('Users', $id);

        } else {
            throw new \Exception("User is not in database");
        }
    }


    public function save(UserDataTransferObject $userDataTransferObject): UserDataTransferObject
    {
        $userName = $userDataTransferObject->getUserName();
        $password = $userDataTransferObject->getPassword();
        $userRole =  $userDataTransferObject->getUserRole();

        if ($userDataTransferObject->getId() !== 0) {

            $id = $userDataTransferObject->getId();

            //$sql = "UPDATE Users SET username = '" .$userName. "', password ='" . $password. "', userrole ='" . $userRole. "' WHERE id = '" .$id. "';";
            //$this->queryBuilder->prepareExecute($sql);

            $this->queryBuilder->updateTableSetNamePasswordRoleWhereId('Users', $userName, $password, $userRole, $id);
        } else {
            $sql = 'INSERT INTO Users (userName, password, userrole) VALUES (\'' . $userName . '\',\'' . $password . '\',\'' . $userRole .'\');';
            $id = $this->queryBuilder->prepareExecuteAndLastInsertId($sql);
        }

        //$id = $this->queryBuilder->execAndLastInsertId($sql);

        $userDataTransferObjectNew = new UserDataTransferObject();
        $userDataTransferObjectNew->setId($id);
        $userDataTransferObjectNew->setUserName($userDataTransferObject->getUserName());
        $userDataTransferObjectNew->setPassword($userDataTransferObject->getPassword());

        return $userDataTransferObjectNew;
    }


}