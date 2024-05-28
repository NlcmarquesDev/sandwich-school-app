<?php
session_start();

use App\Core\Router;

const BASE_PATH = __DIR__ . '/../';

require_once BASE_PATH . 'vendor/autoload.php';
require_once BASE_PATH . 'app/Core/functions.php';




$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


// dd($uri);

$router = new Router();

$router->get('/', '/index');

$router->get('/login', '/login/show');
$router->post('/login', '/login/checkLogin');

$router->get('/forgotpassword', '/forgotpassword/show');
$router->post('/forgotpassword', '/forgotpassword/create');
$router->get('/reset-password', '/forgotpassword/confirm');

$router->get('/logout', '/logout');

$router->get('/register', '/registration/show')->only('guest');
$router->post('/register', '/registration/create');
$router->get('/validate-email', '/registration/confirm');


$router->get('/dashboard', '/dashboard/show')->only('auth');


$router->get('/success', '/success');


$router->router($uri, $method);
