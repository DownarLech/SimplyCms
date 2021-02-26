<?php

namespace Test\phpunit\Helper;

use App\Models\Dto\UserDataTransferObject;
use App\Models\ProductManager;
use App\Models\UserManager;
use App\Services\Container;
use App\Services\DependencyProvider;
use App\Services\QueryBuilder;
use App\Services\SQLConnector;
use PHPUnit\Framework\TestCase;

class UserHelperTest extends TestCase
{
    public const USER = [
        [
            'username' => 'John',
            'password' => 'a',
            'userrole' => 'Admin'
        ],
        [
            'username' => 'Mark',
            'password' => 'b',
            'userrole' => 'Customer'
        ],
        [
            'username' => 'Tom',
            'password' => 'c',
            'userrole' => 'Customer'
        ]
    ];

    private SQLConnector $sqlConnector;
    private UserManager $userManager;
    private QueryBuilder $queryBuilder;

    public function __construct()
    {
        parent::__construct();

        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        //$this->sqlConnector = $container->get(SQLConnector::class);
        $this->userManager = $container->get(UserManager::class);
        $this->queryBuilder = $container->get(QueryBuilder::class);
    }

    /**
     * @return UserDataTransferObject[]
     * @dataProvider
     */
    public function createTemporaryUsers(): array
    {
        $userDataTransferObjectList = [];

        foreach (self::USER as $user) {
            $userDataTransferObject = new UserDataTransferObject();
            $userDataTransferObject->setUserName($user['username']);
            $userDataTransferObject->setPassword($user['password']);
            $userDataTransferObject->setUserRole($user['userrole']);


            $userDataTransferObjectList[] = $this->userManager->save($userDataTransferObject);
        }
        return $userDataTransferObjectList;
    }

    public function deleteTemporaryUsers(): void
    {
        $sql = "TRUNCATE TABLE Users; ";
        $this->queryBuilder->prepareExecute($sql);
    }

}
