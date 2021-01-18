<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\ViewService;

class CategoryController
{
    private ViewService $viewService;

    public function __construct(ViewService $viewService)
    {
        $this->viewService = $viewService;
    }


    public function setHomeTemplate(): void
    {
        $this->viewService->setTemplate('categoryPage.tpl');
    }


}