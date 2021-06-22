<?php declare(strict_types=1);

namespace Test\phpunit\Shared\Controller\Frontend;


use App\Shared\Controller\Frontend\IndexController;
use App\System\DI\Container;
use App\System\DI\DependencyProvider;
use App\System\Smarty\ViewService;
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

        $path = dirname(__DIR__,5).'/App/System/Smarty/templates/index.tpl';

        self::assertStringEndsWith('index.tpl', $viewService->getTemplate());
        self::assertFileEquals($path, $viewService->getTemplate());
    }


}
