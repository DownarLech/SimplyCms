<?php declare(strict_types=1);

namespace Test;


use App\Shared\Controller\Frontend\HomeController;
use App\System\DI\Container;
use App\System\DI\DependencyProvider;
use App\System\Smarty\ViewService;
use PHPUnit\Framework\TestCase;

class HomeControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testAction()
    {

        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $viewService = $container->get(ViewService::class);

        $home = new HomeController($container);
        $home->action();

        $path = dirname(__DIR__,4).'/App/Smarty/templates/home.tpl';

        self::assertStringEndsWith('home.tpl', $viewService->getTemplate());
        self::assertFileEquals($path, $viewService->getTemplate());
    }
}
