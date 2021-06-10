<?php declare(strict_types=1);

namespace Test;


use App\Component\User\Communication\Controllers\Backend\LoginController;
use App\System\DI\Container;
use App\System\DI\DependencyProvider;
use App\System\Smarty\Redirect;
use PHPUnit\Framework\TestCase;

class LoginControllerTest extends TestCase
{
    protected function setUp(): void
    {
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }


    public function setUpIntegrationTest(): void
    {
        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $login = new LoginController($container);

        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['username'] = 'John';
        $_POST['password'] = 'a';

        $login->init();
        $login->action();
    }

    /**
     * @runInSeparateProcess
     */
    public function testLoginLogic(): void
    {

        $this->setUpIntegrationTest();

        self::assertNotEmpty($_POST['username']);
        self::assertNotEmpty($_POST['password']);
    }

/*
    public function testSession(): void
    {
        $this->setUpIntegrationTest();
        self::assertSame(PHP_SESSION_ACTIVE, session_status());
    }
*/


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

        $login = new LoginController($container);
        $login->init();

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
        $login = new LoginController($container);
        $login->init();
    }

}
