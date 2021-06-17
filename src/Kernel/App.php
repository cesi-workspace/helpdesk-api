<?php

namespace Kernel;

use DI\Container;
use Kernel\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function DI\create;

class App
{

    private static Container $container;

    public function __construct(Container $container)
    {
        self::$container = $container;
    }

    public function run(Request $request): Response
    {
        $router = self::$container->get(Router::class);
        $router->fetchRoutes(__DIR__ . "/../../app/Controller");
        $route = $router->match($request);
        $controllerClass = $route["controller"];
        $action = $route["action"];

        /** @var Route $annotation */
        $annotation = $route["annotation"];
        preg_match_all("{(\w+)}", $annotation->getPath(), $parametersName);
        $parametersName = array_slice($parametersName, 1, sizeof($parametersName))[0];
        $parameters = [];
        foreach ($parametersName as $parameterName) {
            $parameters[$parameterName] = $route[$parameterName] ?? "";
        }

        $controller = new $controllerClass();
        self::$container->set(Request::class, $request);

        self::$container
            ->set(
                RequestAdapter::class,
                create(RequestAdapter::class)
                    ->constructor($request, $parameters)
            );

        return self::$container->call([$controller, $action]);
    }

    /**
     * @return Container
     */
    public static function getContainer(): Container
    {
        return self::$container;
    }
}
