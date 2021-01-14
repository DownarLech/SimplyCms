<?php declare(strict_types=1);

namespace App\Controllers;


class ArticleController
{

    public  function action() {
        echo include 'App/Views/index.view.php';
    }

    public  function showNewArticle() {
        echo include 'App/Views/newArticle.view.php';
    }

    public  function showArticle() {
        echo include 'App/Views/article.view.php';
    }

    public  function showCategoryPage() {
        echo include 'App/Views/categoryPage.view.php';
    }

    public  function showHome() {
        echo include 'App/Views/home.view.php';
    }


}
