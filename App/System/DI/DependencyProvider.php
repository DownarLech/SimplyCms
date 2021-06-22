<?php declare(strict_types=1);

namespace App\System\DI;

use App\Component\Category\Business\CategoryBusinessFacade;
use App\Component\Category\Persistence\Mapper\CategoryMapper;
use App\Component\Category\Persistence\Models\CategoryManager;
use App\Component\Category\Persistence\Models\CategoryRepository;
use App\Component\Product\Business\Csv\CsvProductImporter;
use App\Component\Product\Business\Csv\Mapper\CsvMapper;
use App\Component\Product\Business\ProductBusinessFacade;
use App\Component\Product\Persistence\Mapper\ProductMapper;
use App\Component\Product\Persistence\Models\ProductManager;
use App\Component\Product\Persistence\Models\ProductRepository;
use App\Component\User\Business\UserBusinessFacade;
use App\Component\User\Persistence\Mapper\UserMapper;
use App\Component\User\Persistence\Models\UserManager;
use App\Component\User\Persistence\Models\UserRepository;
use App\Shared\Csv\CsvImporter;
use App\System\Session\UserSession;
use App\System\Smarty\Redirect;
use App\System\Smarty\ViewService;

class DependencyProvider
{
    public function providerDependency(Container $container): void
    {
        $container->set(ViewService::class, new ViewService());
        $container->set(UserSession::class, new UserSession());
        $container->set(Redirect::class, new Redirect());

        $container->set(UserMapper::class, new UserMapper());
        $container->set(CsvMapper::class, new CsvMapper());
        $container->set(CategoryMapper::class, new CategoryMapper());

        $container->set(CategoryRepository::class, new CategoryRepository($container));
        $container->set(CategoryManager::class, new CategoryManager());
        $container->set(CategoryBusinessFacade::class, new CategoryBusinessFacade($container));

        $container->set(ProductMapper::class, new ProductMapper($container));

        $container->set(ProductRepository::class, new ProductRepository($container));
        $container->set(ProductManager::class, new ProductManager($container));

        $container->set(UserRepository::class, new UserRepository($container));
        $container->set(UserManager::class, new UserManager());

        $container->set(UserBusinessFacade::class, new UserBusinessFacade($container));
        $container->set(ProductBusinessFacade::class, new ProductBusinessFacade($container));
        $container->set(CategoryBusinessFacade::class, new CategoryBusinessFacade($container));

        $container->set(CsvImporter::class, new CsvImporter());
        $container->set(CsvProductImporter::class, new CsvProductImporter($container));
    }
}