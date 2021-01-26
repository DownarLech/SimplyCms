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

        try {
            $pageId = (int)$_GET['id'];
            if (!$pageId) {
                throw new \Exception();
            }
            $this->viewService->addTlpParam('product', $this->productRepository->getProduct($pageId));
            $this->viewService->setTemplate('product.tpl');

        } catch (\Exception $e) {
            $this->viewService->setTemplate('error.tpl');
        }
    }

    public function addTemplate(): void
    {
        $this->viewService->setTemplate('product.tpl');
    }

}
