<?php declare(strict_types=1);

namespace App\Component\Category\Persistence\Mapper;

use App\Shared\Dto\CategoryDataTransferObject;
use Generated\Category;

class CategoryMapper implements CategoryMapperInterface
{
    public function map(array $category): CategoryDataTransferObject
    {
        $categoryDataTransferObject = new CategoryDataTransferObject();
        $categoryDataTransferObject->setId((int)$category['id']);
        $categoryDataTransferObject->setName($category['name']);

        return $categoryDataTransferObject;
    }


    public function mapFromPropel(Category $category) : CategoryDataTransferObject
    {
        $categoryDataTransferObject = new CategoryDataTransferObject();
        $categoryDataTransferObject->setId($category->getId());
        $categoryDataTransferObject->setName($category->getName());

        return $categoryDataTransferObject;
    }
}