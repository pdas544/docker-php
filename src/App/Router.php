<?php

declare(strict_types=1);

namespace App;


class Router
{
    public array $routes = [];
    public function register(string $method, string $path, callable $callback): void
    {
        // Here you would typically store the route in a routing table
        // For simplicity, we will just print the route details
        echo "Registered route: $method $path\n";
    }
}
