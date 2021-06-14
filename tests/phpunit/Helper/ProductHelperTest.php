<?php declare(strict_types=1);

namespace Test\phpunit\Helper;


use App\Component\Category\Persistence\Mapper\CategoryMapper;
use App\Component\Category\Persistence\Mapper\CategoryMapperInterface;
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
            'description' => 'lorem john',
            'category' => [
                'id' => 1,
                'name' => 'tablet'
            ]
        ],
        [
            'name' => 'mark',
            'description' => 'lorem mark',
            'category' => [
                'id' => 2,
                'name' => 'smartphone'
            ]
        ],
        [
            'name' => 'tom',
            'description' => 'lorem tom',
            'category' => [
                'id' => 3,
                'name' => 'laptop'
            ]
        ],
        [
            'name' => 'george',
            'description' => 'lorem george',
            'category' => [
                'id' => 1,
                'name' => 'tablet'
            ]
        ]
    ];

    private ProductManager $productManager;
    private CategoryMapperInterface $categoryMapper;

    public function __construct()
    {
        parent::__construct();
        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $this->productManager = $container->get(ProductManager::class);
        $this->categoryMapper = $container->get(CategoryMapper::class);
    }

    /**
     * @return ProductDataTransferObject[]
     * @dataProvider
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function createTemporaryProducts(): array
    {
        $productDataTransferObjectList = [];

        foreach (self::PRODUCT as $product) {
            $productDataTransferObject = new ProductDataTransferObject();
            $productDataTransferObject->setName($product['name']);
            $productDataTransferObject->setDescription($product['description']);

            $category = $this->categoryMapper->map($product['category']);
            $productDataTransferObject->setCategory($category);

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
        $sql = "TRUNCATE TABLE Products;";

        // ALTER TABLE Products AUTO_INCREMENT = 0;
        $stmt = $con->prepare($sql);
        $stmt->execute();
    }

}
