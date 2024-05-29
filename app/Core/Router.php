<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\Middleware\Auth;
use App\Core\Middleware\Guest;

class Router
{


    public $routes = [];

    public function router($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                // apply the middleware

                if ($route['middleware'] === 'guest') {
                    (new Guest)->handle();
                }
                if ($route['middleware'] === 'auth') {
                    // if (!$_SESSION['user'] ?? false) {
                    //     redirect('/broodjes_app/');
                    // }
                    (new Auth)->handle();
                }
                include(BASE_PATH . 'app/Controllers' . $route['controller'] . '.php');
            }
        }
    }

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => '/broodjes_app' . $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];
        return $this;
    }
    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }
    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function only($role)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $role;
        // dd($this->routes);
        return $this;
    }
}
