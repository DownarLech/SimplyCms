<?php

declare(strict_types=1);

namespace App\Controllers\Backend;

use App\Models\ProductRepository;
use App\Services\UserSession;
use App\Services\ViewService;

class CategoryController
{
    public const NAME= 'category';
    private ViewService $viewService;
    private ProductRepository $productRepository;
    private UserSession $userSession;

    public function __construct(ViewService $viewService)
    {
        $this->viewService = $viewService;
        $this->productRepository = new ProductRepository();
        $this->userSession = new UserSession();
    }

    public function init() : void {
        if(!$this->userSession->isLogIn()) {
            //$this->redirectToBackend();
        }
    }

    public function action() : void {
        $this->viewService->setTemplate('categoryPage.tpl');
        $this->viewService->addTlpParam('productList', $this->productRepository->getProductList());
    }


    private function redirectToBackend():void
    {
        header('Location: http://localhost:8080/index.php?page=login&admin=true');


    }


}