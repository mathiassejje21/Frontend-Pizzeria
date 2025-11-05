<?php 

function cargarRutasAdmin($router) {
    $router->get('/admin/dashboard', function() {
        session_start();
        if(!isset($_SESSION['user'])){
            header('Location: /trabajadores/login');
            exit();
        }
        if($_SESSION['user']['rol'] !== 'administrador') {
            session_destroy();
            header('Location: /pizzeria/login');
            exit();
        }
        print_r($_SESSION['user']);
    });
}



?>