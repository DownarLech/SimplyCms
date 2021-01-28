<?php


namespace App\Services;


use App\Controllers\Backend\LoginController;
use App\Controllers\Backend\ProductController;
use App\Controllers\Backend\CategoryController;
use App\Controllers\Frontend\ErrorController;
use App\Controllers\Frontend\HomeController;
use App\Controllers\Frontend\IndexController;
use App\Controllers\Frontend\NewProductController;

class ControllerProvider
{
    public function getList() : array
    {

        return [
            ProductController::class,
            CategoryController::class,
            HomeController::class,
            IndexController::class,
            NewProductController::class,
            ErrorController::class
        ];
    }

    public function getFrontEndList(): array
    {
        return [
            ErrorController::class,
            HomeController::class,
            IndexController::class,
            NewProductController::class
        ];
    }
    public function getBackEndList():array
    {
        return [
          CategoryController::class,
          LoginController::class,
          ProductController::class
        ];
    }

}