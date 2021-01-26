<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'vendor/autoload.php';

use App\Models\ProductRepository;
use App\Services\ViewService;
use App\Services\Container;
use App\Services\ControllerProvider;
use App\Controllers\ErrorController;


define('SMARTY_DIR', '/usr/local/lib/php/Smarty/libs/');
require_once(SMARTY_DIR . 'Smarty.class.php');


//$container = new Container();
//$container->set(ViewService::class, new ViewService());
//$properCont = $container->get(ViewService::class);

$properCont = new ViewService();

$provider = new ControllerProvider();
$controllerList = $provider->getList();

$page = $_GET['page'];
$checked = false;

if(isset($page)){
    foreach ($controllerList as $controller){

        if($page === $controller::NAME) {
            $checked = true;
            $controller = new $controller($properCont);
            $controller->action();
            $properCont->addTlpParam('name',$page);
            $properCont->display();
        }
    }
}
if(!$checked) {
    $controller = new ErrorController($properCont);
    $controller->action();
    $properCont->display();
}

//$temp= new ProductRepository();
//die(var_dump($temp->getProductList()));
//die(var_dump($temp->getProduct(2)));







