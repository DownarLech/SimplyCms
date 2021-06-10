<?php declare(strict_types=1);

namespace App\Component\User\Persistence\Mapper;

use App\Shared\Dto\UserDataTransferObject;
use Generated\User;

interface UserMapperInterface
{
    public function map(array $user) : UserDataTransferObject;

    public function mapFromPropel(User $user) : UserDataTransferObject;

}