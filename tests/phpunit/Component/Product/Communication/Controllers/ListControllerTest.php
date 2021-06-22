<?php declare(strict_types=1);

namespace Test\phpunit\Component\Product\Communication\Controllers;

use App\Component\Product\Communication\Controllers\Frontend\ListController;
use App\System\DI\Container;
use App\System\DI\DependencyProvider;
use App\System\Smarty\ViewService;
use PHPUnit\Framework\TestCase;
use Test\phpunit\Helper\ProductHelperTest;

class ListControllerTest extends TestCase
{
    private ProductHelperTest $productHelper;

    protected function setUp(): void
    {
        parent::setUp();
        $this->productHelper = new ProductHelperTest();
    }

    protected function tearDown(): void
    {
        $this->productHelper->deleteTemporaryProducts();
        parent::tearDown();
    }

    public function testActio()
    {
        $listOfProducts = $this->productHelper->createTemporaryProducts();

        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $viewService = $container->get(ViewService::class);
        $list = new ListController($container);
        $list->action();

        $path = dirname(__DIR__,6).'/App/System/Smarty/templates/list.tpl';

        self::assertStringEndsWith('list.tpl', $viewService->getTemplate());
        self::assertFileEquals($path, $viewService->getTemplate());

        $temp = $viewService->getParams();
        self::assertArrayHasKey('productList', $temp);

        $one = $temp['productList'][3];
        self::assertSame(3, $one->getId());
        self::assertSame('tom', $one->getName());
        self::assertSame('lorem tom', $one->getDescription());
    }

}
