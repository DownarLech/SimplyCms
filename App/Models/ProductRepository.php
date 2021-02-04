<?php

declare(strict_types=1);


namespace App\Models;

use App\Models\Dto\ProductDataTransferObject;
use App\Models\Mapper\ProductMapper;
use App\Services\QueryBuilder;
use App\Services\SQLConnector;

class ProductRepository
{
    private array $productList;
    private ProductMapper $productMapper;
    private SQLConnector $connector;
    private QueryBuilder $queryBuilder;


    public function __construct()
    {
        $this->connector = new SQLConnector();
        $this->productMapper = new ProductMapper();
        $this->queryBuilder = new QueryBuilder($this->connector->get());
    }


    public function getProductList(): array
    {
        $arrayData = $this->queryBuilder->selectAll('Products');

        if (!empty($arrayData)) {
            foreach ($arrayData as $product) {
                $this->productList[(int)$product['id']] = $this->productMapper->map($product);
            }
        } else {
            throw new \Exception("This database is empty.");
        }
        return $this->productList;
    }


    public function getProduct(int $id): ProductDataTransferObject
    {
        $arrayData = $this->queryBuilder->selectItemWhereId($id, 'Products');

        if (!$arrayData) {
            throw new \Exception("This product is no in the database.");

        }
        $this->productList[$id] = $this->productMapper->map($arrayData);

        /*
        if (!$this->hasProduct($id)) {
            throw new \Exception("This product is no in the database.");
        }
        */
        return $this->productList[$id];
    }


    public function hasProduct(int $id): bool
    {
        return isset($this->productList[$id]);

    }
}