<?php declare(strict_types=1);

namespace App\Component\Product\Communication\Controllers\Frontend;


use App\Component\Product\Business\ProductBusinessFacade;
use App\Component\Product\Business\ProductBusinessFacadeInterface;
use App\Shared\Controller\Controller;
use App\System\DI\Container;
use App\System\Smarty\ViewService;

class LabelProductController implements Controller
{

    public const NAME = 'labelProduct';
    private ProductBusinessFacadeInterface $productBusinessFacade;
    private ViewService $viewService;


    public function __construct(Container $container)
    {
        $this->productBusinessFacade = $container->get(ProductBusinessFacade::class);
        $this->viewService = $container->get(ViewService::class);
    }


    public function action(): void
    {
        try {
            $pageId = 0;
            if (isset($_GET['id'])) {
                $pageId = (int)$_GET['id'];
            }

            if (!$pageId) {
                throw new \Exception();
            }
            $this->viewService->addTlpParam('product', $this->productBusinessFacade->getProduct($pageId));
            $this->viewService->setTemplate('labelProduct.tpl');

        } catch (\Exception $e) {
            $this->viewService->setTemplate('error.tpl');
        }
    }
}