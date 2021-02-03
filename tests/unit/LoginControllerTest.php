<?php

use App\Services\ViewService;
use App\Controllers\Backend\LoginController;

class LoginControllerTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;


    public function testSetUp()
    {
        $viewService = new ViewService();
        $login = new LoginController($viewService);

        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['username'] = 'John';
        $_POST['password'] = 'a';

        $login->action();
        $login->init();

    }


    public function testLoginLogic()
    {
        $this->testSetUp();

        self::assertNotEmpty($_POST['username']);
        self::assertNotEmpty($_POST['password']);

    }

    public function testSession()
    {
        self::assertSame(session_status(), PHP_SESSION_ACTIVE);
    }
}