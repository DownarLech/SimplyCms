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
            $this->set('SimplyCmsDB', 'localhost', 'root','12Mysql#');
            //$this->set('mysql:dbname='.$this->dBname.';host='.$this->host.'',$this->user,$this->pass);

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
       //$this->pdo = new PDO($dsn,$user,$pass);
        $this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }

}