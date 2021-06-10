<?php declare(strict_types=1);

namespace App\Component\Product\Persistence\Mapper;

use App\Shared\Dto\ProductDataTransferObject;
use Generated\Product;

interface ProductMapperInterface
{
    public function map(array $product): ProductDataTransferObject;

    public function mapFromPropel(Product $product) : ProductDataTransferObject;

}