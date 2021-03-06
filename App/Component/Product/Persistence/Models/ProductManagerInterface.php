<?php declare(strict_types=1);

namespace App\Component\Product\Persistence\Models;

use App\Shared\Dto\ProductDataTransferObject;

interface ProductManagerInterface
{
    public function delete(ProductDataTransferObject $productDataTransferObject): void;

    public function save(ProductDataTransferObject $productDataTransferObject): ProductDataTransferObject;

}