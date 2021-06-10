<?php declare(strict_types=1);

namespace App\Component\User\Persistence\Models;

use App\Component\User\Persistence\Mapper\UserMapper;
use App\Component\User\Persistence\Mapper\UserMapperInterface;
use App\Shared\Dto\UserDataTransferObject;
use App\System\DI\Container;
use Generated\UserQuery;


class UserRepository implements UserRepositoryInterface
{
    private array $userList = [];
    private UserMapperInterface $userMapper;

    public function __construct(Container $container)
    {
        $this->userMapper = $container->get(UserMapper::class);
    }

    public function getUserList(): array
    {
        $arrayData = UserQuery::create()->find();
        // $authors contains a collection of Author objects

        foreach ($arrayData as $user) {
            $this->userList[$user->getId()] = $this->userMapper->mapFromPropel($user);
        }
        return $this->userList;
    }

    public function getUser(string $username, string $password): ?UserDataTransferObject
    {
        $arrayData = UserQuery::create()
            ->filterByUsername($username)
            ->filterByPassword($password)
            ->findOne();

        if (!$arrayData) {
            return null;
            //throw new \OutOfBoundsException('This user is not in database');
        }
        return $this->userMapper->mapFromPropel($arrayData);
    }


    public function getUserById(int $id): ?UserDataTransferObject
    {
        $arrayData = UserQuery::create()->findOneById($id);

        if (!$arrayData) {
            return null;
        }
        return $this->userMapper->mapFromPropel($arrayData);

    }

}