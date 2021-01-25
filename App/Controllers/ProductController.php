<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\ProductRepository;
use App\Services\ViewService;

class ProductController
{
    public const NAME= 'product';
    private ViewService $viewService;
    private ProductRepository $productRepository;


    public function __construct(ViewService $viewService)
    {
        $this->viewService = $viewService;
        $this->productRepository = new ProductRepository();
    }

    public function action() : void {
        $this->viewService->setTemplate('product.tpl');
        $this->viewService->addTlpParam('ProductList', $this->productRepository->getProductList());
    }



    public function addTemplate(): void
    {
        $this->viewService->setTemplate('product.tpl');
    }

}
