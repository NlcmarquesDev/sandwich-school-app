<?php
session_start();

use App\Core\Router;

const BASE_PATH = __DIR__ . '/../';

require_once BASE_PATH . 'vendor/autoload.php';
require_once BASE_PATH . 'app/Core/functions.php';




$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


// dd($uri);

$router = new Router();

$router->get('/', '/index');

$router->get('/login', '/login/show');
$router->post('/login', '/login/checkLogin');

$router->get('/logout', '/logout');

$router->get('/register', '/registration/show');
$router->post('/register', '/registration/create');


$router->get('/success', '/success');


$router->router($uri, $method);
