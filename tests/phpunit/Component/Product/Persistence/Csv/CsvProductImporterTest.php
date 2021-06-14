<?php declare(strict_types=1);

namespace Test;

use App\Component\Product\Business\ProductBusinessFacade;
use App\Component\Product\Business\ProductBusinessFacadeInterface;
use App\Component\Product\Persistence\Csv\CsvProductImporter;
use App\Component\Product\Persistence\Mapper\ProductMapper;
use App\Component\Product\Persistence\Mapper\ProductMapperInterface;
use App\Shared\Csv\CsvImporter;
use App\Shared\Dto\ProductDataTransferObject;
use App\System\DI\Container;
use App\System\DI\DependencyProvider;
use PHPUnit\Framework\TestCase;
use Propel\Runtime\Propel;
use Test\phpunit\Helper\CategoryHelperTest;
use Test\phpunit\Helper\ProductHelperTest;

class CsvProductImporterTest extends TestCase
{
    private ProductMapperInterface $productMapper;
    private ProductBusinessFacadeInterface $productBusinessFacade;
    private CsvImporter $csvImporter;
    private CsvProductImporter $csvProductImporter;
    private ProductHelperTest $productHelper;
    private CategoryHelperTest $categoryHelper;


    protected function setUp(): void
    {
        parent::setUp();
        $container = new Container();

        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $this->productMapper = $container->get(ProductMapper::class);
        $this->productBusinessFacade = $container->get(ProductBusinessFacade::class);
        $this->csvProductImporter = $container->get(CsvProductImporter::class);

        $this->productHelper = new ProductHelperTest();
        $this->categoryHelper = new CategoryHelperTest();

        $this->categoryHelper->createTemporaryCategories();
        $this->productHelper->createTemporaryProducts();
    }

    protected function tearDown(): void
    {
        $this->categoryHelper->createTemporaryCategories();

        $con = Propel::getConnection();
        $sql = "TRUNCATE TABLE Products";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    /**
     * @throws \League\Csv\Exception
     */
    public function testSaveAsCsvDto(string $path): array
    {
        $path = __DIR__ . '/../../../CsvFile/csvDataInsert.csv';
        $csvDtoList = $this->csvProductImporter->saveAsCsvDto($path);

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

        self::assertCount(5, $productListFromDb);

        foreach ($csvDtoList as $csvDto)
        {
            $productFromDb = $this->productBusinessFacade->getProductById($csvDto->getId());
            self::assertSame($csvDto->getId(), $productFromDb->getId());
            self::assertSame($csvDto->getName(), $productFromDb->getName());
            self::assertSame($csvDto->getDescription(), $productFromDb->getDescription());
        }
    }

}