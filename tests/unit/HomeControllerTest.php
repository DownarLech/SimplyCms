<?php

use App\Controllers\Frontend\HomeController;
use App\Services\ViewService;

class HomeControllerTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
       public function testSomeFeature()
    {

        $viewService = new ViewService();
        $home = new HomeController($viewService);
        $home->action();

        $path = dirname(__DIR__,2).'/App/Smarty/templates/home.tpl';

        self::assertStringEndsWith('home.tpl', $viewService->getTemplate());
        self::assertFileEquals($path, $viewService->getTemplate());


    }
}