<?php

namespace Kernel;

use App\Config\KernelConfig;
use Kernel\Router\Router;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class App
{

    private ContainerInterface $container;

    private Router $router;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->router = $container->get(Router::class);
    }

    public function run(Request $request): Response
    {
        $this->router->fetchRoutes(__DIR__ . "/../../app/Controller");
        $route = $this->router->match($request);
        $controllerClass = $route['controller'];
        $action = $route['action'];

        $controller = new $controllerClass($request);
        return $controller->$action();
    }
}
