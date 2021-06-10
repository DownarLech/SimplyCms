<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$database = $_ENV['DB_DATABASE'];


return [
    'propel' => [
        'database' => [
            'connections' => [
                'SimplyCmsPropel' => [
                    'adapter' => 'mysql',
                    'classname' => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn' => 'mysql:host=localhost;dbname='. $database,
                    'user' => 'root',
                    'password' => '12Mysql%',
                    'attributes' => []
                ],
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'SimplyCmsPropel',
            'connections' => ['SimplyCmsPropel']
        ],
        'generator' => [
            'defaultConnection' => 'SimplyCmsPropel',
            'connections' => ['SimplyCmsPropel']
        ]
    ]
];