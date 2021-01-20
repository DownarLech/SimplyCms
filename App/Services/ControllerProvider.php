<?php


namespace App\Services;


use App\Controllers\ArticleController;
use App\Controllers\CategoryController;
use App\Controllers\ErrorController;
use App\Controllers\HomeController;
use App\Controllers\IndexController;
use App\Controllers\NewArticleController;

class ControllerProvider
{
    public function getList() : array {

        return [
            ArticleController::class,
            CategoryController::class,
            HomeController::class,
            IndexController::class,
            NewArticleController::class,
            ErrorController::class
        ];
    }

}