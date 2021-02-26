<?php
declare(strict_types=1);

namespace App\Controllers\Backend;

use App\Controllers\BackendController;
use App\Models\UserRepository;
use App\Services\Container;
use App\Services\Redirect;
use App\Services\UserSession;
use App\Services\ViewService;

class UsersListController implements BackendController
{
    public const NAME= 'userList';
    private ViewService $viewService;
    private UserRepository $userRepository;
    private UserSession $userSession;
    private Redirect $redirect;

    public function __construct(Container $container)
    {
        $this->viewService = $container->get(ViewService::class);
        $this->userRepository = $container->get(UserRepository::class);
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
        $this->viewService->addTlpParam('userList', $this->userRepository->getUserList());
    }
}