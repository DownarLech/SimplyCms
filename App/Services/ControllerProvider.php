<?php


namespace App\Services;


use App\Controllers\ProductController;
use App\Controllers\CategoryController;
use App\Controllers\ErrorController;
use App\Controllers\HomeController;
use App\Controllers\IndexController;
use App\Controllers\NewProductController;

class ControllerProvider
{
    public function getList() : array {

        return [
            ProductController::class,
            CategoryController::class,
            HomeController::class,
            IndexController::class,
            NewProductController::class,
            ErrorController::class
        ];
    }

}