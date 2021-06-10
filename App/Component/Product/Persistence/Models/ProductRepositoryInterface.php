<?php declare(strict_types=1);


namespace App\Component\Product\Persistence\Models;


use App\Shared\Dto\ProductDataTransferObject;

interface ProductRepositoryInterface
{
    public function getProductList(): array;

    public function getProductById(int $id): ?ProductDataTransferObject;

}