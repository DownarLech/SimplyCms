<?php declare(strict_types=1);

namespace App\System\DI;

use App\Component\Category\Communication\Controllers\Backend\CategoryController;
use App\Component\Category\Communication\Controllers\Backend\CategoryListController;
use App\Component\Product\Communication\Controllers\Backend\ProductListController;
use App\Component\Product\Communication\Controllers\Backend\ProductController;
use App\Component\Product\Communication\Controllers\Frontend\LabelProductController;
use App\Component\Product\Communication\Controllers\Frontend\ListController;
use App\Component\User\Communication\Controllers\Backend\LoginController;
use App\Component\User\Communication\Controllers\Backend\UserController;
use App\Component\User\Communication\Controllers\Backend\UsersListController;
use App\Shared\Controller\Frontend\ErrorController;
use App\Shared\Controller\Frontend\HomeController;
use App\Shared\Controller\Frontend\IndexController;


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
            ProductListController::class,
            LoginController::class,
            ProductController::class,
            UserController::class,
            UsersListController::class,
            CategoryController::class,
            CategoryListController::class
        ];
    }
}