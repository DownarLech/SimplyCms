<?php


namespace App\Services;


use PDO;

class QueryBuilder
{
    private PDO $pdo;

    public function __construct(SQLConnector $connector)
    {
        $this->pdo = $connector->get();
    }

    public function fetchAll($query): array
    {
        $stm = $this->pdo->query($query);
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

    public function fetchOne($query)
    {
        $stm = $this->pdo->query($query);
        return $stm->fetch(PDO::FETCH_ASSOC);

    }

    public function queryMake($query) //zmienic nazwe
    {
        return $this->pdo->exec($query);
    }

}