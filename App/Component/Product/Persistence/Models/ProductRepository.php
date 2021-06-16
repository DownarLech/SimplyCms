<?php declare(strict_types=1);

namespace App\Component\Product\Persistence\Models;

use App\Component\Product\Persistence\Mapper\ProductMapper;
use App\Component\Product\Persistence\Mapper\ProductMapperInterface;
use App\Shared\Dto\ProductDataTransferObject;
use App\System\DI\Container;
use Generated\ProductQuery;

class ProductRepository implements ProductRepositoryInterface
{
    private array $productList = [];
    private ProductMapperInterface $productMapper;

    public function __construct(Container $container)
    {
        $this->productMapper = $container->get(ProductMapper::class);
    }

    /**
     * @return ProductDataTransferObject[]
     */
    public function getProductList(): array
    {
        $arrayData = ProductQuery::create()->find();

        foreach ($arrayData as $product) {
            $this->productList[$product->getId()] = $this->productMapper->mapFromPropel($product);
        }
        return $this->productList;
    }


    public function getProductById(int $id): ?ProductDataTransferObject
    {
        $arrayData = ProductQuery::create()
            ->findOneById($id);

        if (!$arrayData) {
            return null;
            //throw new \OutOfBoundsException('This product is not in database');
        }
        return $this->productMapper->mapFromPropel($arrayData);
    }
}