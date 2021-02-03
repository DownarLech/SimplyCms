<?php

declare(strict_types=1);

namespace App\Services;

use PDO;
use phpDocumentor\Reflection\Types\Null_;

class SQLConnector
{
    private PDO $pdo;

    private string $host;
    private string $user;
    private string $pass;
    private string $dBname;


    public function __construct()
    {
        $this->dBname = 'SimplyCmsDB';
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '12Mysql#';
    }

    public function __destruct()
    {

    }

    public function connect(): void
    {

        try {
            $this->set('mysql:dbname='.$this->dBname.';host='.$this->host.'',$this->user,$this->pass);

        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function get(): object
    {
        return $this->pdo;

    }

    private function set(string $dsn, string $user, string $pass): void
    {
        $this->pdo = new PDO($dsn,$user,$pass);

    }

}