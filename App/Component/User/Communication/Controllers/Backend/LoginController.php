<?php declare(strict_types=1);

namespace App\Component\User\Communication\Controllers\Backend;

use App\Component\User\Business\UserBusinessFacade;
use App\Component\User\Business\UserBusinessFacadeInterface;
use App\Shared\Controller\BackendController;
use App\System\DI\Container;
use App\System\Session\UserSession;
use App\System\Smarty\Redirect;
use App\System\Smarty\ViewService;

class LoginController implements BackendController
{

    public const NAME = 'login';
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
            if (!empty(trim($_POST['username'])) && !empty(trim($_POST['password']))) {
                $username = (string)trim($_POST['username']);
                $password = (string)trim($_POST['password']);
               // if ($this->userRepository->getUser($username, $password)) {
                if ($this->userBusinessFacade->getUser($username, $password)) {
                        $this->userSession->steUserName($username);
                    $this->redirect->redirectToBackend('index.php?page=category&admin=true');
                }
                $this->viewService->setTemplate('error.tpl');
            }
        }
        $this->viewService->setTemplate('login.tpl');
    }
}