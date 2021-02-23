<?php
declare(strict_types=1);

namespace App\Controllers\Frontend;


use App\Controllers\Controller;
use App\Models\ProductRepository;
use App\Services\Container;
use App\Services\ViewService;

class LabelProductController implements Controller
{

    public const NAME = 'labelProduct';
    private ViewService $viewService;
    private ProductRepository $productRepository;


    public function __construct(Container $container)
    {
        $this->viewService = $container->get(ViewService::class);
        $this->productRepository = $container->get(ProductRepository::class);
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
            $this->viewService->addTlpParam('product', $this->productRepository->getProduct($pageId));
            $this->viewService->setTemplate('labelProduct.tpl');

        } catch (\Exception $e) {
            $this->viewService->setTemplate('error.tpl');
        }
    }
}