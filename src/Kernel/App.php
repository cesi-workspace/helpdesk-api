<?php

namespace Kernel;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;
use Kernel\Router\Router;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class App
{

    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function run(Request $request): Response
    {
        $router = $this->container->get(Router::class);
        $router->fetchRoutes(__DIR__ . "/../../app/Controller");
        $route = $router->match($request);
        $controllerClass = $route["controller"];
        $action = $route["action"];

        $controller = new $controllerClass($request);
        return $controller->$action();
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }
}
