<?php

declare(strict_types=1);

namespace Helper;

use App\Models\Dto\ProductDataTransferObject;
use App\Models\ProductManager;
use App\Services\QueryBuilder;
use App\Services\SQLConnector;


class ProductManagerTestHelper
{

    public const PRODUCT = [
        [
            'name' => 'john',
            'description' => 'lorem john'
        ],
        [
            'name' => 'mark',
            'description' => 'lorem mark'
        ],
        [
            'name' => 'tom',
            'description' => 'lorem tom'
        ],
        [
            'name' => 'george',
            'description' => 'lorem george'
        ]
    ];

    private SQLConnector $sqlConnector;
    private ProductManager $productManager;
    private QueryBuilder $queryBuilder;

    public function __construct()
    {
        $this->sqlConnector = new SQLConnector();
        $this->productManager = new ProductManager($this->sqlConnector);
        $this->queryBuilder = new QueryBuilder($this->sqlConnector);
    }


    protected function _before()
    {

    }

    protected function _after()
    {
    }

    /**
     * @return ProductDataTransferObject[]
     */
    public function createProducts(): array
    {
        $productDataTransferObjectList = [];

        foreach (self::PRODUCT as $product) {
            $productDataTransferObject = new ProductDataTransferObject();
            $productDataTransferObject->setName($product['name']);
            $productDataTransferObject->setDescription($product['description']);

            $productDataTransferObjectList[] = $this->productManager->save($productDataTransferObject);
        }
        return $productDataTransferObjectList;
    }

    public function deleteProducts(): void
    {
        $sql = "TRUNCATE TABLE Products; ";
        $this->queryBuilder->exec($sql);
    }
}