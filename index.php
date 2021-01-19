<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\CategoryController;
use App\Controllers\IndexController;
use App\Controllers\NewArticleController;
use App\Controllers\ArticleController;
use App\Services\ViewService;


define('SMARTY_DIR', '/usr/local/lib/php/Smarty/libs/');
require_once(SMARTY_DIR . 'Smarty.class.php');


$view = new ViewService();


//$page = $_GET['page'];

switch ($_GET) {
    case $_GET['page'] === 'home': {
    //case $_GET['home']: {
        $class = new HomeController($view);
        break; }
    case $_GET['page'] === 'index': {
        $class = new IndexController($view);
        break; }
    case $_GET['page'] === 'category': {
        $class = new CategoryController($view);
        break; }
    case $_GET['page'] === 'newArticle': {
        $class = new NewArticleController($view);
        break; }
    case $_GET['page'] === 'article': {
        $class = new ArticleController($view);
        break; }
    default:
        //var_dump(http_response_code(404));
        echo "<h1>404 Not Found</h1>";
        echo 'The page that you have requested could not be found.';
        break;
}

$class->addTemplate();
$view->assignName($_GET['page'] );
$view->display();




