<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\ViewService;

class HomeController
{

    public const NAME= 'home';
    private ViewService $viewService;

    public function __construct(ViewService $viewService)
    {
        $this->viewService = $viewService;
    }

    public function action() : void {
        $this->viewService->setTemplate('home.tpl');
        //$this->viewService->addTlpParam('productList', $this->productRepository->getProductList());
    }


    public function addTemplate(): void
    {
        $this->viewService->setTemplate('home.tpl');
    }

}