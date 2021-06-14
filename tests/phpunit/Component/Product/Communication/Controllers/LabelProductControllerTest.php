<?php declare(strict_types=1);

namespace Test;


use App\Component\Product\Communication\Controllers\Frontend\LabelProductController;
use App\Component\Product\Persistence\Models\ProductRepository;
use App\System\DI\Container;
use App\System\DI\DependencyProvider;
use App\System\Smarty\ViewService;
use PHPUnit\Framework\TestCase;
use Test\phpunit\Helper\ProductHelperTest;

class LabelProductControllerTest extends TestCase
{

    private ProductHelperTest $productHelper;
    private ViewService $viewService;
    private ProductRepository $productRepository;
    private LabelProductController $labelProductController;

    protected function setUp(): void
    {
        parent::setUp();

        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $this->viewService = $container->get(ViewService::class);
        $this->labelProductController = new LabelProductController($container);
        $this->productRepository = new ProductRepository($container);
        $this->productHelper = new ProductHelperTest();

        $this->productHelper->createTemporaryProducts();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $_GET = [];
        $this->productHelper->deleteTemporaryProducts();
    }

    public function testAction()
    {

        $path = dirname(__DIR__,4).'/App/Smarty/templates/labelProduct.tpl';

        $_GET['id'] = 1;
        $this->labelProductController->action();

        $temp = $this->viewService->getParams();
        self::assertArrayHasKey('product', $temp);

        self::assertStringEndsWith('labelProduct.tpl', $this->viewService->getTemplate());
        self::assertFileEquals($path, $this->viewService->getTemplate());

        $one = $temp['product'];
        self::assertSame(1, $one->getId());
        self::assertSame('john', $one->getName());
        self::assertSame('lorem john', $one->getDescription());

    }


    public function testActionError()
    {
        $_GET['id'] = 0;
        $this->labelProductController->action();

        self::assertStringEndsWith('error.tpl', $this->viewService->getTemplate());
    }
}
