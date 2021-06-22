<?php declare(strict_types=1);

namespace App\Component\User\Communication\Controllers\Backend;

use App\Component\User\Business\UserBusinessFacade;
use App\Component\User\Business\UserBusinessFacadeInterface;
use App\Shared\Controller\BackendController;
use App\System\DI\Container;
use App\System\Session\UserSession;
use App\System\Smarty\Redirect;
use App\System\Smarty\ViewService;

class UsersListController implements BackendController
{
    public const NAME= 'userList';
    private UserBusinessFacadeInterface $userBusinessFacade;
    private ViewService $viewService;
    private UserSession $userSession;
    private Redirect $redirect;

    public function __construct(Container $container)
    {
        $this->userBusinessFacade = $container->get(UserBusinessFacade::class);
        $this->viewService = $container->get(ViewService::class);
        $this->userSession = $container->get(UserSession::class);
        $this->redirect = $container->get(Redirect::class);
    }

    public function init() : void {
        if(!$this->userSession->isLogIn()) {
            $this->redirect->redirectToBackend('index.php?page=login&admin=true');
        }
    }

    public function action() : void {
        $this->viewService->setTemplate('userList.tpl');
        $this->viewService->addTlpParam('userList', $this->userBusinessFacade->getUserList());
    }
}