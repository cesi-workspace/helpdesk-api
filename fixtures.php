<?php

use DI\ContainerBuilder;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManager;

require __DIR__ . '/vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . "/config/config.php");
$container = $containerBuilder->build();

$entityManager = $container->get(EntityManager::class);

$loader = new Loader();
$loader->loadFromDirectory(dirname(__FILE__) . "/app/Database/Fixture");

$purger = new ORMPurger();
$executor = new ORMExecutor($entityManager, $purger);
$executor->execute($loader->getFixtures());
