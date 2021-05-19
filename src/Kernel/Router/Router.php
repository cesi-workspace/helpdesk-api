<?php

namespace Kernel\Router;

use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Loader\AnnotationDirectoryLoader;
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

    public function fetchRoutes(string $directory)
    {
        $routeLoader = new RouteAnnotationClassLoader(new AnnotationReader());
        $loader = new AnnotationDirectoryLoader(new FileLocator(), $routeLoader);
        $collections = $loader->load($directory);
        $this->masterRoutes->addCollection($collections);
    }

    public function match(Request $request): ?array
    {
        $requestContext = new RequestContext();
        $matcher = new UrlMatcher($this->masterRoutes, $requestContext->fromRequest($request));
        return $matcher->matchRequest($request);
    }
}
