<?php declare(strict_types=1);


namespace App\Models;


use App\Models\Dto\ProductDataTransferObject;
use App\Services\Container;
use App\Services\QueryBuilder;
use App\Services\SQLConnector;
use App\Services\ViewService;

class ProductManager
{
    private QueryBuilder $queryBuilder;
    private SQLConnector $sqlConnector;
    private ProductRepository $productRepository;
    private ViewService $viewService;

    /**
     * ProductMenager constructor.
     */
    public function __construct(SQLConnector $sqlConnector)
    {
        $this->sqlConnector = $sqlConnector;
        $this->queryBuilder = new QueryBuilder($this->sqlConnector);
        $this->productRepository = new ProductRepository($this->sqlConnector);
        $this->viewService = new ViewService();
    }

    public function delete(ProductDataTransferObject $productDataTransferObject): void
    {
        $id = $productDataTransferObject->getId();

        if (isset($id)) {
            //$sql = "DELETE FROM Products  WHERE id = '" . $id . "';";
            //$this->queryBuilder->prepareExecute($sql);

            $this->queryBuilder->deleteWhereId('Products', $id);

        } else {
            throw new \Exception("Product is not in database");
        }
    }


    public function save(ProductDataTransferObject $productDataTransferObject): ProductDataTransferObject
    {
        $productName = $productDataTransferObject->getName();
        $description = $productDataTransferObject->getDescription();

        if ($productDataTransferObject->getId() !== 0) {

            $id = $productDataTransferObject->getId();

            //$sql = "UPDATE Products SET productName = '" .$productName. "', description ='" . $description. "' WHERE id = '" .$id. "';";
            //$this->queryBuilder->prepareExecute($sql);

            $this->queryBuilder->updateTableSetNameDescriptionWhereId('Products', $productName, $description, $id);
        } else {
            $sql = 'INSERT INTO Products (productName, description) VALUES (\'' . $productName . '\',\'' . $description . '\');';
            $id = $this->queryBuilder->prepareExecuteAndLastInsertId($sql);
        }

        //$id = $this->queryBuilder->execAndLastInsertId($sql);

        $productDataTransferObjectNew = new ProductDataTransferObject();
        $productDataTransferObjectNew->setId($id);
        $productDataTransferObjectNew->setName($productDataTransferObject->getName());
        $productDataTransferObjectNew->setDescription($productDataTransferObject->getDescription());

        return $productDataTransferObjectNew;
    }
}