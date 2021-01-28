<?php

declare(strict_types=1);


namespace App\Models;


use App\Models\Dto\UserDataTransferObject;
use App\Models\Mapper\UserMapper;

class UserRepository
{
    private array $userList;
    private UserMapper $userMapper;

    public function __construct()
    {
        try {
            $this->getFromDB();
        } catch (\Exception $e) {

        }
    }

    public function getUserList(): array
    {
        return $this->userList;
    }

    public function getUser(string $username, string $password): UserDataTransferObject
    {
        if(!$this->hasUser($username, $password)){
            throw new \Exception("This user is no in the database.");
        }
        return $this->userList[$username];
    }

    public function hasUser(string $username, string $password): bool
    {
        $checked =false;
        foreach ($this->userList as $user) {
            if ($user->getUserName() === $username && $user->getPassword() === $password) {
                $checked = true;
            }
        }
        return $checked;
    }

    //    private function getFromDB(string $data): void

    private function getFromDB(): void
    {
        $url = __DIR__ ."/../../userList.json";
        $data = file_get_contents($url);
        if ($data === false) {
            throw new \Exception("Load file to string failed.");
        }

        $json_a = json_decode($data, true);
        if ($json_a === null) {
            throw new \Exception("Decode json file failed");
        }

        $this->userMapper = new UserMapper();

        if(!empty($json_a)) {
            foreach ($json_a as $user) {
                $this->userList[(int)$user['id']] = $this->userMapper->map($user);
            }
        }
    }

    private function makeArrayResult(): array
    {
    }


}