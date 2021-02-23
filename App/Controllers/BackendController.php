<?php

declare(strict_types=1);

namespace App\Controllers;


interface BackendController extends Controller
{
    public function init(): void;
}