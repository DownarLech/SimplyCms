<?php

declare(strict_types=1);

namespace App\Controllers\Backend;

use App\Models\ProductRepository;
use App\Services\Redirect;
use App\Services\SQLConnector;
use App\Services\UserSession;
use App\Services\ViewService;
use InvalidArgumentException;

class ProductController
{
    public const NAME = 'product';
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

    public function init(): void
    {
        if (!$this->userSession->isLogIn()) {
            //$this->redirectToBackend('index.php?page=login&admin=true');
        }
    }

    public function action(): void
    {

        try {
            $pageId = 0;
            if(isset($_GET['id'])) {
                $pageId = (int)$_GET['id'];
            }

            if (!$pageId) {
                throw new \Exception();
            }
            $this->viewService->addTlpParam('product', $this->productRepository->getProduct($pageId));
            $this->viewService->setTemplate('product.tpl');

        } catch (\Exception $e) {
            //dump(__FILE__ . '/' . __LINE__);

            $this->viewService->setTemplate('error.tpl');
        }
    }

}
