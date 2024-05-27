<?php

use App\Core\Router;

const BASE_PATH = __DIR__ . '/../';

require_once BASE_PATH . 'vendor/autoload.php';
require_once BASE_PATH . 'app/Core/functions.php';




$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


// dd($uri);

$router = new Router();

$router->get('/', '/index');
$router->get('/login', '/login');
$router->get('/register', '/register');


$router->router($uri, $method);
