<?php

use DI\ContainerBuilder;
use Kernel\App;
use Symfony\Component\HttpFoundation\Request;

require '../../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(dirname(__DIR__) . "/../config/config.php");

$app = new App($containerBuilder->build());
$request = Request::createFromGlobals();
$response = $app->run($request);
$response->prepare($request);
$response->send();
