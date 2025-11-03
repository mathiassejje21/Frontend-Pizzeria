<?php

require_once __DIR__ . '/../src/controllers/trabajadores/authController.php';
require_once __DIR__ . '/route.admin.php';

function cargarRutasTrabajadores($router) {
    $auth = new authController();

    $router->get('/trabajadores/login', [$auth, 'showLogin']);
    $router->post('/trabajadores/login', [$auth, 'processLogin']);
    $router->get('/trabajadores/logout', [$auth, 'logout']);

    cargarRutasAdmin($router);
}
?>
