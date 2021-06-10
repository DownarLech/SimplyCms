<?php declare(strict_types=1);

namespace App\System\Smarty;

class Redirect
{
    public function redirectToBackend(string $target): void
    {
        header('Location: http://localhost:8080/'.$target);
        //$this->viewService->setTemplate('category');
        //exit();
    }

}