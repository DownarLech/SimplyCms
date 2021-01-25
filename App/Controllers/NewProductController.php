<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\ViewService;

class NewProductController
{
    public const NAME = 'newProduct';
    private ViewService $viewService;

    public function __construct(ViewService $viewService)
    {
        $this->viewService = $viewService;
    }

    public function action() : void {
        $this->viewService->setTemplate('newProduct.tpl');
        //$this->viewService->addTlpParam('ProductList', $this->productRepository->getProductList());
    }



    public function addTemplate(): void
    {
        $this->viewService->setTemplate('newProduct.tpl');
    }
}