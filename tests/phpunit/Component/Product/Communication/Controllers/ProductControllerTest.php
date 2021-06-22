<?php declare(strict_types=1);

namespace Test\phpunit\Component\Product\Communication\Controllers;

use App\Component\Product\Communication\Controllers\Backend\ProductController;
use App\Component\Product\Persistence\Models\ProductRepository;
use App\System\DI\Container;
use App\System\DI\DependencyProvider;
use App\System\Smarty\Redirect;
use App\System\Smarty\ViewService;
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
        parent::setUp();

        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $this->viewService = $container->get(ViewService::class);
        $this->productController = new ProductController($container);
        $this->productRepository = new ProductRepository($container);
        $this->productHelper = new ProductHelperTest();

        $this->productHelper->createTemporaryProducts();
    }

    protected function tearDown(): void
    {
        $_GET = [];
        $this->productHelper->deleteTemporaryProducts();
        parent::tearDown();

    }

    public function setUpIntegrationTest(): void
    {
        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $this->viewService = $container->get(ViewService::class);
        $this->productController = new ProductController($container);
        $this->productRepository = new ProductRepository($container);
        $this->productHelper = new ProductHelperTest();

        $this->productHelper->createTemporaryProducts();
    }

    /**
     * @runInSeparateProcess
     */
    public function testActionSaveProduct(): void
    {
       $this->setUpIntegrationTest();

        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['save'] = '1';
        $_POST['productname'] = 'william';
        $_POST['description'] = 'lorem william';
        $_POST['categoryName'] = ''; // Is this correct? Manually provide an empty string?

        $this->productController->action();

        $valueFromDatabase = $this->productRepository->getProductById(1);

        self::assertSame('william', $valueFromDatabase->getName());
        self::assertSame('lorem william', $valueFromDatabase->getDescription());
    }

    /**
     * @runInSeparateProcess
     */
    public function testActionSaveProductWithCategory(): void
    {
        $this->setUpIntegrationTest();

        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['save'] = '1';
        $_POST['productname'] = 'william';
        $_POST['description'] = 'lorem william';
        $_POST['categoryName'] = 'tablet';

        $this->productController->action();

        $valueFromDatabase = $this->productRepository->getProductById(1);

        self::assertSame('william', $valueFromDatabase->getName());
        self::assertSame('lorem william', $valueFromDatabase->getDescription());
        self::assertSame('tablet', $valueFromDatabase->getCategory()->getName());

    }

/*
    public function testSaveProduct(): void
    {
        $this->productController->saveProduct(2, 'william', 'lorem william');
        $valueFromDatabase = $this->productRepository->getProduct(2);

        self::assertSame('william', $valueFromDatabase->getName());
        self::assertSame('lorem william', $valueFromDatabase->getDescription());
    }
*/
    /**
     * @runInSeparateProcess
     */
    public function testActionDeleteProduct(): void
    {
        $this->setUpIntegrationTest();

        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['delete'] = '1';

        $this->productController->action();

        self::assertNull($this->productRepository->getProductById(1), 'NULL. The product was deleted.');
    }

/*
    public function testDeleteProduct(): void
    {
        $this->productController->deleteProduct(2);

        self::assertNull($this->productRepository->getProduct(2), 'NULL. The product was deleted.');
    }
*/

    public function testLoadView(): void
    {
        $this->setUpIntegrationTest();

        $_GET['id'] = 1;
        $this->productController->loadView();

        $temp = $this->viewService->getParams();
        self::assertArrayHasKey('product', $temp);

        $one = $temp['product'];
        self::assertSame(1, $one->getId());
        self::assertSame('john', $one->getName());
        self::assertSame('lorem john', $one->getDescription());
    }


    public function testLoadViewError(): void
    {
        $this->setUpIntegrationTest();

        $_GET['id'] = 0;
        $this->productController->loadView();

        self::assertStringEndsWith('error.tpl', $this->viewService->getTemplate());
        //$this->expectException(Exception::class);
    }


    public function testInit(): void
    {
        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);
        $_SESSION['username'] = false;

        $mockRedirect = $this->createMock(Redirect::class);
        $mockRedirect->expects(self::once())
            ->method('redirectToBackend')
            ->with(self::equalTo('index.php?page=login&admin=true'));

        $container->set(Redirect::class, $mockRedirect);

        $product =  new ProductController($container);
        $product->init();

        self::assertTrue($_SESSION['username']);
    }


    public function testInitNegative(): void
    {
        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $mockRedirect = $this->createMock(Redirect::class);
        $mockRedirect->expects(self::never())
            ->method('redirectToBackend');

        $container->set(Redirect::class, $mockRedirect);

        $_SESSION['username'] = true;
        $productController =  new ProductController($container);
        $productController->init();
    }
}
