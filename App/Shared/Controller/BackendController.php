<?php declare(strict_types=1);

namespace App\Shared\Controller;

interface BackendController extends Controller
{
    public function init(): void;
}