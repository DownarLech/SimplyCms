<?php

declare(strict_types=1);

namespace Test;

use App\Controllers\Frontend\ErrorController;
use App\Services\ViewService;
use PHPUnit\Framework\TestCase;

class ErrorControllerTest extends TestCase
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
        $home = new ErrorController($viewService);
        $home->action();

        $path = dirname(__DIR__,4).'/App/Smarty/templates/error.tpl';

        self::assertStringEndsWith('error.tpl', $viewService->getTemplate());
        self::assertFileEquals($path, $viewService->getTemplate());

    }

}
