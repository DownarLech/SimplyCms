<?php

declare(strict_types=1);


namespace App\Models;

use App\Models\Dto\ProductDataTransferObject;
use App\Models\Mapper\ProductMapper;
use App\Services\SQLConnector;
use PDO;

class ProductRepository
{
    private array $productList;
    private ProductMapper $productMapper;
    private SQLConnector $connector;


    public function __construct()
    {
        $this->connector = new SQLConnector();
        $this->productMapper = new ProductMapper();
        $this->getData('Products');

    }

    public function getData($table): void
    {
        $this->connector->connect();
        $pdo = $this->connector->get();

        $stm = $pdo->query('Select * from ' . $table);

        $arrayData = $stm->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($arrayData)) {
            foreach ($arrayData as $product) {
                $this->productList[(int)$product['id']] = $this->productMapper->map($product);
            }
        } else {
            throw new \Exception("This database is empty.");
        }
    }


    public function getProductList(): array
    {
        return $this->productList;
    }


    public function getProduct(int $id): ProductDataTransferObject
    {
        if (!$this->hasProduct($id)) {
            throw new \Exception("This product is no in the database.");
        }
        return $this->productList[$id];
    }


    public function hasProduct(int $id): bool
    {

        return isset($this->productList[$id]);

    }
}