<?php
declare(strict_types=1);

namespace Test\phpunit\Helper;

use App\Models\Dto\ProductDataTransferObject;
use App\Models\ProductManager;
use App\Services\Container;
use App\Services\DependencyProvider;
use App\Services\QueryBuilder;
use App\Services\SQLConnector;
use PHPUnit\Framework\TestCase;

class ProductHelperTest extends TestCase
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
        parent::__construct();
        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        //$this->sqlConnector = $container->get(SQLConnector::class);
        $this->productManager = $container->get(ProductManager::class);
        $this->queryBuilder = $container->get(QueryBuilder::class);
    }

    /**
     * @return ProductDataTransferObject[]
     * @dataProvider
     */
    public function createTemporaryProducts(): array
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

    public function deleteTemporaryProducts(): void
    {
        $sql = "TRUNCATE TABLE Products; ";
        $this->queryBuilder->prepareExecute($sql);
    }

}
