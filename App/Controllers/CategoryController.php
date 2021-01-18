<?php


namespace App\Controllers;


class CategoryController
{

    protected \Smarty $smarty;
    protected string $template;

    public function __construct()
    {
        $this->template = dirname(__DIR__,1).'/Smarty/templates/categoryPage.html';

        $this->smarty = new \Smarty();

        $this->smarty->setTemplateDir('App/Smarty/templates');
        $this->smarty->setCompileDir('App/Smarty/templates_c');
        $this->smarty->setCacheDir('App/Smarty/cache');
        $this->smarty->setConfigDir('App/Smarty/configs');

    }


    public function action(): void
    {

        try {
            $this->smarty->display($this->template);
        } catch (\SmartyException $e) {
        } catch (\Exception $e) {
        }
    }

}