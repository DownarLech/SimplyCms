<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\ViewService;

class HomeController
{

    public static string $name= 'home';
    private ViewService $viewService;

    public function __construct(ViewService $viewService)
    {
        $this->viewService = $viewService;
    }


    public function addTemplate(): void
    {
        $this->viewService->setTemplate('home.tpl');
    }

}