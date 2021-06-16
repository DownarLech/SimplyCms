<?php declare(strict_types=1);

namespace App\Component\Product\Persistence\Models;

use App\Component\Category\Business\CategoryBusinessFacade;
use App\Component\Category\Business\CategoryBusinessFacadeInterface;
use App\Shared\Dto\CategoryDataTransferObject;
use App\System\DI\Container;
use Generated\Product;
use Generated\ProductQuery;
use App\Shared\Dto\ProductDataTransferObject;
use Propel\Runtime\Exception\PropelException;


class ProductManager implements ProductManagerInterface
{

    private CategoryBusinessFacadeInterface $categoryBusinessFacade;

    public function __construct(Container $container)
    {
        $this->categoryBusinessFacade = $container->get(CategoryBusinessFacade::class);
    }

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

        //What with null here??
        $categoryId = 0;

        $categoryDto = $productDataTransferObject->getCategory();
        if (isset($categoryDto)) {
            $category = $this->categoryBusinessFacade->save($categoryDto);
            $categoryId = $category->getId();
        }

        if ($productDataTransferObject->getId() !== 0) {
            $id = $productDataTransferObject->getId();
            $product = ProductQuery::create()
                ->findOneById($id);

            if ($product !== null) {
                $product->setProductname($productName)
                    ->setDescription($description)
                    ->setCategoryId($categoryId)
                    ->save();
            } else {
                $product = new Product(); //dodalem teraz, validator?
                $product->setId($id)
                    ->setProductname($productName)
                    ->setDescription($description)
                    ->setCategoryId($categoryId)
                    ->save();
            }
        } else {
            $product = new Product();
            $product->setProductname($productName)
                ->setDescription($description)
                ->setCategoryId($categoryId)
                ->save();

          $id = $product->getId();
        }

        $productDataTransferObjectNew = new ProductDataTransferObject();
        $productDataTransferObjectNew->setId($id);
        $productDataTransferObjectNew->setName($productDataTransferObject->getName());
        $productDataTransferObjectNew->setDescription($productDataTransferObject->getDescription());
        $productDataTransferObjectNew->setCategory($productDataTransferObject->getCategory());

        return $productDataTransferObjectNew;
    }
}