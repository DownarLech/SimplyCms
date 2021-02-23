<?php

use App\Controllers\Frontend\IndexController;
use App\Services\ViewService;

class IndexControllerTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    

    public function testSomeFeature()
    {
        $viewService = new ViewService();
        $home = new IndexController($viewService);
        $home->action();

        $path = dirname(__DIR__,2).'/App/Smarty/templates/index.tpl';

        self::assertStringEndsWith('index.tpl', $viewService->getTemplate());
        self::assertFileEquals($path, $viewService->getTemplate());

    }
}