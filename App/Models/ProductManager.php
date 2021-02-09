<?php


namespace App\Models;


use App\Models\Dto\ProductDataTransferObject;
use App\Services\QueryBuilder;
use App\Services\SQLConnector;
use PDO;

class ProductManager
{
    private QueryBuilder $queryBuilder;
    private SQLConnector $sqlConnector;

    /**
     * ProductMenager constructor.
     * @param QueryBuilder $queryBuilder
     * @param SQLConnector $sqlConnector
     */
    public function __construct(SQLConnector $sqlConnector)
    {
        $this->sqlConnector = $sqlConnector;
        $this->queryBuilder = new QueryBuilder($this->sqlConnector);
    }


    public function save(ProductDataTransferObject $productDataTransferObject): void
    {
        $values = [];

        if ($productDataTransferObject->getId() !== 0) {

            $values['id'] = $productDataTransferObject->getId();
            $values['productName'] = $productDataTransferObject->getName();
            $values['description'] = $productDataTransferObject->getDescription();

            $sql = "Update Products SET productName = '".$values['productName']."', description ='".$values['description']."' WHERE id = '".$values['id']."';";
        } else {

            $values['productName'] = $productDataTransferObject->getName();
            $values['description'] = $productDataTransferObject->getDescription();

            $sql = 'Insert into Products (productName, description) values (\'' . $values['productName'] . '\',\'' . $values['description'] . '\');';
        }

        if ($this->queryBuilder->queryMake($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>";
        }
    }

}