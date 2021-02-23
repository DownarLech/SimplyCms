<?php
declare(strict_types=1);

namespace Test;

use App\Controllers\Backend\LoginController;
use App\Models\Dto\ProductDataTransferObject;
use App\Models\UserRepository;
use App\Services\Container;
use App\Services\DependencyProvider;
use App\Services\Redirect;
use App\Services\UserSession;
use App\Services\ViewService;
use PHPUnit\Framework\TestCase;

class LoginControllerTest extends TestCase
{

    /*
        protected function setUp(): void
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

        protected function tearDown(): void
        {
            parent::tearDown();
        }


        public function testLoginLogic(): void
        {
            $this->setUp();

            self::assertNotEmpty($_POST['username']);
            self::assertNotEmpty($_POST['password']);
        }


        public function testSession(): void
        {
            self::assertSame(session_status(), PHP_SESSION_ACTIVE);
        }

*/


    public function testInit()
    {
        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $mockRedirect = $this->createMock(Redirect::class);
        $mockRedirect->expects(self::once())
            ->method('redirectToBackend')
            ->with(self::equalTo('index.php?page=login&admin=true'));

        $container->set(Redirect::class, $mockRedirect);

        $login = new LoginController($container);
        $login->init();

        self::assertTrue($_SESSION['username']);
    }


    public function testInitNegativ()
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
