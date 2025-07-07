<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;


class Router
{
    public array $routes = [];
    public function register(string $route, callable|array $action): self
    {
        // Here you would typically store the route in a routing table
        // For simplicity, we will just print the route details
        $this->routes[$route] = $action;

        return $this;
    }

    public function resolve(string $requestUri)
    {
        $route = explode('?', $requestUri)[0]; // Get the path part of the URI

        $action = $this->routes[$route] ?? null;
        if (!$action) {
            throw new RouteNotFoundException("Route not found: $route");
        }


        if (is_callable($action)) {
            // If the action is a callable, we can call it directly
            return call_user_func_array($action, []);
        }

        if (is_array($action)) {
            // If the action is an array, we assume it has a controller and an action
            [$controllerClass, $method] = $action;
            if (class_exists($controllerClass) && method_exists($controllerClass, $method)) {
                $controllerClass = new $controllerClass();
                return call_user_func_array([$controllerClass, $method], []);
            }
        }

        throw new RouteNotFoundException("Route not found: $route");
    }
}
