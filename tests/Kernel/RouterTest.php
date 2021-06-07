<?php

namespace Tests\Kernel;

use Kernel\Router\Router;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class RouterTest extends TestCase
{
    public function testTestGetRoute()
    {
        $request = Request::create("/test");

        $router = new Router();
        $router->fetchRoutes(__DIR__ . "/../Controller");
        $route = $router->match($request);

        $this->assertNotNull($route);

        $controllerClass = $route['controller'];
        $action = $route['action'];

        $controller = new $controllerClass($request);
        /** @var JsonResponse $response */ // IDE auto completion
        $response = $controller->$action();

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }


    public function testGet404()
    {
        $request = Request::create("/" . uniqid());

        $router = new Router();
        $router->fetchRoutes(__DIR__ . "/../Controller");
        $this->expectException(ResourceNotFoundException::class);
        $router->match($request);
    }
}
