<?php

declare(strict_types=1);

namespace App\Controllers\Backend;

use App\Models\ProductRepository;
use App\Services\Redirect;
use App\Services\UserSession;
use App\Services\ViewService;

class CategoryController
{
    public const NAME= 'category';
    private ViewService $viewService;
    private ProductRepository $productRepository;
    private UserSession $userSession;
    private Redirect $redirect;

    public function __construct(ViewService $viewService)
    {
        $this->viewService = $viewService;
        $this->productRepository = new ProductRepository();
        $this->userSession = new UserSession();
        $this->redirect = new Redirect();
    }

    public function init() : void {
        if(!$this->userSession->isLogIn()) {
            //$this->redirectToBackend('index.php?page=login&admin=true');
        }
    }

    public function action() : void {
        $this->viewService->setTemplate('categoryPage.tpl');
        $this->viewService->addTlpParam('productList', $this->productRepository->getProductList());
    }

}