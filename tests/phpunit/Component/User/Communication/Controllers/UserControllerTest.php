<?php declare(strict_types=1);

namespace Test\phpunit\Component\User\Communication\Controllers;

use App\Component\User\Communication\Controllers\Backend\UserController;
use App\Component\User\Persistence\Models\UserRepository;
use App\System\DI\Container;
use App\System\DI\DependencyProvider;
use App\System\Smarty\ViewService;
use PHPUnit\Framework\TestCase;
use Test\phpunit\Helper\UserHelperTest;

class UserControllerTest extends TestCase
{
    private UserHelperTest $userHelper;
    private ViewService $viewService;
    private UserController $userController;
    private UserRepository $userRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $this->viewService = $container->get(ViewService::class);
        $this->userController = new UserController($container);
        $this->userRepository = new UserRepository($container);
        $this->userHelper = new UserHelperTest();

        $this->userHelper->createTemporaryUsers();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $_GET = [];
        $this->userHelper->deleteTemporaryUsers();
    }

    /**
     * @runInSeparateProcess
     */
    public function testActionSaveUser(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['save'] = '1';
        $_POST['username'] = 'Kate';
        $_POST['password'] = 'd';
        $_POST['userrole'] = 'Customer';


        $this->userController->action();

        $valueFromDatabase = $this->userRepository->getUserById(1);

        self::assertSame('Kate', $valueFromDatabase->getUserName());
        self::assertSame('d', $valueFromDatabase->getPassword());
        self::assertSame('Customer', $valueFromDatabase->getUserRole());

    }


    /**
     * @runInSeparateProcess
     */
    public function testActionDeleteUser(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['delete'] = '1';

        $this->userController->action();

        self::assertNull($this->userRepository->getUserById(1), 'NULL. The product was deleted.');
    }



    public function testLoadView()
    {
        $_GET['id'] = 1;
        $this->userController->loadView();

        $temp = $this->viewService->getParams();
        self::assertArrayHasKey('user', $temp);

        $one = $temp['user'];
        self::assertSame(1, $one->getId());
        self::assertSame('John', $one->getUserName());
        self::assertSame('a', $one->getPassword());
        self::assertSame('Admin', $one->getUserRole());
    }


    public function testLoadViewError()
    {
        $_GET['id'] = 0;
        $this->userController->loadView();

        self::assertStringEndsWith('error.tpl', $this->viewService->getTemplate());
        //$this->expectException(Exception::class);
    }

}
