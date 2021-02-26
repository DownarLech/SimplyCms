<?php
declare(strict_types=1);

namespace Test;

use App\Controllers\Frontend\IndexController;
use App\Services\Container;
use App\Services\DependencyProvider;
use App\Services\ViewService;
use PHPUnit\Framework\TestCase;

class IndexControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testActio()
    {
        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $viewService = $container->get(ViewService::class);
        $home = new IndexController($container);
        $home->action();

        $path = dirname(__DIR__,4).'/App/Smarty/templates/index.tpl';

        self::assertStringEndsWith('index.tpl', $viewService->getTemplate());
        self::assertFileEquals($path, $viewService->getTemplate());

    }

}
