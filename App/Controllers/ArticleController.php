<?php

declare(strict_types=1);

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


}
