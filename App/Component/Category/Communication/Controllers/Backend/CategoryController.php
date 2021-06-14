<?php declare(strict_types=1);

namespace App\Component\Category\Communication\Controllers\Backend;

use App\Component\Category\Business\CategoryBusinessFacade;
use App\Shared\Controller\BackendController;
use App\Shared\Dto\CategoryDataTransferObject;
use App\System\DI\Container;
use App\System\Session\UserSession;
use App\System\Smarty\Redirect;
use App\System\Smarty\ViewService;

class CategoryController implements BackendController
{

    public const NAME = 'category';
    private CategoryBusinessFacade $categoryBusinessFacade;
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

    public function init(): void
    {
        if (!$this->userSession->isLogIn()) {
            $_SESSION['username'] = true;
            $this->redirect->redirectToBackend('index.php?page=login&admin=true');
        }
    }

    public function action(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch ($_POST) {
                case (isset($_POST['save'])):
                    if (!empty(trim($_POST['categoryName']))) {
                        if (!empty($_POST['save'])) {
                            $categoryId = (int)trim($_POST['save']);
                        } else {
                            $categoryId = 0;
                        }
                        $categoryName = (string)trim($_POST['categoryName']);
                        $this->saveCategory($categoryId, $categoryName);

                        $this->redirect->redirectToBackend('index.php?page=categoryList&admin=true');
                    }
                    break;
                case (isset($_POST['delete'])):
                    $categoryId = (int)$_POST['delete'];
                    $this->deleteCategory($categoryId);
                    $this->redirect->redirectToBackend('index.php?page=categoryList&admin=true');
                    break;
            }
        }
        $this->loadView();
    }

    private function deleteCategory(int $categoryId): void
    {
        $categoryDataTransferObject = $this->categoryBusinessFacade->getCategoryById($categoryId);
        $this->categoryBusinessFacade->delete($categoryDataTransferObject);
    }

    private function saveCategory(int $categoryId, string $categoryName): void
    {
        if ($categoryId !== 0) {
            $categoryDataTransferObject = $this->categoryBusinessFacade->getCategoryById($categoryId);
            $categoryDataTransferObject->setId($categoryId);
        } else {
            $categoryDataTransferObject = new CategoryDataTransferObject();
            $categoryDataTransferObject->setId(0);

        }
        $categoryDataTransferObject->setName($categoryName);
        $this->categoryBusinessFacade->save($categoryDataTransferObject);
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
            $this->viewService->addTlpParam('category', $this->categoryBusinessFacade->getCategoryById($pageId));
            $this->viewService->setTemplate('category.tpl');

        } catch (\Exception $e) {
            $this->viewService->setTemplate('error.tpl');
        }
    }

}