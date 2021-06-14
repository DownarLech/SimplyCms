<?php declare(strict_types=1);


namespace App\Component\Category\Persistence\Models;


use App\Shared\Dto\CategoryDataTransferObject;

interface CategoryManagerInterface
{
    public function delete(CategoryDataTransferObject $categoryDataTransferObject): void;

    public function save(CategoryDataTransferObject $categoryDataTransferObject): CategoryDataTransferObject;

}