<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$router = new AltoRouter();

$router->map('GET', '/', 'HomeController#index', 'home');
$router->map('GET', '/edit', 'HomeController#edit', 'user_edit');
$router->map('POST', '/edit', 'HomeController#edit', 'user_edit_post');
$router->map('GET', '/delete', 'HomeController#delete', 'user_delete');

// AUTH
$router->map('GET', '/login', 'AuthController#loginView', 'login');
$router->map('POST', '/login', 'AuthController#login', 'login_post');
$router->map('GET', '/register', 'AuthController#registerView', 'register');
$router->map('POST', '/register', 'AuthController#register', 'register_post');
$router->map('POST', '/logout', 'AuthController#logout', 'logout');


$match = $router->match();
if (is_array($match)) {
  list($controller, $action) = explode('#', $match['target']);

  $controllerName = "App\\Controllers\\" . $controller;

  $obj = new $controllerName();

  if (is_callable([$obj, $action])) {
    call_user_func_array([$obj, $action], $match['params']);
  }
} else {
  echo 'Erreur 404 - Page introuvable';
}
