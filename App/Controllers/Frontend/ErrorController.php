<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Services\ViewService;

class ErrorController
{

    public const NAME= 'error';
    private ViewService $viewService;

    public function __construct(ViewService $viewService)
    {
        $this->viewService = $viewService;
    }

    public function action() : void {
        $this->viewService->setTemplate('error.tpl');
    }

}