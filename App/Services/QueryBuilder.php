<?php


namespace App\Services;


use PDO;

class QueryBuilder
{
    protected PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table): array
    {
        $stm = $this->pdo->query('Select * from ' . $table);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectItemWhereId(int $id, string $table)
    {
        $stm = $this->pdo->query('Select * from '.$table.' Where id='.$id);
        return $stm->fetch(PDO::FETCH_ASSOC);

    }

}