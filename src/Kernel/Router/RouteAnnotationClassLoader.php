<?php

namespace Kernel\Router;

use ReflectionClass;
use ReflectionMethod;
use Symfony\Component\Routing\Loader\AnnotationClassLoader;
use Symfony\Component\Routing\Route;

class RouteAnnotationClassLoader extends AnnotationClassLoader
{

    protected function configureRoute(Route $route, ReflectionClass $class, ReflectionMethod $method, $annotation)
    {
        $defaults = ['annotation' => $annotation, 'controller' => $class->name, 'action' => $method->name];
        $route->setDefaults($defaults);
    }
}
