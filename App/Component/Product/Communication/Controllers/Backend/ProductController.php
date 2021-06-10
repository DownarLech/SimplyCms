<?php declare(strict_types=1);

namespace App\Component\Product\Communication\Controllers\Backend;

use App\Component\Product\Business\ProductBusinessFacade;
use App\Component\Product\Business\ProductBusinessFacadeInterface;
use App\Shared\Controller\BackendController;
use App\Shared\Dto\ProductDataTransferObject;
use App\System\DI\Container;
use App\System\Session\UserSession;
use App\System\Smarty\Redirect;
use App\System\Smarty\ViewService;

class ProductController implements BackendController
{
    public const NAME = 'product';
    private ProductBusinessFacadeInterface $productBusinessFacade;
    private ViewService $viewService;
    private UserSession $userSession;
    private Redirect $redirect;


    public function __construct(Container $container)
    {
        $this->productBusinessFacade = $container->get(ProductBusinessFacade::class);
        $this->viewService = $container->get(ViewService::class);
        $this->userSession = $container->get(UserSession::class);
        $this->redirect = $container->get(Redirect::class);
    }

    public function init(): void
    {
        if (!$this->userSession->isLogIn()) {
            $_SESSION['username']=true;
            $this->redirect->redirectToBackend('index.php?page=login&admin=true');
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

    private function deleteProduct(int $productId): void
    {
        $productDataTransferObject = $this->productBusinessFacade->getProductById($productId);
        $this->productBusinessFacade->delete($productDataTransferObject);
    }


    private function saveProduct(int $productId, string $productName, string $description): void
    {
        //$productId = $this->productRepository->getProduct($productId);
        if ($productId !== 0) {
            $productDataTransferObject = $this->productBusinessFacade->getProductById($productId);

            $productDataTransferObject->setId($productId);

        } else {
            $productDataTransferObject = new ProductDataTransferObject();
            $productDataTransferObject->setId(0);
        }
        $productDataTransferObject->setName($productName);
        $productDataTransferObject->setDescription($description);

        $this->productBusinessFacade->save($productDataTransferObject);
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
            $this->viewService->addTlpParam('product', $this->productBusinessFacade->getProductById($pageId));
            $this->viewService->setTemplate('product.tpl');

        } catch (\Exception $e) {
            //dump(__FILE__ . '/' . __LINE__);

            $this->viewService->setTemplate('error.tpl');
        }
    }

}
