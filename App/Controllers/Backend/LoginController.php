<?php

declare(strict_types=1);

namespace App\Controllers\Backend;

use App\Controllers\BackendController;
use App\Models\UserRepository;
use App\Services\Redirect;
use App\Services\UserSession;
use App\Services\ViewService;

class LoginController implements BackendController
{

    public const NAME = 'login';
    private ViewService $viewService;
    private UserRepository $userRepository;
    private UserSession $userSession;
    private Redirect $redirect;


    public function __construct(ViewService $viewService)
    {
        $this->viewService = $viewService;
        $this->userRepository = new UserRepository();
        $this->userSession = new UserSession();
        $this->redirect = new Redirect();
    }


    public function init(): void
    {
        if (!$this->userSession->isLogIn()) {
           // $this->redirect->redirectToBackend('index.php?page=home');
        }
    }

    public function action(): void
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty(trim($_POST['username'])) && !empty(trim($_POST['password']))) {
                $username = (string)trim($_POST['username']);
                $password = (string)trim($_POST['password']);
                if ($this->userRepository->hasUser($username, $password)) {
                    $this->userSession->steUserName($username);
                    $this->redirect->redirectToBackend('index.php?page=category&admin=true');
                }
                $this->viewService->setTemplate('error.tpl');
            }
        }

        $this->viewService->setTemplate('login.tpl');
    }

}