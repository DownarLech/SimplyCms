<?php

declare(strict_types=1);

namespace App\Models\Mapper;

use App\Models\Dto\ProductDataTransferObject;

class ProductMapper
{
    public function map(array $product): ProductDataTransferObject
    {
        $productDataTransferObject = new ProductDataTransferObject();
        $productDataTransferObject->setId((int)$product['id']);
        $productDataTransferObject->setName($product['productName']);
        $productDataTransferObject->setDescription($product['description']);

        return $productDataTransferObject;
    }

}