<?php

namespace Tests\Config;

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Tests\Controller\TestController;

class ApiRouteList extends RouteCollection
{

    public function __construct()
    {
        $this->add(
            "home",
            (new Route("/"))
                ->addDefaults(["_controller" => TestController::class])
                ->setMethods("GET")
        );
        $this->add(
            "post_home",
            (new Route("/"))
                ->addDefaults(["_controller" => TestController::class])
                ->setMethods("POST")
        );
    }
}
