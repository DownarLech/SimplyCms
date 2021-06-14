<?php declare(strict_types=1);


namespace App\Component\Category\Persistence\Models;


use App\Shared\Dto\CategoryDataTransferObject;

interface CategoryRepositoryInterface
{
    public function getCategoryList(): array;

    public function getCategoryById(int $id): ?CategoryDataTransferObject;
}