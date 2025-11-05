<?php
require_once __DIR__ . '/../src/controllers/authController.php';
require_once __DIR__ . '/route.personal.php';
require_once __DIR__ . '/route.cliente.php';
require_once __DIR__ . '/route.admin.php';

function cargarRutasUsuarios($router) {
    $auth = new authController();

    $router->get('/trabajadores/login', [$auth, 'showLogin']);
    $router->post('/trabajadores/login', [$auth, 'processLogin']);
    $router->get('/trabajadores/logout', [$auth, 'logout']);

    cargarRutasAdmin($router);
    cargarRutasPersonal($router);

    $router->get('/pizzeria', function() {
        require_once __DIR__ . '/../src/views/cliente/home.php';
    });
    $router->get('/pizzeria/login', [$auth, 'showLogin']);
    $router->post('/pizzeria/login', [$auth, 'processLogin']);
    $router->get('/pizzeria/register', [$auth, 'showRegister']);
    $router->post('/pizzeria/register', [$auth, 'processRegister']);
    $router->get('/pizzeria/logout', [$auth, 'logout']);

    cargarRutasCliente($router);
}
