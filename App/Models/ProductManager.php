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

    public function __construct(Container $container)
    {
        $this->sqlConnector = $container->get(SQLConnector::class);
        $this->queryBuilder = $container->get(QueryBuilder::class);
        $this->productRepository = $container->get(ProductRepository::class);
    }

    public function delete(ProductDataTransferObject $productDataTransferObject): void
    {
        $id = $productDataTransferObject->getId();

        if (isset($id)) {
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
            $this->queryBuilder->updateTableSetNameDescriptionWhereId('Products', $productName, $description, $id);

        } else {
            $id = $this->queryBuilder->insertIntoTableNameDescription('Products', $productName, $description);
        }

        $productDataTransferObjectNew = new ProductDataTransferObject();
        $productDataTransferObjectNew->setId($id);
        $productDataTransferObjectNew->setName($productDataTransferObject->getName());
        $productDataTransferObjectNew->setDescription($productDataTransferObject->getDescription());

        return $productDataTransferObjectNew;
    }
}