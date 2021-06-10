<?php declare(strict_types=1);

namespace App\Component\Product\Business;

use App\Component\Product\Persistence\Models\ProductManager;
use App\Component\Product\Persistence\Models\ProductManagerInterface;
use App\Component\Product\Persistence\Models\ProductRepository;
use App\Component\Product\Persistence\Models\ProductRepositoryInterface;
use App\Shared\Dto\ProductDataTransferObject;
use App\System\DI\Container;

class ProductBusinessFacade implements ProductBusinessFacadeInterface
{
    protected ProductManagerInterface $productManager;
    protected ProductRepositoryInterface $productRepository;

    public function __construct(Container $container)
    {
        $this->productManager = $container->get(ProductManager::class);
        $this->productRepository = $container->get(ProductRepository::class);
    }


    public function delete(ProductDataTransferObject $productDataTransferObject): void
    {
        $this->productManager->delete($productDataTransferObject);
    }

    public function save(ProductDataTransferObject $productDataTransferObject): ProductDataTransferObject
    {
        return $this->productManager->save($productDataTransferObject);
    }

    public function getProductList(): array
    {
        return $this->productRepository->getProductList();
    }

    public function getProductById(int $id): ProductDataTransferObject
    {
        return $this->productRepository->getProductById($id);
    }





}