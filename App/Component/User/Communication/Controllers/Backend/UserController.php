<?php declare(strict_types=1);

namespace App\Component\User\Communication\Controllers\Backend;

use App\Component\User\Business\UserBusinessFacade;
use App\Component\User\Business\UserBusinessFacadeInterface;
use App\Shared\Controller\BackendController;
use App\Shared\Dto\UserDataTransferObject;
use App\System\DI\Container;
use App\System\Session\UserSession;
use App\System\Smarty\Redirect;
use App\System\Smarty\ViewService;

class UserController implements BackendController
{
    public const NAME = 'user';
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
            $this->viewService->addTlpParam('user', $this->userBusinessFacade->getUserById($pageId));
            $this->viewService->setTemplate('user.tpl');

        } catch (\Exception $e) {
            //dump(__FILE__ . '/' . __LINE__);
            $this->viewService->setTemplate('error.tpl');
        }
    }

    /**
     * @throws \Exception
     */
    private function deleteUserWhereId(int $userId): void
    {
        $userDataTransferObject = $this->userBusinessFacade->getUserById($userId);
        $this->userBusinessFacade->delete($userDataTransferObject);
    }

    private function deleteUserWhereNameAndPassword(string $userName, string $password): void
    {
        $userDataTransferObject = $this->userBusinessFacade->getUser($userName, $password);
        $this->userBusinessFacade->delete($userDataTransferObject);
    }

    private function saveUser(int $userId, string $userName, string $password, string $userRole): void
    {
        //$productId = $this->productRepository->getProduct($productId);
        if ($userId !== 0) {
            $userDataTransferObject = $this->userBusinessFacade->getUserById($userId);
            $userDataTransferObject->setId($userId);

        } else {
            $userDataTransferObject = new UserDataTransferObject();
            $userDataTransferObject->setId(0);
        }
        $userDataTransferObject->setUserName($userName);
        $userDataTransferObject->setPassword($password);
        $userDataTransferObject->setUserRole($userRole);

        $this->userBusinessFacade->save($userDataTransferObject);
    }

}