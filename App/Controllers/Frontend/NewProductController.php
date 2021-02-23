<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Controllers\Controller;
use App\Models\ProductManager;
use App\Services\Redirect;
use App\Services\SQLConnector;
use App\Services\ViewService;

class NewProductController implements Controller
{
    public const NAME = 'newProduct';
    private ViewService $viewService;
    private ProductManager $productManager;
    private SQLConnector $sqlConnector;
    private Redirect $redirect;

    public function __construct(ViewService $viewService)
    {
        $this->viewService = $viewService;
        $this->sqlConnector = new SQLConnector();
        $this->productManager = new ProductManager($this->sqlConnector);
        $this->redirect = new Redirect();
    }

    public function action(): void    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['save'])) {
                if (!empty(trim($_POST['productname'])) && !empty(trim($_POST['description'])) && !empty(trim($_POST['productId']))) {
                    $productId = (string)trim($_POST['productId']);
                    $productname = (string)trim($_POST['productname']);
                    $description = (string)trim($_POST['description']);
                    $this->productManager->save((int)$productId, $productname, $description);

                    $this->redirect->redirectToBackend('index.php?page=category&admin=true');
                }
            }
        }

        $this->viewService->setTemplate('newProduct.tpl');
    }

}