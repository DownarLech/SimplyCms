<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\ProductRepository;
use App\Services\ViewService;

class CategoryController
{
    public const NAME= 'category';
    private ViewService $viewService;
    private ProductRepository $productRepository;

    public function __construct(ViewService $viewService)
    {
        $this->viewService = $viewService;
        $this->productRepository = new ProductRepository();
    }

    public function action() : void {
        $this->viewService->setTemplate('categoryPage.tpl');
        $this->viewService->addTlpParam('productList', $this->productRepository->getProductList());
    }

    public function addTemplate(): void
    {
        $this->viewService->setTemplate('categoryPage.tpl');
    }


}