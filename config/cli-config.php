<?php

use DI\ContainerBuilder;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . "/config.php");
$container = $containerBuilder->build();

/** @var $entityManager EntityManager */
$entityManager = $container->get(EntityManager::class);

try {
    $platform = $entityManager->getConnection()->getDatabasePlatform();
    $platform->registerDoctrineTypeMapping('enum', 'string');
} catch (\Doctrine\DBAL\Exception $e) {
    die($e->getTraceAsString());
}

return ConsoleRunner::createHelperSet($entityManager);
