<?php

declare(strict_types=1);

namespace App\Controllers\Backend;

use App\Models\ProductRepository;
use App\Services\UserSession;
use App\Services\ViewService;

class ProductController
{
    public const NAME= 'product';
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
            $this->redirectToBackend();
        }
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

    private function redirectToBackend():void
    {
        header('Location: http://localhost:8080/index.php?page=login&admin=true');

    }
}
