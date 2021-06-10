<?php declare(strict_types=1);

namespace App\Component\User\Business;

use App\Component\User\Persistence\Models\UserManager;
use App\Component\User\Persistence\Models\UserManagerInterface;
use App\Component\User\Persistence\Models\UserRepository;
use App\Component\User\Persistence\Models\UserRepositoryInterface;
use App\Shared\Dto\UserDataTransferObject;
use App\System\DI\Container;

class UserBusinessFacade implements UserBusinessFacadeInterface
{
    protected UserManagerInterface $userManager;
    protected UserRepositoryInterface $userRepository;

    public function __construct(Container $container)
    {
        $this->userManager = $container->get(UserManager::class);
        $this->userRepository = $container->get(UserRepository::class);
    }

    public function delete(UserDataTransferObject $userDataTransferObject): void
    {
        $this->userManager->delete($userDataTransferObject);
    }

    public function save(UserDataTransferObject $userDataTransferObject): UserDataTransferObject
    {
        return $this->userManager->save($userDataTransferObject);
    }

    public function getUser(string $username, string $password): UserDataTransferObject
    {
        return $this->userRepository->getUser($username, $password);
    }

    public function getUserById(int $id): UserDataTransferObject
    {
        return $this->userRepository->getUserById($id);
    }

    public function getUserList(): array
    {
        return $this->userRepository->getUserList();
    }


}