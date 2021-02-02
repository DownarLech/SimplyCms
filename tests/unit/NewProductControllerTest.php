<?php

use App\Controllers\Frontend\NewProductController;
use App\Services\ViewService;

class NewProductControllerTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testSomeFeature()
    {
        $viewService = new ViewService();
        $home = new NewProductController($viewService);
        $home->action();

        $path = dirname(__DIR__,2).'/App/Smarty/templates/newProduct.tpl';

        self::assertStringEndsWith('newProduct.tpl', $viewService->getTemplate());
        self::assertFileEquals($path, $viewService->getTemplate());

    }
}