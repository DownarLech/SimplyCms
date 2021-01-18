<?php


namespace App\Controllers;


class HomeController extends BaseViewController
{

    public function assignName() {
        $this->smarty->assign('name', 'Home');

    }

}