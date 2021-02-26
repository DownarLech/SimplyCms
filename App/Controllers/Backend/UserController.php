<?php
declare(strict_types=1);

namespace App\Controllers\Backend;


use App\Controllers\BackendController;
use App\Models\Dto\UserDataTransferObject;
use App\Models\UserManager;
use App\Models\UserRepository;
use App\Services\Container;
use App\Services\Redirect;
use App\Services\SQLConnector;
use App\Services\UserSession;
use App\Services\ViewService;

class UserController implements BackendController
{
    public const NAME = 'user';
    private ViewService $viewService;
    private UserRepository $userRepository;
    private UserSession $userSession;
    private Redirect $redirect;
    private SQLConnector $sqlConnector;
    private UserManager $userManager;

    public function __construct(Container $container)
    {
        $this->viewService = $container->get(ViewService::class);
        $this->sqlConnector = $container->get(SQLConnector::class);
        $this->userSession = $container->get(UserSession::class);
        $this->redirect = $container->get(Redirect::class);
        $this->userRepository = $container->get(UserRepository::class);
        $this->userManager = $container->get(UserManager::class);
    }

    public function init(): void
    {
        if (!$this->userSession->isLogIn()) {
            $this->redirect->redirectToBackend('index.php?page=userList&admin=true');
        }
    }

    public function action(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch ($_POST) {
                case (isset($_POST['save'])):
                    if (!empty(trim($_POST['username'])) && !empty(trim($_POST['password'])) && !empty(trim($_POST['userrole']))) {
                        if (!empty($_POST['save'])) {
                            $userId = (int)trim($_POST['save']);
                        } else {
                            $userId = 0;
                        }
                        $userName = (string)trim($_POST['username']);
                        $password = (string)trim($_POST['password']);
                        $userRole = (string)trim($_POST['userrole']);

                        $this->saveUser($userId, $userName, $password, $userRole);

                        $this->redirect->redirectToBackend('index.php?page=userList&admin=true');
                    }
                    break;
                case (isset($_POST['delete'])):
                    $userId = (int)$_POST['delete'];
                    $this->deleteUserWhereId($userId);
                    $this->redirect->redirectToBackend('index.php?page=userList&admin=true');
                    break;
            }
        }
        $this->loadView();

    }

    public function deleteUserWhereId(int $userId): void
    {
        $userDataTransferObject = $this->userRepository->getUserById($userId);
        $this->userManager->delete($userDataTransferObject);
    }

    public function deleteUserWhereNameAndPassword(string $userName, string $password): void
    {
        $userDataTransferObject = $this->userRepository->getUser($userName, $password);
        $this->userManager->delete($userDataTransferObject);
    }

    public function saveUser(int $userId, string $userName, string $password, string $userRole): void
    {
        //$productId = $this->productRepository->getProduct($productId);
        if ($userId !== 0) {
            $userDataTransferObject = $this->userRepository->getUserById($userId);
            $userDataTransferObject->setId($userId);

        } else {
            $userDataTransferObject = new UserDataTransferObject();
            $userDataTransferObject->setId(0);
        }
        $userDataTransferObject->setUserName($userName);
        $userDataTransferObject->setPassword($password);
        $userDataTransferObject->setUserRole($userRole);

        $this->userManager->save($userDataTransferObject);
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
            $this->viewService->addTlpParam('user', $this->userRepository->getUserById($pageId));
            $this->viewService->setTemplate('user.tpl');

        } catch (\Exception $e) {
            //dump(__FILE__ . '/' . __LINE__);
            $this->viewService->setTemplate('error.tpl');
        }
    }
}