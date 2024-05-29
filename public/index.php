<?php
session_start();

use App\Core\Router;

const BASE_PATH = __DIR__ . '/../';

require_once BASE_PATH . 'vendor/autoload.php';
require_once BASE_PATH . 'app/Core/functions.php';




$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];



$router = new Router();
//frontpage
$router->get('/', '/index');
//login
$router->get('/login', '/login/show')->only('guest');
$router->post('/login', '/login/checkLogin');
//forgotpassword
$router->get('/forgotpassword', '/forgotpassword/show');
$router->post('/forgotpassword', '/forgotpassword/create');
$router->get('/reset-password', '/forgotpassword/confirm');
//logout
$router->get('/logout', '/logout');
//register
$router->get('/register', '/registration/show')->only('guest');
$router->post('/register', '/registration/create')->only('guest');
$router->get('/validate-email', '/registration/confirm');

//choose the sandwish
$router->get('/brood', '/dashboard/brood')->only('auth');
$router->get('/beleg', '/dashboard/beleg')->only('auth');
$router->post('/beleg', '/dashboard/create')->only('auth');


//order
$router->get('/order', '/order/show')->only('auth');
$router->post('/order', '/order/create')->only('auth');
//checkout
$router->get('/checkout', '/dashboard/checkout')->only('auth');

//messages - need to change to message =>alerts
$router->get('/success', '/success');

//function to work all the routes
$router->router($uri, $method);
