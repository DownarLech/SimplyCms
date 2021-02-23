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


    /**
     * ProductRepository constructor.
     */
    public function __construct(SQLConnector $sqlConnector)
    {
        $this->sqlConnector = $sqlConnector;
        $this->productMapper = new ProductMapper();
        $this->queryBuilder = new QueryBuilder($this->sqlConnector);
    }

    /**
     * @return ProductDataTransferObject[]
     */
    public function getProductList(): array
    {
        //$arrayData = $this->queryBuilder->prepareExecuteFetchAll('SELECT * FROM Products');
        $arrayData = $this->queryBuilder->selectAll('Products');

        foreach ($arrayData as $product) {
            $this->productList[(int)$product['id']] = $this->productMapper->map($product);
        }
        return $this->productList;
    }


    public function getProduct(int $id): ?ProductDataTransferObject
    {
        //$arrayData = $this->queryBuilder->prepareExecuteFetchOne('SELECT * FROM Products WHERE id=' . $id);
        $arrayData = $this->queryBuilder->selectOneWhereId('Products', $id);

        if (!$arrayData) {
            return null;
            //throw new \OutOfBoundsException('This product is not in database');
        }
        return $this->productMapper->map($arrayData);
    }
}