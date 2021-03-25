<?php

namespace App\Config;

use App\Controller\HomeController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class ApiRouteList extends RouteCollection
{

    public function __construct()
    {
        $this->add(
            "home",
            (new Route("/"))
                ->addDefaults(["_controller" => HomeController::class])
                ->setMethods("GET")
        );
        $this->add(
            "post_home",
            (new Route("/"))
                ->addDefaults(["_controller" => HomeController::class])
                ->setMethods("POST")
        );
    }
}
