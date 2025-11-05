<?php
require_once __DIR__ . '/vendor/autoload.php';
use Bramus\Router\Router;

$router = new Router();

require_once __DIR__ . '/routes/auth.php';
cargarRutasUsuarios($router);

$router->get('/', function() {
    header('Location: /pizzeria');
    exit();
});

$router->get('/trabajadores', function() {
    header('Location: /trabajadores/login');
    exit();
});

$router->set404(function() {
    echo 'Página no encontrada.';
});

$router->run();
