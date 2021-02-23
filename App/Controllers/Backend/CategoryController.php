<?php

declare(strict_types=1);

namespace App\Controllers\Backend;

use App\Controllers\BackendController;
use App\Models\ProductRepository;
use App\Services\Container;
use App\Services\Redirect;
use App\Services\SQLConnector;
use App\Services\UserSession;
use App\Services\ViewService;

class CategoryController implements BackendController
{
    public const NAME= 'category';
    private ViewService $viewService;
    private ProductRepository $productRepository;
    private UserSession $userSession;
    private Redirect $redirect;

    public function __construct(Container $container)
    {
        $this->viewService = $container->get(ViewService::class);
        $this->productRepository = $container->get(ProductRepository::class);
        $this->userSession = $container->get(UserSession::class);
        $this->redirect = $container->get(Redirect::class);
    }

    public function init() : void {
        if(!$this->userSession->isLogIn()) {
            $this->redirect->redirectToBackend('index.php?page=login&admin=true');
        }
    }

    public function action() : void {
        $this->viewService->setTemplate('categoryPage.tpl');
        $this->viewService->addTlpParam('productList', $this->productRepository->getProductList());
    }
}