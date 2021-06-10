<?php declare(strict_types=1);

namespace Test\phpunit\Helper;


use App\Component\Product\Persistence\Models\ProductManager;
use App\Shared\Dto\ProductDataTransferObject;
use App\System\DI\Container;
use App\System\DI\DependencyProvider;
use Generated\ProductQuery;
use PHPUnit\Framework\TestCase;
use Propel\Runtime\Propel;

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

    private ProductManager $productManager;

    public function __construct()
    {
        parent::__construct();
        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $this->productManager = $container->get(ProductManager::class);
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

    /**
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function deleteTemporaryProducts(): void
    {
        $con = Propel::getConnection();
        $sql = "TRUNCATE TABLE Products";
        // ALTER TABLE Products AUTO_INCREMENT = 0;
        $stmt = $con->prepare($sql);
        $stmt->execute();
    }

}
