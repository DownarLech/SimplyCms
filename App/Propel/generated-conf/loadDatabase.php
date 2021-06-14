<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMaps(array (
  'SimplyCmsPropel' => 
  array (
    0 => '\\Generated\\Map\\CategoryTableMap',
    1 => '\\Generated\\Map\\ProductTableMap',
    2 => '\\Generated\\Map\\UserTableMap',
  ),
));
