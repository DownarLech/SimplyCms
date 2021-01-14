<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once __DIR__.'/App/Controllers/ArticleController.php';

$class = $_GET['page'];

/*
if ($class === 'article') {
    $articleController = new ArticleController();
    $articleController->action();
}
*/

switch ($class) {
    case 'article': {
        $articleController = new ArticleController();
        $articleController->action();
} break;
    case 'new': {
        $articleController = new ArticleController();
        $articleController->showNewArticle();
        break; }
    case 'show': {
        $articleController = new ArticleController();
        $articleController->showArticle();
        break; }
    case 'category': {
        $articleController = new ArticleController();
        $articleController->showCategoryPage();
        break; }
    case 'home': {
        $articleController = new ArticleController();
        $articleController->showHome();
        break; }
    default:
        //var_dump(http_response_code(404));
        echo "<h1>404 Not Found</h1>";
        echo 'The page that you have requested could not be found.';
        break;

}




