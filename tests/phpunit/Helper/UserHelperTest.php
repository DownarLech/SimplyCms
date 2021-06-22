<?php declare(strict_types=1);

namespace Test\phpunit\Helper;

use App\Component\User\Persistence\Models\UserManager;
use App\Shared\Dto\UserDataTransferObject;
use App\System\DI\Container;
use App\System\DI\DependencyProvider;
use Generated\User;
use Generated\UserQuery;
use PHPUnit\Framework\TestCase;
use Propel\Runtime\Propel;

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

    private UserManager $userManager;

    public function __construct()
    {
        parent::__construct();

        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);

        $this->userManager = $container->get(UserManager::class);
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
        $con = Propel::getConnection();
        $sql = "TRUNCATE TABLE Users";
/*
        $sql = "TRUNCATE TABLE Users;
        ALTER TABLE Users AUTO_INCREMENT = 0;
        ";
*/
        $stmt = $con->prepare($sql);
        $stmt->execute();
    }

    public function testTrue(): void
    {
        self::assertTrue(true);
    }

}
