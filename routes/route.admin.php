<?php 

function cargarRutasAdmin($router) {
    $router->get('/admin/dashboard', function() {
        session_start();
        if(!isset($_SESSION['user'])){
            header('Location: /trabajadores/login');
            exit();
        }
        print_r($_SESSION['user']);
    });
}



?>