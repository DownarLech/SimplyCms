<?php declare(strict_types=1);

namespace App\Services;

use PDO;

class QueryBuilder
{
    private PDO $pdo;

    public function __construct(Container $container)
    {
        $sqlConnector = $container->get(SQLConnector::class);
        $this->pdo = $sqlConnector->get();
    }

    public function selectAll(string $table): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOneWhereId(string $table, int $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = :id");
        $statement->bindParam('id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function selectOneWhereId2(string $table, int $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = ?");
        $statement->execute($id);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function selectOneWhereUserNameAndPassword(string $table, string $userName, string $password)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE userName = :userName AND password = :password");
        $statement->bindParam('userName', $userName, PDO::PARAM_STR);
        $statement->bindParam('password', $password, PDO::PARAM_STR);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteWhereId(string $table, int $id): void
    {
        $statement = $this->pdo->prepare("DELETE FROM {$table}  WHERE id = :id");
        $statement->bindParam('id', $id, PDO::PARAM_INT);

        $statement->execute();
    }

    public function updateTableSetNameDescriptionWhereId(string $table, string $productName, string $description, int $id): void
    {
        $statement = $this->pdo->prepare("UPDATE {$table} SET productName = :productName , description = :description WHERE id = :id ");

        $statement->bindParam('productName', $productName);
        $statement->bindParam('description', $description);
        $statement->bindParam('id', $id);

        $statement->execute();
    }

    public function updateTableSetNamePasswordRoleWhereId (string $table, string $userName, string $password, string $userRole, int $id): void
    {
        $statement = $this->pdo->prepare("UPDATE {$table} SET username = :userName, password = :password, userrole = :userRole WHERE id = :id");

        $statement->bindParam('userName', $userName);
        $statement->bindParam('password', $password);
        $statement->bindParam('userRole', $userRole);
        $statement->bindParam('id', $id);

        $statement->execute();
    }

    public function insertIntoTableNameDescription(string $table, string $productName, string $description): int
    {
        $statement = $this->pdo->prepare("INSERT INTO {$table} (productName, description) VALUES (:productName, :description)");

        $statement->bindParam('productName', $productName);
        $statement->bindParam('description', $description);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function insertIntoTableNamePasswordRole(string $table, string $userName, string $password, string $userRole): int
    {
        $statement = $this->pdo->prepare("INSERT INTO {$table} (userName, password, userrole) VALUES (:userName, :password, :userrole)");

        $statement->bindParam('userName', $userName);
        $statement->bindParam('password', $password);
        $statement->bindParam('userrole', $userRole);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function prepareExecute($query): void
    {
        $stm = $this->pdo->prepare($query);
        $stm->execute();
    }

}