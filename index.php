<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/routes/auth.php';
use Bramus\Router\Router;

$router = new Router();

cargarRutasUsuarios($router);

$router->get('/', function() {
    header('Location: /Pizzeria');
    exit();
});

$router->get('/trabajadores', function() {
    header('Location: /trabajadores/login');
    exit();
});

$router->set404(function() {
    header('Location: /'); 
    exit();
});

$router->run();

?>

