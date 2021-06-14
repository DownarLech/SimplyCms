<?php declare(strict_types=1);

namespace App\Component\Product\Communication\Controllers\Backend;

use App\Component\Product\Business\ProductBusinessFacade;
use App\Component\Product\Business\ProductBusinessFacadeInterface;
use App\Shared\Controller\BackendController;
use App\System\DI\Container;
use App\System\Session\UserSession;
use App\System\Smarty\Redirect;
use App\System\Smarty\ViewService;

class ProductListController implements BackendController
{
    public const NAME= 'productList';
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

    public function init() : void {
        if(!$this->userSession->isLogIn()) {
            $_SESSION['username']=true;
            $this->redirect->redirectToBackend('index.php?page=login&admin=true');
        }
    }

    public function action() : void {
        $this->viewService->setTemplate('productList.tpl');
        $this->viewService->addTlpParam('productList', $this->productBusinessFacade->getProductList());
    }
}