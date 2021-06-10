<?php declare(strict_types=1);

namespace App\Component\Product\Persistence\Mapper;

use App\Shared\Dto\CsvDataTransferObject;
use App\Shared\Dto\ProductDataTransferObject;
use Generated\Product;

class ProductMapper implements ProductMapperInterface
{
    public function map(array $product): ProductDataTransferObject
    {
        $productDataTransferObject = new ProductDataTransferObject();
        $productDataTransferObject->setId((int)$product['id']);
        $productDataTransferObject->setName($product['productName']);
        $productDataTransferObject->setDescription($product['description']);

        return $productDataTransferObject;
    }

    public function mapFromPropel(Product $product) : ProductDataTransferObject
    {
        $productDataTransferObject = new ProductDataTransferObject();
        $productDataTransferObject->setId($product->getId());
        $productDataTransferObject->setName($product->getProductname());
        $productDataTransferObject->setDescription($product->getDescription());

        return $productDataTransferObject;
    }

    public function mapFromCsv(CsvDataTransferObject $csvProduct): ProductDataTransferObject
    {
        $productDataTransferObject = new ProductDataTransferObject();
        $productDataTransferObject->setId($csvProduct->getId());
        $productDataTransferObject->setName($csvProduct->getName());
        $productDataTransferObject->setDescription($csvProduct->getDescription());

        return $productDataTransferObject;

    }

}