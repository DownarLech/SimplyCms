<?php declare(strict_types=1);

namespace App\Component\Product\Persistence\Mapper;

use App\Component\Category\Business\CategoryBusinessFacade;
use App\Component\Category\Business\CategoryBusinessFacadeInterface;
use App\Component\Category\Persistence\Mapper\CategoryMapper;
use App\Component\Category\Persistence\Mapper\CategoryMapperInterface;
use App\Shared\Dto\CategoryDataTransferObject;
use App\Shared\Dto\CsvDataTransferObject;
use App\Shared\Dto\ProductDataTransferObject;
use App\System\DI\Container;
use Generated\Product;

class ProductMapper implements ProductMapperInterface
{
    private CategoryBusinessFacadeInterface $categoryBusinessFacade;
    private CategoryMapperInterface $categoryMapper;

    public function __construct(Container $container)
    {
        $this->categoryBusinessFacade = $container->get(CategoryBusinessFacade::class);
        $this->categoryMapper = $container->get(CategoryMapper::class);
    }

    public function map(array $product): ProductDataTransferObject
    {
        $productDataTransferObject = new ProductDataTransferObject();
        $productDataTransferObject->setId((int)$product['id']);
        $productDataTransferObject->setName($product['productName']);
        $productDataTransferObject->setDescription($product['description']);

        $category = $this->categoryMapper->map($product['category']);
        $productDataTransferObject->setCategory($category);

        return $productDataTransferObject;
    }

    public function mapFromPropel(Product $product) : ProductDataTransferObject
    {
        $productDataTransferObject = new ProductDataTransferObject();
        $productDataTransferObject->setId($product->getId());
        $productDataTransferObject->setName($product->getProductname());
        $productDataTransferObject->setDescription($product->getDescription());

        $category = $this->categoryBusinessFacade->getCategoryById($product->getCategoryId());
        $productDataTransferObject->setCategory($category);

        return $productDataTransferObject;
    }

    public function mapFromCsv(CsvDataTransferObject $csvDto): ProductDataTransferObject
    {
        $productDataTransferObject = new ProductDataTransferObject();
        $productDataTransferObject->setId($csvDto->getId());
        $productDataTransferObject->setName($csvDto->getName());
        $productDataTransferObject->setDescription($csvDto->getDescription());

        $category = $this->categoryBusinessFacade->getCategoryByName($csvDto->getCategoryName());
        if(!$category) {
            $category = new CategoryDataTransferObject();
            $category->setName($csvDto->getCategoryName());
            $this->categoryBusinessFacade->save($category);
        }
        $productDataTransferObject->setCategory($category);

        return $productDataTransferObject;
    }

}