<?php
declare(strict_types=1);

namespace Test;

use App\Controllers\Backend\ProductController;
use App\Models\ProductRepository;
use App\Services\Container;
use App\Services\DependencyProvider;
use App\Services\SQLConnector;
use App\Services\ViewService;
use PHPUnit\Framework\TestCase;
use Test\phpunit\Helper\ProductHelperTest;

class ProductControllerTest extends TestCase
{

    private ProductHelperTest $productHelper;
    private ViewService $viewService;
    private ProductController $productController;
    private ProductRepository $productRepository;

    protected function setUp(): void
    {
        /*
        parent::setUp();

        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $this->viewService = new ViewService();
        $this->productController = new ProductController($container);

        $this->productRepository = new ProductRepository($container);

        $this->productHelper = new ProductHelperTest();
        $this->productHelper->createTemporaryProducts();
        */
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $_GET = [];
        $this->productHelper->deleteTemporaryProducts();
    }


    /**
     * @runInSeparateProcess
     */
    public function testActionSaveProduct(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['save'] = '1';
        $_POST['productname'] = 'william';
        $_POST['description'] = 'lorem william';

        $this->productController->action();

        $valueFromDatabase = $this->productRepository->getProduct(1);

        self::assertSame('william', $valueFromDatabase->getName());
        self::assertSame('lorem william', $valueFromDatabase->getDescription());
    }

    /**
     * @runInSeparateProcess
     */
    public function testSaveProduct(): void
    {
        $this->productController->saveProduct(2, 'william', 'lorem william');
        $valueFromDatabase = $this->productRepository->getProduct(2);

        self::assertSame('william', $valueFromDatabase->getName());
        self::assertSame('lorem william', $valueFromDatabase->getDescription());
    }

    /**
     * @runInSeparateProcess
     */
    public function testActionDeleteProduct(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['delete'] = '1';

        $this->productController->action();

        self::assertNull($this->productRepository->getProduct(1), 'NULL. The product was deleted.');
    }

    /**
     * @runInSeparateProcess
     */
    public function testDeleteProduct(): void
    {
        $this->productController->deleteProduct(2);

        self::assertNull($this->productRepository->getProduct(2), 'NULL. The product was deleted.');

    }

    /**
     * @runInSeparateProcess
     */
    public function testLoadView()
    {

        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $viewService = $container->get(ViewService::class);
        $product = new ProductController($container);
        $_GET['id'] = 1;
        $product->loadView();

        $temp = $viewService->getParams();
        self::assertArrayHasKey('product', $temp);

        $one = $temp['product'];
        self::assertSame(1, $one->getId());
        self::assertSame('john', $one->getName());
    }

    /**
     * @runInSeparateProcess
     */
    public function testLoadViewError()
    {

        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $viewService = new ViewService();
        $container->set(ViewService::class, $viewService);

        $container->get(ViewService::class);
        $product = new ProductController($container);


        $_GET['id'] = 0;
        $product->loadView();

        self::assertStringEndsWith('error.tpl', $viewService->getTemplate());
        //$this->expectException(Exception::class);
    }
}
