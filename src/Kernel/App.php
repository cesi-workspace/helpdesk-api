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
        $this->router->fetchRoutes($this->kernelConfig->getRoutes());
        $route = $this->router->match($request);
        $controller = $route['controller'];
        $action = $route['action'];

        return (new $controller())->$action($request);
    }
}
