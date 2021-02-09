<?php

declare(strict_types=1);

namespace App\Controllers\Backend;

use App\Models\Dto\ProductDataTransferObject;
use App\Models\ProductManager;
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
    private ProductManager $productManager;


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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch ($_POST) {
                case (isset($_POST['save'])):
                    if (!empty(trim($_POST['productname'])) && !empty(trim($_POST['description'])))
                    {
                        $productId = (int)trim($_POST['productId']);
                        $productName = (string)trim($_POST['productname']);
                        $description = (string)trim($_POST['description']);
                        $this->saveProduct($productId, $productName, $description);

                        $this->redirect->redirectToBackend('index.php?page=category&admin=true');
                    }
                    $this->viewService->setTemplate('newProduct.tpl');
                    break;
                case (isset($_POST['delete'])):

            }
        }
        $this->leadView();
    }


    public function saveProduct(int $productId, string $productName, string $description): void
    {
        if ($this->productRepository->getProduct($productId)) {
            $productDataTransferObject = $this->productRepository->getProduct($productId);
            try {
                $productDataTransferObject->setId($productId);
            } catch (InvalidArgumentException $e) {
                echo 'is null';
            }

        } else {
            $productDataTransferObject = new ProductDataTransferObject();
            $productDataTransferObject->setId(0);
        }
        $productDataTransferObject->setName($productName);
        $productDataTransferObject->setDescription($description);

        $this->productManager->save($productDataTransferObject);
    }


    public function leadView(): void
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
