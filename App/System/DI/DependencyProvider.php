<?php declare(strict_types=1);

namespace App\System\DI;

use App\Component\Product\Business\ProductBusinessFacade;
use App\Component\Product\Persistence\Mapper\ProductMapper;
use App\Component\Product\Persistence\Models\ProductManager;
use App\Component\Product\Persistence\Models\ProductRepository;
use App\Component\ProductCsv\Business\CsvImporter;
use App\Component\ProductCsv\Persistence\Mapper\CsvMapper;
use App\Component\User\Business\UserBusinessFacade;
use App\Component\User\Persistence\Mapper\UserMapper;
use App\Component\User\Persistence\Models\UserManager;
use App\Component\User\Persistence\Models\UserRepository;
use App\System\Session\UserSession;
use App\System\Smarty\Redirect;
use App\System\Smarty\ViewService;
use Propel\Generator\Builder\Om\QueryBuilder;

class DependencyProvider
{
    public function providerDependency(Container $container): void
    {
        $container->set(ViewService::class, new ViewService());
        $container->set(UserSession::class, new UserSession());
        $container->set(Redirect::class, new Redirect());

        $container->set(ProductMapper::class, new ProductMapper());
        $container->set(UserMapper::class, new UserMapper());
        $container->set(CsvMapper::class, new CsvMapper());


        $container->set(ProductRepository::class, new ProductRepository($container));
        $container->set(ProductManager::class, new ProductManager());

        $container->set(UserRepository::class, new UserRepository($container));
        $container->set(UserManager::class, new UserManager());

        $container->set(UserBusinessFacade::class, new UserBusinessFacade($container));
        $container->set(ProductBusinessFacade::class, new ProductBusinessFacade($container));

        $container->set(CsvImporter::class, new CsvImporter($container));
    }
}