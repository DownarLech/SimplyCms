<?php declare(strict_types=1);

namespace App\Shared\Controller\Frontend;

use App\Shared\Controller\Controller;
use App\System\DI\Container;
use App\System\Smarty\ViewService;

class HomeController implements Controller
{

    public const NAME= 'home';
    private ViewService $viewService;

    public function __construct(Container $container)
    {
        $this->viewService = $container->get(ViewService::class);
    }

    public function action() : void {
        $this->viewService->setTemplate('home.tpl');
        //$this->viewService->addTlpParam('productList', $this->productRepository->getProductList());
    }

}