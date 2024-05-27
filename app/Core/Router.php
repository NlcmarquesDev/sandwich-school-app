<?php

declare(strict_types=1);

namespace App\Core;

class Router
{


    public $routes = [];

    public function router($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                include(BASE_PATH . 'app/Controllers' . $route['controller'] . '.php');
            }
        }
    }
    public function get($uri, $controller)
    {
        $this->routes[] = [
            'uri' => '/broodjes_app' . $uri,
            'controller' => $controller,
            'method' => 'GET',
        ];


        return $this;
    }
}
