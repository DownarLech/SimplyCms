<?php declare(strict_types=1);

namespace App\Component\Category\Business;

use App\Shared\Dto\CategoryDataTransferObject;

interface CategoryBusinessFacadeInterface
{
    public function delete(CategoryDataTransferObject $categoryDataTransferObject): void;

    public function save(CategoryDataTransferObject $categoryDataTransferObject): CategoryDataTransferObject;

    public function getCategoryList(): array;

    public function getCategoryById(int $id): ?CategoryDataTransferObject;

    public function getCategoryByName(string $name): ?CategoryDataTransferObject;

}