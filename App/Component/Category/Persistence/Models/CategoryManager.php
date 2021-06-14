<?php declare(strict_types=1);

namespace App\Component\Category\Persistence\Models;


use App\Shared\Dto\CategoryDataTransferObject;
use Generated\Category;
use Generated\CategoryQuery;

class CategoryManager implements CategoryManagerInterface
{
    public function delete(CategoryDataTransferObject $categoryDataTransferObject): void
    {
        $id = $categoryDataTransferObject->getId();

        if (isset($id)) {
            CategoryQuery::create()
                ->filterById($id)
                ->delete();
        } else {
            throw new \Exception("Category is not in database");
        }
    }

    /**
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function save(CategoryDataTransferObject $categoryDataTransferObject): CategoryDataTransferObject
    {
        $categoryName = $categoryDataTransferObject->getName();

        if ($categoryDataTransferObject->getId() !== 0) {
            $categoryId = $categoryDataTransferObject->getId();
            $category = CategoryQuery::create()
                ->findOneById($categoryId);

            if ($category !== null) {
                $category->setName($categoryName)
                    ->save();
            } else {
                $category = new Category();
                $category->setId($categoryId)
                    ->setName($categoryName)
                    ->save();
            }
        } else {
            $category = new Category();
            $category->setName($categoryName)
                ->save();

            $categoryId = $category->getId();
        }

        $categoryDataTransferObjectNew = new CategoryDataTransferObject();
        $categoryDataTransferObjectNew->setId($categoryId);
        $categoryDataTransferObjectNew->setName($categoryName);

        return $categoryDataTransferObjectNew;
    }

}