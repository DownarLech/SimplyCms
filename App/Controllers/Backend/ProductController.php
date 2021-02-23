<?php

declare(strict_types=1);

namespace App\Controllers\Backend;

use App\Controllers\BackendController;
use App\Models\Dto\ProductDataTransferObject;
use App\Models\ProductManager;
use App\Models\ProductRepository;
use App\Services\Container;
use App\Services\Redirect;
use App\Services\SQLConnector;
use App\Services\UserSession;
use App\Services\ViewService;


class ProductController implements BackendController
{
    public const NAME = 'product';
    private ViewService $viewService;
    private ProductRepository $productRepository;
    private UserSession $userSession;
    private Redirect $redirect;
    private SQLConnector $sqlConnector;
    private ProductManager $productManager;


    public function __construct(Container $container)
    {
        $this->viewService = $container->get(ViewService::class);
        $this->sqlConnector = $container->get(SQLConnector::class);
        $this->userSession = $container->get(UserSession::class);
        $this->redirect = $container->get(Redirect::class);
        $this->productRepository = $container->get(ProductRepository::class);
        $this->productManager = $container->get(ProductManager::class);
    }

    public function init(): void
    {
        if (!$this->userSession->isLogIn()) {
            $this->redirect->redirectToBackend('index.php?page=category&admin=true');
        }
    }

    public function action(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch ($_POST) {
                case (isset($_POST['save'])):
                    if (!empty(trim($_POST['productname'])) && !empty(trim($_POST['description']))) {
                        if (!empty($_POST['save'])) {
                            $productId = (int)trim($_POST['save']);
                        } else {
                            $productId = 0;
                        }
                        $productName = (string)trim($_POST['productname']);
                        $description = (string)trim($_POST['description']);
                        $this->saveProduct($productId, $productName, $description);

                        $this->redirect->redirectToBackend('index.php?page=category&admin=true');
                    }
                    break;
                case (isset($_POST['delete'])):
                    $productId = (int)$_POST['delete'];
                    $this->deleteProduct($productId);
                    $this->redirect->redirectToBackend('index.php?page=category&admin=true');
                    break;
            }
        }
        $this->loadView();
    }

    public function deleteProduct(int $productId): void
    {
        $productDataTransferObject = $this->productRepository->getProduct($productId);
        $this->productManager->delete($productDataTransferObject);
    }


    public function saveProduct(int $productId, string $productName, string $description): void
    {
        //$productId = $this->productRepository->getProduct($productId);
        if ($productId !== 0) {
            $productDataTransferObject = $this->productRepository->getProduct($productId);

            $productDataTransferObject->setId($productId);

        } else {
            $productDataTransferObject = new ProductDataTransferObject();
            $productDataTransferObject->setId(0);
        }
        $productDataTransferObject->setName($productName);
        $productDataTransferObject->setDescription($description);

        $this->productManager->save($productDataTransferObject);
    }


    public function loadView(): void
    {
        try {
            $pageId = 0;
            if (isset($_GET['id'])) {
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
