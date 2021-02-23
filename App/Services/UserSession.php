<?php

declare(strict_types=1);


namespace App\Services;


class UserSession
{
    private Redirect $redirect;

    public function __construct()
    {
           $this->redirect =  new Redirect();
    }

    public function isLogIn(): bool
    {
        return isset($_SESSION['username']) && !empty($_SESSION['username']);

    }

    public function logout(): void
    {
        unset($_SESSION['username'], $_SESSION['password']);
        $this->redirect->redirectToBackend('index.php?page=home');
    }

    public function steUserName(string $userName): void
    {
        $_SESSION['username'] = $userName;

    }

    public function getUserName(): string
    {
        return $_SESSION['username'];

    }

}