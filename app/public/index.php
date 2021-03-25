<?php

use Kernel\App;
use Symfony\Component\HttpFoundation\Request;

require '../../vendor/autoload.php';

$app = new App();
$request = Request::createFromGlobals();
$response = $app->run($request);
$response->prepare($request);
$response->send();
