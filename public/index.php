<?php

use App\Middlewares\AuthMiddleware;
use App\Middlewares\RoleMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$router = new AltoRouter();

// --- ROUTES PUBLIQUES (AUTH) ---
$router->map('GET', '/login', ['controller' => 'AuthController#loginView'], 'login');
$router->map('POST', '/login', ['controller' => 'AuthController#login'], 'login_post');
$router->map('GET', '/register', ['controller' => 'AuthController#registerView'], 'register');
$router->map('POST', '/register', ['controller' => 'AuthController#register'], 'register_post');

// --- ROUTES PROTÉGÉES (Nécessitent d'être connecté) ---
$router->map('GET', '/', [
  'controller' => 'HomeController#index',
  'middlewares' => ['auth']
], 'home');

$router->map('GET', '/edit', [
  'controller' => 'HomeController#edit',
  'middlewares' => ['auth']
], 'user_edit');

$router->map('POST', '/edit', [
  'controller' => 'HomeController#edit',
  'middlewares' => ['auth']
], 'user_edit_post');

$router->map('POST', '/logout', [
  'controller' => 'AuthController#logout',
  'middlewares' => ['auth']
], 'logout');

// --- ROUTE ADMIN (Nécessite le rôle admin) ---
$router->map('GET', '/delete', [
  'controller' => 'HomeController#delete',
  'middlewares' => ['role' => '1']
], 'user_delete');


$match = $router->match();

if (is_array($match)) {
  $target = $match['target'];

  $middlewareMap = [
    'auth' => AuthMiddleware::class,
    'role' => RoleMiddleware::class,
  ];

  if (isset($target['middlewares'])) {
    foreach ($target['middlewares'] as $key => $value) {
      $middlewareKey = is_int($key) ? $value : $key;
      $argument = is_int($key) ? null : $value;

      if (isset($middlewareMap[$middlewareKey])) {
        $middlewareClass = $middlewareMap[$middlewareKey];

        $middlewareInstance = new $middlewareClass();

        if ($argument !== null) {
          $middlewareInstance->handle($argument);
        } else {
          $middlewareInstance->handle();
        }
      }
    }
  }

  list($controller, $action) = explode('#', $target['controller']);

  $controllerName = "App\\Controllers\\" . $controller;

  if (class_exists($controllerName)) {
    $obj = new $controllerName();

    if (is_callable([$obj, $action])) {
      call_user_func_array([$obj, $action], $match['params']);
    } else {
      echo "L'action '$action' n'existe pas dans le contrôleur $controllerName.";
    }
  } else {
    echo "Le contrôleur $controllerName n'existe pas.";
  }
} else {
  http_response_code(404);
  echo 'Erreur 404 - Page introuvable';
}
