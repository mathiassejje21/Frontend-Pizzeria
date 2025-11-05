<?php
require_once __DIR__ . '/vendor/autoload.php';
use Bramus\Router\Router;

$router = new Router();

// Normalizar URL: minúsculas y quitar slash final, excepto para la raíz '/'
$uri = $_SERVER['REQUEST_URI'];
if ($uri !== '/' && $uri !== strtolower(rtrim($uri, '/'))) {
    $normalized = strtolower(rtrim($uri, '/'));
    header("Location: $normalized");
    exit();
}

require_once __DIR__ . '/routes/auth.php';
cargarRutasUsuarios($router);

// Redirección de la raíz al home de la pizzería
$router->get('/', function() {
    header('Location: /Pizzeria');
    exit();
});

// Redirección rápida a login de trabajadores
$router->get('/trabajadores', function() {
    header('Location: /trabajadores/login');
    exit();
});

// Página 404
$router->set404(function() {
    echo 'Página no encontrada.';
});

$router->run();
