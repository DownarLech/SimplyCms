<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion(2);
$serviceContainer->setAdapterClass('SimplyCmsPropel', 'mysql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
$manager->setConfiguration(array (
  'classname' => 'Propel\\Runtime\\Connection\\ConnectionWrapper',
  'dsn' => 'mysql:host=localhost;dbname=SimplyCmsPropel',
  'user' => 'root',
  'password' => '12Mysql%',
  'attributes' =>
  array (
    'ATTR_EMULATE_PREPARES' => false,
    'ATTR_TIMEOUT' => 30,
  ),
  'model_paths' =>
  array (
    0 => 'src',
    1 => 'vendor',
  ),
));
$manager->setName('SimplyCmsPropel');
$serviceContainer->setConnectionManager('SimplyCmsPropel', $manager);
$serviceContainer->setDefaultDatasource('SimplyCmsPropel');
require_once __DIR__ . '/./loadDatabase.php';
