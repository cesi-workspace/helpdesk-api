<?php

use Kernel\App;
use Symfony\Component\HttpFoundation\Request;

require '../../vendor/autoload.php';

$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->addDefinitions(dirname(__DIR__) . "/config/container.php");

$app = new App($containerBuilder->build());
$request = Request::createFromGlobals();
$response = $app->run($request);
$response->prepare($request);
$response->send();
