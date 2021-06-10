<?php declare(strict_types=1);

namespace App\Component\Product\Persistence\Models;

use Generated\Product;
use Generated\ProductQuery;
use App\Shared\Dto\ProductDataTransferObject;
use Propel\Runtime\Exception\PropelException;


class ProductManager implements ProductManagerInterface
{

    public function delete(ProductDataTransferObject $productDataTransferObject): void
    {
        $id = $productDataTransferObject->getId();

        if (isset($id)) {
            ProductQuery::create()
                ->filterById($id)
                ->delete();
        } else {
            throw new \Exception("Product is not in database");
        }
    }


    /**
     * @throws PropelException
     */
    public function save(ProductDataTransferObject $productDataTransferObject): ProductDataTransferObject
    {
        $productName = $productDataTransferObject->getName();
        $description = $productDataTransferObject->getDescription();

        if ($productDataTransferObject->getId() !== 0) {
            $id = $productDataTransferObject->getId();
            $product = ProductQuery::create()
                ->findOneById($id);

            if ($product !== null) {
                $product->setProductname($productName)
                    ->setDescription($description)
                    ->save();
            } else {
                $product = new Product(); //dodalem teraz
                $product->setId($id)
                    ->setProductname($productName)
                    ->setDescription($description)
                    ->save();

            }
        } else {
            $product = new Product();
            $product->setProductname($productName)
                ->setDescription($description)
                ->save();

          $id = $product->getId();
        }

        $productDataTransferObjectNew = new ProductDataTransferObject();
        $productDataTransferObjectNew->setId($id);
        $productDataTransferObjectNew->setName($productDataTransferObject->getName());
        $productDataTransferObjectNew->setDescription($productDataTransferObject->getDescription());

        return $productDataTransferObjectNew;
    }
}