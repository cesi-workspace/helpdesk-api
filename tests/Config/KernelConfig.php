<?php

namespace Tests\Config;

class KernelConfig
{

    /**
     * @var string[]
     */
    private array $routes = [
        ApiRouteList::class
    ];

    /**
     * @return string[]
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}
