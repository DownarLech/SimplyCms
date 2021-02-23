<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Controllers\Controller;
use App\Services\Container;
use App\Services\ViewService;

class ErrorController implements Controller
{

    public const NAME= 'error';
    private ViewService $viewService;

    public function __construct(Container $container)
    {
        $this->viewService = $container->get(ViewService::class);
    }

    public function action() : void {
        $this->viewService->setTemplate('error.tpl');
    }

}