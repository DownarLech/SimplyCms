<?php

use App\Models\Dto\ProductDataTransferObject;
use App\Models\ProductManager;
use App\Models\ProductRepository;
use App\Services\SQLConnector;

class ProductManagerTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;


    private SQLConnector $sqlConnector;
    private ProductManager $productManager;
    private ProductDataTransferObject $dto;
    private ProductRepository $productRepository;

    protected function _before()
    {
        $this->sqlConnector = new SQLConnector();
        $this->productManager =  new ProductManager($this->sqlConnector);
        $this->productRepository = new ProductRepository();
        $this->dto = new ProductDataTransferObject();

    }

    protected function _after()
    {
    }


    public function testSaveInsert(): void
    {
        $this->dto->setName('bb');
        $this->dto->setDescription('123');

        $this->productManager->save($this->dto);

        self::assertSame(5, $this->productRepository->getProduct(5)->getId());

        self::assertSame('bb', $this->productRepository->getProduct(5)->getName());
    }

    public function testSaveUpdate(): void
    {
        $this->dto->setId(5);
        $this->dto->setName('bb');
        $this->dto->setDescription('567');

        $this->productManager->save($this->dto);

        self::assertSame('bb', $this->productRepository->getProduct(5)->getName());
        self::assertSame('567', $this->productRepository->getProduct(5)->getDescription());
    }


}