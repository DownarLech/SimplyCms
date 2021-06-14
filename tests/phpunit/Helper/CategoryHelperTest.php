<?php declare(strict_types=1);

namespace Test\phpunit\Helper;

use App\Component\Category\Business\CategoryBusinessFacade;
use App\Shared\Dto\CategoryDataTransferObject;
use App\System\DI\Container;
use App\System\DI\DependencyProvider;
use PHPUnit\Framework\TestCase;
use Propel\Runtime\Propel;

class CategoryHelperTest extends TestCase
{
    public const CATEGORY= [
        [
            'categoryName' => 'tablet'
        ],
        [
            'categoryName' => 'smartphone'
        ],
        [
            'categoryName' => 'laptop'
        ]
    ];

    private CategoryBusinessFacade $categoryBusinessFacade;

    public function __construct()
    {
        parent::__construct();

        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $this->categoryBusinessFacade = $container->get(CategoryBusinessFacade::class);
    }

    /**
     * @return CategoryDataTransferObject[]
     * @dataProvider
     */
    public function createTemporaryCategories(): array
    {
        $categoryDataTransferObjectList = [];

        foreach (self::CATEGORY as $category) {
            $categoryDataTransferObject = new CategoryDataTransferObject();
            $categoryDataTransferObject->setName($category['categoryName']);

            $userDataTransferObjectList[] = $this->categoryBusinessFacade->save($categoryDataTransferObject);
        }
        return $categoryDataTransferObjectList;
    }

    public function deleteTemporaryCategories(): void
    {
        $con = Propel::getConnection();
        $sql = "TRUNCATE TABLE Category";
        $stmt = $con->prepare($sql);
        $stmt->execute();
    }
}