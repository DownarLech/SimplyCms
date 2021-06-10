<?php

namespace App\Component\Product\Business;

use App\Shared\Dto\ProductDataTransferObject;

interface ProductBusinessFacadeInterface
{
    public function delete(ProductDataTransferObject $productDataTransferObject): void;

    public function save(ProductDataTransferObject $productDataTransferObject): ProductDataTransferObject;

    public function getProductList(): array;

    public function getProductById(int $id): ?ProductDataTransferObject;

}