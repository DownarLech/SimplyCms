<?php
declare(strict_types=1);

namespace Test;

use App\Controllers\Frontend\ListController;
use App\Services\Container;
use App\Services\DependencyProvider;
use App\Services\ViewService;
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
        parent::tearDown();
        $this->productHelper->deleteTemporaryProducts();
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

        $path = dirname(__DIR__,4).'/App/Smarty/templates/list.tpl';

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
