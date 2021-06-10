<?php declare(strict_types=1);

namespace App\Component\Product\Communication\Controllers\Frontend;

use App\Component\Product\Business\ProductBusinessFacade;
use App\Component\Product\Business\ProductBusinessFacadeInterface;
use App\Shared\Controller\Controller;
use App\System\DI\Container;
use App\System\Smarty\ViewService;

class ListController implements Controller
{

    public const NAME = 'list';
    private ProductBusinessFacadeInterface $productBusinessFacade;
    private ViewService $viewService;


    public function __construct(Container $container)
    {
        $this->productBusinessFacade = $container->get(ProductBusinessFacade::class);
        $this->viewService = $container->get(ViewService::class);
    }


    public function action(): void
    {
        $this->viewService->setTemplate('list.tpl');
        $this->viewService->addTlpParam('productList', $this->productBusinessFacade->getProductList());
    }

}