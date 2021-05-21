<?php

use DI\ContainerBuilder;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require __DIR__ . './vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . "/config/config.php");
$container = $containerBuilder->build();

$entityManager = $container->get(EntityManager::class);

return ConsoleRunner::createHelperSet($entityManager);
