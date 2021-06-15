<?php declare(strict_types=1);

namespace Test;

use App\Component\Category\Business\CategoryBusinessFacade;
use App\Component\Category\Business\CategoryBusinessFacadeInterface;
use App\Component\Product\Business\ProductBusinessFacade;
use App\Component\Product\Business\ProductBusinessFacadeInterface;
use App\Component\Product\Persistence\Csv\CsvProductImporter;
use App\Component\Product\Persistence\Mapper\ProductMapper;
use App\Component\Product\Persistence\Mapper\ProductMapperInterface;
use App\Shared\Csv\CsvImporter;
use App\Shared\Dto\CategoryDataTransferObject;
use App\Shared\Dto\ProductDataTransferObject;
use App\System\DI\Container;
use App\System\DI\DependencyProvider;
use PHPUnit\Framework\TestCase;
use Propel\Runtime\Propel;
use Test\phpunit\Helper\CategoryHelperTest;

class CsvProductImporterTest extends TestCase
{
    private ProductMapperInterface $productMapper;
    private ProductBusinessFacadeInterface $productBusinessFacade;
    private CategoryBusinessFacadeInterface $categoryBusinessFacade;
    private CsvImporter $csvImporter;
    private CsvProductImporter $csvProductImporter;
    private CategoryHelperTest $categoryHelper;


    protected function setUp(): void
    {
        parent::setUp();
        $container = new Container();

        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $this->productMapper = $container->get(ProductMapper::class);
        $this->categoryBusinessFacade = $container->get(CategoryBusinessFacade::class);
        $this->productBusinessFacade = $container->get(ProductBusinessFacade::class);
        $this->csvProductImporter = $container->get(CsvProductImporter::class);

        $this->categoryHelper = new CategoryHelperTest();
        $this->categoryHelper->createTemporaryCategories();
    }

    protected function tearDown(): void
    {
        $this->categoryHelper->deleteTemporaryCategories();

        $con = Propel::getConnection();
        $sql = "TRUNCATE TABLE Products";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    /**
     * @throws \League\Csv\Exception
     */
    public function testSaveAsCsvDto(): void
    {
        $path = __DIR__ . '/../../../../CsvFile/csvDataInsert.csv';
        $csvDtoList = $this->csvProductImporter->loadDataAsCsvDto($path);

            $productDtoList = [];
        foreach ($csvDtoList as $csvDto) {
            $productDtoList[] = $this->productMapper->mapFromCsv($csvDto);
        }

        foreach ($productDtoList as $product) {
            self::assertInstanceOf(ProductDataTransferObject::class, $product);
            $this->productBusinessFacade->save($product);
            //  Cannot insert a value for auto-increment primary key
            // allowPkInsert=true  into <table> schema.xml
        }

        $productListFromDb = $this->productBusinessFacade->getProductList();

        self::assertCount(6, $productListFromDb);

        foreach ($csvDtoList as $csvDto)
        {
            $productFromDb = $this->productBusinessFacade->getProductById($csvDto->getId());
            self::assertSame($csvDto->getId(), $productFromDb->getId());
            self::assertSame($csvDto->getName(), $productFromDb->getName());
            self::assertSame($csvDto->getDescription(), $productFromDb->getDescription());
        }
    }

    public function testUpdateSaveAsCsvDto(): void
    {
        $path = __DIR__ . '/../../../../CsvFile/csvDataInsert.csv';
        $this->csvProductImporter->loadDataAsCsvDto($path);

        $path = __DIR__ . '/../../../../CsvFile/csvDataUpdate.csv';
        $csvDtoList = $this->csvProductImporter->loadDataAsCsvDto($path);

        $productDtoList = [];
        foreach ($csvDtoList as $csvDto) {
            $productDtoList[] = $this->productMapper->mapFromCsv($csvDto);
        }

        foreach ($productDtoList as $product) {
            self::assertInstanceOf(ProductDataTransferObject::class, $product);
            $this->productBusinessFacade->save($product);
        }

        $productListFromDb = $this->productBusinessFacade->getProductList();

        self::assertCount(7, $productListFromDb);

        foreach ($csvDtoList as $csvDto)
        {
            $productFromDb = $this->productBusinessFacade->getProductById($csvDto->getId());
            self::assertSame($csvDto->getId(), $productFromDb->getId());
            self::assertSame($csvDto->getName(), $productFromDb->getName());
            self::assertSame($csvDto->getDescription(), $productFromDb->getDescription());
        }
    }

}
