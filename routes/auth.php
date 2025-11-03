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

    $router->get('Pizzeria/login', [$auth, 'showLogin']);
    $router->post('Pizzeria/login', [$auth, 'processLogin']);
    $router->get('Pizzeria/logout', [$auth, 'logout']);

    cargarRutasCliente($router);
}
?>
