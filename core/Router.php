<?php

declare(strict_types=1);

namespace Core;

use App\Exception\MethodNotAllowedException;
use App\Exception\RouteNotFoundException;
use App\Router\Routes;
use DI\Container;
use DI\ContainerBuilder;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use function FastRoute\simpleDispatcher;

class Router
{
    private Dispatcher $dispatcher;

    public function __construct(
        private readonly Container $container,
        private readonly Routes $routes,
    ) {
        $this->dispatcher = simpleDispatcher(function (RouteCollector $r) {
            $this->routes->setRoutes($r);
        });
    }

    public function routeRequest(Request $request): ?Response
    {
        // Fetch method and URI from somewhere
        $httpMethod = $request->getMethod();
        $uri = $request->getRequestUri();

        // Strip query string (?foo=bar) and decode URI
        $uri = rtrim(rawurldecode($uri), '?');
        $parameters = [];

        if (str_contains($uri, '?')) {
            [$uri, $params] = explode('?', $uri);

            $paramsArray = explode('&', $params);

            foreach ($paramsArray as $item) {
                [$key, $value] = explode('=', $item);

                $parameters[$key] = $value;
            }
        }
        $uri = rtrim(rawurldecode($uri), '/');

        $routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);

        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                throw new RouteNotFoundException();
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                throw new MethodNotAllowedException();
                break;
            case Dispatcher::FOUND:
                [, $handler, $vars] = $routeInfo;

                $class = $handler[0];
                $method = $handler[1];

                $payload = $request->getPayload()->all();

                if (!empty($parameters) || !empty($payload)) {
                    $vars['request'] = $request;
                }

                return call_user_func_array([$this->container->get($class), $method], $vars);
                break;
        }

        return null;
    }

    public static function create(): static
    {
        $builder = new ContainerBuilder();
        $builder->addDefinitions(dirname(__DIR__) . '/config/container.php');

        $container = $builder->build();

        return new static($container, new Routes());
    }
}