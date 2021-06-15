<?php declare(strict_types=1);

namespace App\Component\Category\Persistence\Models;


use App\Component\Category\Persistence\Mapper\CategoryMapper;
use App\Component\Category\Persistence\Mapper\CategoryMapperInterface;
use App\Shared\Dto\CategoryDataTransferObject;
use App\System\DI\Container;
use Generated\CategoryQuery;

class CategoryRepository implements CategoryRepositoryInterface
{
    private array $categoryList = [];
    private CategoryMapperInterface $categoryMapper;

    public function __construct(Container $container)
    {
        $this->categoryMapper = $container->get(CategoryMapper::class);
    }

    public function getCategoryList(): array
    {
        $arrayData = CategoryQuery::create()->find();

        foreach ($arrayData as $category) {
            $this->categoryList[$category->getId()] = $this->categoryMapper->mapFromPropel($category);
        }
        return $this->categoryList;
    }

    public function getCategoryById(int $id): ?CategoryDataTransferObject
    {
        $arrayData = CategoryQuery::create()->findOneById($id);

        if (!$arrayData) {
            return null;
        }
        return $this->categoryMapper->mapFromPropel($arrayData);
    }


    public function getCategoryByName(string $name): ?CategoryDataTransferObject
    {
        //tutaj jest problem nie znajduje w BD category bo ich tam nie ma
        $data = CategoryQuery::create()
            ->filterByName($name)
            ->findOne();

        if (!$data) {
            return null;
        }
        return $this->categoryMapper->mapFromPropel($data);
    }
}