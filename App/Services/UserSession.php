<?php

declare(strict_types=1);


namespace App\Services;


class UserSession
{
    public function __construct()
    {
        if(session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public function isLogIn() :bool
    {
        return isset($_SESSION['username']) && !empty($_SESSION['username']);

    }

    public function steUserName(string $userName) : void
    {
        $_SESSION['username'] = $userName;

    }

    public function getUserName() : string
    {
        return $_SESSION['username'];

    }

}