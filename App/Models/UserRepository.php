<?php

declare(strict_types=1);


namespace App\Models;


use App\Models\Dto\UserDataTransferObject;
use App\Models\Mapper\UserMapper;
use App\Services\Container;
use App\Services\QueryBuilder;
use App\Services\SQLConnector;

class UserRepository
{
    private array $userList = [];
    private UserMapper $userMapper;
    private SQLConnector $sqlConnector;
    private QueryBuilder $queryBuilder;


    /*
    public function __construct(SQLConnector $sqlConnector)
    {
        $this->userMapper = new UserMapper();
        $this->sqlConnector = $sqlConnector;
        $this->queryBuilder = new QueryBuilder($this->sqlConnector);
    }
    */

    public function __construct(Container $container)
    {
        $this->sqlConnector = $container->get(SQLConnector::class);
        $this->userMapper = $container->get(UserMapper::class);
        $this->queryBuilder = $container->get(QueryBuilder::class);
    }


    public function getUserList(): array
    {
        $arrayData = $this->queryBuilder->selectAll('Users');

        foreach ($arrayData as $user) {
            $this->userList[(int)$user['id']] = $this->userMapper->map($user);
        }
        return $this->userList;
    }

    public function getUser(string $username, string $password): ?UserDataTransferObject
    {
        $arrayData = $this->queryBuilder->selectOneWhereUserNameAndPassword('Users', $username, $password);

        if (!$arrayData) {
            return null;
            //throw new \OutOfBoundsException('This user is not in database');
        }
        return $this->userMapper->map($arrayData);
    }

    public function getUserById(int $id): ?UserDataTransferObject
    {
        $arrayData = $this->queryBuilder->selectOneWhereId('Users', $id);

        if (!$arrayData) {
            return null;
        }
        return $this->userMapper->map($arrayData);
    }

}