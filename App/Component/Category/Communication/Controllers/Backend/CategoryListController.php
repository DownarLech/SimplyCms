<?php declare(strict_types=1);

namespace App\Component\Category\Communication\Controllers\Backend;

use App\Component\Category\Business\CategoryBusinessFacade;
use App\Component\Category\Business\CategoryBusinessFacadeInterface;
use App\Shared\Controller\BackendController;
use App\System\DI\Container;
use App\System\Session\UserSession;
use App\System\Smarty\Redirect;
use App\System\Smarty\ViewService;

class CategoryListController implements BackendController
{
    public const NAME= 'categoryList';
    private CategoryBusinessFacadeInterface $categoryBusinessFacade;
    private ViewService $viewService;
    private UserSession $userSession;
    private Redirect $redirect;

    public function __construct(Container $container)
    {
        $this->categoryBusinessFacade = $container->get(CategoryBusinessFacade::class);
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
        $this->viewService->setTemplate('categoryList.tpl');
        $this->viewService->addTlpParam('categoryList', $this->categoryBusinessFacade->getCategoryList());
    }


}