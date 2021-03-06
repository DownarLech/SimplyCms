<?php declare(strict_types=1);

namespace Test\phpunit\Component\Product\Communication\Controllers;

use App\Component\Product\Communication\Controllers\Frontend\LabelProductController;
use App\System\DI\Container;
use App\System\DI\DependencyProvider;
use App\System\Smarty\ViewService;
use PHPUnit\Framework\TestCase;
use Test\phpunit\Helper\ProductHelperTest;

class LabelProductControllerTest extends TestCase
{

    private ProductHelperTest $productHelper;
    private ViewService $viewService;
    private LabelProductController $labelProductController;

    protected function setUp(): void
    {
        parent::setUp();

        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $this->viewService = $container->get(ViewService::class);
        $this->labelProductController = new LabelProductController($container);
        $this->productHelper = new ProductHelperTest();

        $this->productHelper->createTemporaryProducts();
    }

    protected function tearDown(): void
    {
        $_GET = [];
        $this->productHelper->deleteTemporaryProducts();
        parent::tearDown();

    }

    public function testAction()
    {

        $path = dirname(__DIR__,6).'/App/System/Smarty/templates/labelProduct.tpl';

        $_GET['id'] = 1;
        $this->labelProductController->action();

        $temp = $this->viewService->getParams();
        self::assertArrayHasKey('product', $temp);

        self::assertStringEndsWith('labelProduct.tpl', $this->viewService->getTemplate());
        self::assertFileEquals($path, $this->viewService->getTemplate());

        $one = $temp['product'];
        self::assertSame(1, $one->getId());
        self::assertSame('john', $one->getName());
        self::assertSame('lorem john', $one->getDescription());

    }


    public function testActionError()
    {
        $_GET['id'] = 0;
        $this->labelProductController->action();

        self::assertStringEndsWith('error.tpl', $this->viewService->getTemplate());
    }
}
