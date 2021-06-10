<?php

namespace App\Component\Product\Persistence\Models;


use App\Shared\Dto\ProductDataTransferObject;

interface ProductManagerInterface
{
    public function delete(ProductDataTransferObject $productDataTransferObject): void;

    public function save(ProductDataTransferObject $productDataTransferObject): ProductDataTransferObject;

}