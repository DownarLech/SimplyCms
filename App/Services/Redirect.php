<?php

declare(strict_types=1);


namespace App\Services;


class Redirect
{

    public function redirectToBackend($target): void
    {
        header('Location: http://localhost:8080/' . $target);
        //$this->viewService->setTemplate('category');
        exit();

    }


}