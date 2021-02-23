<?php


namespace App\Services;


use App\Controllers\Backend\LoginController;
use App\Controllers\Backend\ProductController;
use App\Controllers\Backend\CategoryController;
use App\Controllers\Frontend\ErrorController;
use App\Controllers\Frontend\HomeController;
use App\Controllers\Frontend\IndexController;
use App\Controllers\Frontend\LabelProductController;
use App\Controllers\Frontend\ListController;
use App\Controllers\Frontend\NewProductController;

class ControllerProvider
{

    public function getFrontEndList(): array
    {
        return [
            ErrorController::class,
            HomeController::class,
            IndexController::class,
            LabelProductController::class,
            ListController::class,
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