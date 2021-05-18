<?php

namespace Kernel;

use App\Config\KernelConfig;
use Kernel\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Generic class to manage the app
 * @package Kernel
 */
class App
{

    /**
     * @var KernelConfig
     */
    private KernelConfig $kernelConfig;

    /**
     * @var Router
     */
    private Router $router;

    public function __construct()
    {
        $this->kernelConfig = new KernelConfig();
        $this->router = new Router();
    }

    /**
     * @param Request $request
     * @return Response
     */
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
