<?php

declare(strict_types=1);

namespace App\Controllers;


interface BackendController
{
    public function init():void ;
    public function action():void ;

}