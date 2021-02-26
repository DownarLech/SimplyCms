<?php

declare(strict_types=1);

namespace App\Services;

use PDO;
use phpDocumentor\Reflection\Types\Null_;

class SQLConnector
{
    private PDO $pdo;

    public function __construct()
    {
        try {
            $this->set($_ENV['DB_DATABASE'],$_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);

        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

   public function get(): PDO
    {
        return $this->pdo;
    }

    private function set(string $dBname, string $host, string $user, string $pass): void
    {
        $this->pdo = new PDO('mysql:dbname='.$dBname.';host='.$host.'',$user,$pass);
        $this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }

}