<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Mapper\ProductMapper;
use App\Models\Mapper\UserMapper;
use App\Models\ProductManager;
use App\Models\ProductRepository;
use App\Models\UserManager;
use App\Models\UserRepository;

class DependencyProvider
{
    public function providerDependency(Container $container): void
    {
        $container->set(SQLConnector::class, new SQLConnector());

        $container->set(ViewService::class, new ViewService());
        $container->set(UserSession::class, new UserSession());
        $container->set(Redirect::class, new Redirect());

        $container->set(ProductMapper::class, new ProductMapper());
        $container->set(UserMapper::class, new UserMapper());

        $container->set(QueryBuilder::class, new QueryBuilder($container));

        $container->set(ProductRepository::class, new ProductRepository($container));
        $container->set(ProductManager::class, new ProductManager($container));

        $container->set(UserRepository::class, new UserRepository($container));
        $container->set(UserManager::class, new UserManager($container));
    }
}