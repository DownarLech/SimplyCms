<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Dto\ProductDataTransferObject;
use App\Models\Mapper\ProductMapper;
use App\Services\Container;
use App\Services\QueryBuilder;
use App\Services\SQLConnector;

class ProductRepository
{
    private array $productList = [];
    private ProductMapper $productMapper;
    private SQLConnector $sqlConnector;
    private QueryBuilder $queryBuilder;


    public function __construct(Container $container)
    {
        $this->sqlConnector = $container->get(SQLConnector::class);
        $this->productMapper = $container->get(ProductMapper::class);
        $this->queryBuilder = $container->get(QueryBuilder::class);
    }

    /**
     * @return ProductDataTransferObject[]
     */
    public function getProductList(): array
    {
        $arrayData = $this->queryBuilder->selectAll('Products');

        foreach ($arrayData as $product) {
            $this->productList[(int)$product['id']] = $this->productMapper->map($product);
        }
        return $this->productList;
    }


    public function getProduct(int $id): ?ProductDataTransferObject
    {
        $arrayData = $this->queryBuilder->selectOneWhereId('Products', $id);

        if (!$arrayData) {
            return null;
            //throw new \OutOfBoundsException('This product is not in database');
        }
        return $this->productMapper->map($arrayData);
    }
}