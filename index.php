<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//use App\Controllers\ArticleController;

//require __DIR__ . '/vendor/autoload.php';

//$class = $_GET['page'];

/*
if ($class === 'article') {
    $articleController = new ArticleController();
    $articleController->action();
}
*/

require('/home/developer/PhpstormProjects/SimplyCms/App/Smarty/libs/Smarty.class.php');


$smarty = new Smarty();

$smarty->setTemplateDir('App/Smarty/templates');
$smarty->setCompileDir('App/Smarty/templates_c');
$smarty->setCacheDir('App/Smarty/cache');
$smarty->setConfigDir('App/Smarty/configs');


$smarty->assign('name', 'Ned');
$smarty->display('index.tpl');


/*
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
*/



