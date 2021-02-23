<?php
declare(strict_types=1);

session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'vendor/autoload.php';

use App\Models\ProductRepository;
use App\Services\DependencyProvider;
use App\Services\ViewService;
use App\Services\Container;
use App\Services\ControllerProvider;
use App\Controllers\Frontend\ErrorController;

define('SMARTY_DIR', '/usr/local/lib/php/Smarty/libs/');
require_once(SMARTY_DIR . 'Smarty.class.php');


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$container = new Container();
$containerProvider = new DependencyProvider();
$containerProvider->providerDependency($container);

$provider = new ControllerProvider();
//$controllerList = $provider->getList();

$page = $_GET['page'];
$checked = false;
$isAdmin = (!empty($_GET['admin']) && $_GET['admin'] === 'true');

if ($isAdmin) {
    $controllerList = $provider->getBackEndList();
} else {
    $controllerList = $provider->getFrontEndList();
}

if(isset($page)){
    foreach ($controllerList as $controller){

        if($page === $controller::NAME) {
            $checked = true;
            $controller = new $controller($container);
            if($isAdmin) {
                $controller->init();
            }
            $controller->action();
        }
    }
}
if(!$checked) {
    $controller = new ErrorController($container);
    $controller->action();
}

$viewServices = $container->get(ViewService::class);
$viewServices->addTlpParam('name',$page);
$viewServices->display();


//$temp= new ProductRepository();
//die(var_dump($temp->getProductList()));
//die(var_dump($temp->getProduct(2)));