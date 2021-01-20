<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\ViewService;

class NewArticleController
{
    public static string $name= 'newArticle';
    private ViewService $viewService;

    public function __construct(ViewService $viewService)
    {
        $this->viewService = $viewService;
    }


    public function addTemplate(): void
    {
        $this->viewService->setTemplate('newArticle.tpl');
    }
}