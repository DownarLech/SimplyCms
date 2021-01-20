<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'vendor/autoload.php';

use App\Services\ViewService;
use App\Services\Container;
use App\Services\ControllerProvider;
use App\Controllers\ErrorController;


define('SMARTY_DIR', '/usr/local/lib/php/Smarty/libs/');
require_once(SMARTY_DIR . 'Smarty.class.php');



$properCont = new ViewService();

$provider = new ControllerProvider();
$controllerList = $provider->getList();

$page = $_GET['page'];
$checked = false;

if(isset($page)){
    foreach ($controllerList as $controller){

        if($page === ($controller::$name)) {
            $checked = true;
            $controller = new $controller($properCont);
            $controller->addTemplate();
            $properCont->assignName($page);
            $properCont->display();
        }
    }
}
if(!$checked) {
    $controller = new ErrorController($properCont);
    $controller->addTemplate();
    $properCont->display();
}



//$view = new ViewService();

 /*
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

 */




