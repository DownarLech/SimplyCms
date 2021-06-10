<?php declare(strict_types=1);

namespace Test;

use App\Component\Product\Persistence\Models\ProductRepository;
use App\Shared\Dto\ProductDataTransferObject;
use App\System\DI\Container;
use App\System\DI\DependencyProvider;
use PHPUnit\Framework\TestCase;
use Test\phpunit\Helper\ProductHelperTest;

class ProductRepositoryTest extends TestCase
{
    private ProductRepository $productRepository;
    private ProductHelperTest $productHelper;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $this->productRepository = new  ProductRepository($container);
        $this->productHelper = new ProductHelperTest();
    }

    protected function tearDown(): void
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
        $this->productHelper->deleteTemporaryProducts();
    }

    public function testGetProductList(): void
    {
        $listOfProducts = $this->productHelper->createTemporaryProducts();
        $productDataTransferList = $this->productRepository->getProductList();

        self::assertCount(4, $productDataTransferList);
        self::assertSame(3,$this->productRepository->getProductById(3)->getId());
        self::assertSame('mark', $this->productRepository->getProductById(2)->getName());

        self::assertSame('lorem george', $this->productRepository->getProductById(4)->getDescription());
    }

    public function testGetProduct(): void
    {
        $listOfProducts = $this->productHelper->createTemporaryProducts();
        $productSingle = $this->productRepository->getProductById(3);

        self::assertInstanceOf(ProductDataTransferObject::class, $productSingle);
        self::assertSame(3, $productSingle->getId());
        self::assertSame('tom', $productSingle->getName());
        self::assertSame('lorem tom', $productSingle->getDescription());
    }

    public function testGetProductWhenProductIdNotFound (): void
    {
        self::assertNull($this->productRepository->getProductById(0));
    }

}
