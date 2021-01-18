<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use App\Controllers\BaseViewController;
use App\Controllers\HomeController;
use App\Controllers\CategoryController;



define('SMARTY_DIR', '/usr/local/lib/php/Smarty/libs/');
require_once(SMARTY_DIR . 'Smarty.class.php');



$index = new HomeController('home.tpl');
$index->assignName();
$index->action();




//$smarty->assign('name', 'Ned');
//$smarty->display('index.tpl');


/*
 *
 * $class = $_GET['page'];

switch ($_GET) {
    case $_GET('page') === 'article':
    case $_GET['article']: {
        $articleController = new ArticleController();
        $articleController->action();
} break;
    case $_GET['new']: {
        $articleController = new ArticleController();
        $articleController->showNewArticle();
        break; }
    case $_GET['show']: {
        $articleController = new ArticleController();
        $articleController->showArticle();
        break; }
    case $_GET['category']: {
        $articleController = new ArticleController();
        $articleController->showCategoryPage();
        break; }
    case $_GET['home']: {
        $articleController = new ArticleController();
        $articleController->showHome();
        break; }
    default:
        //var_dump(http_response_code(404));
        echo "<h1>404 Not Found</h1>";
        echo 'The page that you have requested could not be found.';
        break;
}
*/



