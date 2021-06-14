<?php declare(strict_types=1);

namespace App\Component\Category\Business;

use App\Component\Category\Persistence\Models\CategoryManager;
use App\Component\Category\Persistence\Models\CategoryManagerInterface;
use App\Component\Category\Persistence\Models\CategoryRepository;
use App\Component\Category\Persistence\Models\CategoryRepositoryInterface;
use App\Shared\Dto\CategoryDataTransferObject;
use App\System\DI\Container;

class CategoryBusinessFacade implements CategoryBusinessFacadeInterface
{
    private CategoryRepositoryInterface $categoryRepository;
    private CategoryManagerInterface $categoryManager;

    public function __construct(Container $container)
    {
        $this->categoryRepository = $container->get(CategoryRepository::class);
        $this->categoryManager = $container->get(CategoryManager::class);
    }

    public function delete(CategoryDataTransferObject $categoryDataTransferObject): void
    {
        $this->categoryManager->delete($categoryDataTransferObject);
    }

    public function save(CategoryDataTransferObject $categoryDataTransferObject): CategoryDataTransferObject
    {
        return $this->categoryManager->save($categoryDataTransferObject);
    }

    public function getCategoryList(): array
    {
        return $this->categoryRepository->getCategoryList();

    }

    public function getCategoryById(int $id): ?CategoryDataTransferObject
    {
        return $this->categoryRepository->getCategoryById($id);
    }

    public function getCategoryByName(string $name): ?CategoryDataTransferObject
    {
        return $this->categoryRepository->getCategoryByName($name);
    }

}