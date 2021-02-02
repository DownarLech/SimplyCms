<?php

use App\Controllers\Backend\CategoryController;
use App\Services\ViewService;

class CategoryControllerTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;


    public function testSomeFeature()
    {
        $viewService = new ViewService();
        $category = new CategoryController($viewService);

        $category->action();
        dump($viewService->getParams());

        $temp = $viewService->getParams();
        self::assertArrayHasKey('productList', $temp);

        $one = $temp['productList'][2];
        self::assertSame(2, $one->getId());
        self::assertSame('Game', $one->getName());
    }
}