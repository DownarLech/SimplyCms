<?php

use App\Controllers\Frontend\ErrorController;
use App\Services\ViewService;

class ErrorControllerTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testSomeFeature()
    {
        $viewService = new ViewService();
        $home = new ErrorController($viewService);
        $home->action();

        $path = dirname(__DIR__,2).'/App/Smarty/templates/error.tpl';

        self::assertStringEndsWith('error.tpl', $viewService->getTemplate());
        self::assertFileEquals($path, $viewService->getTemplate());

    }
}