<?php
declare(strict_types=1);

namespace Test;

use App\Controllers\Frontend\NewProductController;
use App\Services\ViewService;
use PHPUnit\Framework\TestCase;

class NewProductControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testAction()
    {
        $viewService = new ViewService();
        $home = new NewProductController($viewService);
        $home->action();

        $path = dirname(__DIR__,4).'/App/Smarty/templates/newProduct.tpl';

        self::assertStringEndsWith('newProduct.tpl', $viewService->getTemplate());
        self::assertFileEquals($path, $viewService->getTemplate());

    }

}
