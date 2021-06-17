<?php

use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

use function DI\env;
use function DI\factory;
use function DI\get;

return [
    "env" => env("env", "development"),
    "path.entities" => [
        dirname(__DIR__) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "Domain" . DIRECTORY_SEPARATOR . "Entity"
    ],
    "db" => [
        "driver" => env("db.driver", "pdo_mysql"),
        "user" => env("db.username", "root"),
        "password" => env("db.password", ""),
        "dbname" => env("db.name", "cesi")
    ],
    Configuration::class => factory([Setup::class, 'createAnnotationMetadataConfiguration'])
        ->parameter("paths", get("path.entities"))
        ->parameter("isDevMode", get("env") == "development"),
    EntityManager::class => factory([EntityManager::class, 'create'])
        ->parameter('connection', get('db'))
        ->parameter('config', get(Configuration::class)),
];
