<?php

namespace Tests\Kernel;

use Kernel\Router;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Tests\Config\KernelConfig;

class RouterTest extends TestCase
{

    public function testGetHomeRoute()
    {
        $request = Request::create("/");
        $kernelConfig = new KernelConfig();

        $router = new Router();
        $router->fetchRoutes($kernelConfig->getRoutes());
        $parameters = $router->match($request);

        $this->assertNotNull($parameters);
    }

    public function testPostHomeRoute()
    {
        $request = Request::create("/", "POST");
        $kernelConfig = new KernelConfig();

        $router = new Router();
        $router->fetchRoutes($kernelConfig->getRoutes());
        $parameters = $router->match($request);

        $this->assertNotNull($parameters);
    }

    public function testGet404()
    {
        $request = Request::create("/fff");
        $kernelConfig = new KernelConfig();

        $router = new Router();
        $router->fetchRoutes($kernelConfig->getRoutes());
        $this->expectException(ResourceNotFoundException::class);
        $router->match($request);
    }
}
