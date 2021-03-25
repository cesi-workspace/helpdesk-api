<?php

namespace Kernel;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

class Router
{

    /**
     * @var RouteCollection
     */
    private RouteCollection $masterRoutes;

    public function __construct()
    {
        $this->masterRoutes = new RouteCollection();
    }

    /**
     * Fetch all routes through the app
     * @param array $routeCollectionList
     */
    public function fetchRoutes(array $routeCollectionList)
    {
        foreach ($routeCollectionList as $routeCollection) {
            $routes = (new $routeCollection())->all();

            foreach ($routes as $name => $route) {
                $this->masterRoutes->add($name, $route);
            }
        }
    }

    /**
     * Match request
     * @param Request $request
     * @return array|null
     */
    public function match(Request $request): ?array
    {
        $requestContext = new RequestContext();
        $matcher = new UrlMatcher($this->masterRoutes, $requestContext->fromRequest($request));
        return $matcher->matchRequest($request);
    }
}
