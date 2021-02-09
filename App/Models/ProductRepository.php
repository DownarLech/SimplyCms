<?php

declare(strict_types=1);


namespace App\Models;

use App\Models\Dto\ProductDataTransferObject;
use App\Models\Mapper\ProductMapper;
use App\Services\QueryBuilder;
use App\Services\SQLConnector;

class ProductRepository
{
    private array $productList = [];
    private ProductMapper $productMapper;
    private SQLConnector $connector;
    private QueryBuilder $queryBuilder;


    public function __construct()
    {
        $this->connector = new SQLConnector();
        $this->productMapper = new ProductMapper();
        $this->queryBuilder = new QueryBuilder($this->connector);
    }

    /**
     * @return ProductDataTransferObject[]
     */
    public function getProductList(): array
    {
        $arrayData = $this->queryBuilder->fetchAll('Select * from Products');

        if (!empty($arrayData)) {
            foreach ($arrayData as $product) {
                $this->productList[(int)$product['id']] = $this->productMapper->map($product);
            }
        }
        return $this->productList;
    }


    public function getProduct(int $id): ?ProductDataTransferObject
    {
        $arrayData = $this->queryBuilder->fetchOne('Select * from Products where id='.$id);

        if (!$arrayData) {
            return null;
        }
        return $this->productMapper->map($arrayData);
    }
}