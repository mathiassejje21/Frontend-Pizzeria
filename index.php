<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/routes/auth.php';
use Bramus\Router\Router;

$router = new Router();

$router->get('/', function() {
    echo "Hola, bienvenido a la Pizzería!";});

cargarRutasTrabajadores($router);

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

