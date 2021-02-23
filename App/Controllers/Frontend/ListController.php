<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Controllers\Controller;
use App\Models\ProductRepository;
use App\Services\Container;
use App\Services\Redirect;
use App\Services\UserSession;
use App\Services\ViewService;

class ListController implements Controller
{

    public const NAME = 'list';
    private ViewService $viewService;
    private ProductRepository $productRepository;


    public function __construct(Container $container)
    {
        $this->viewService = $container->get(ViewService::class);
        $this->productRepository = $container->get(ProductRepository::class);
    }


    public function action(): void
    {
        $this->viewService->setTemplate('list.tpl');
        $this->viewService->addTlpParam('productList', $this->productRepository->getProductList());
    }

}