<?php
declare(strict_types=1);

namespace App\Services;


use App\Controllers\Backend\LoginController;
use App\Controllers\Backend\ProductController;
use App\Controllers\Backend\CategoryController;
use App\Controllers\Backend\UserController;
use App\Controllers\Backend\UsersListController;
use App\Controllers\Frontend\ErrorController;
use App\Controllers\Frontend\HomeController;
use App\Controllers\Frontend\IndexController;
use App\Controllers\Frontend\LabelProductController;
use App\Controllers\Frontend\ListController;

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
        ];
    }

    public function getBackEndList(): array
    {
        return [
            CategoryController::class,
            LoginController::class,
            ProductController::class,
            UserController::class,
            UsersListController::class
        ];
    }

}