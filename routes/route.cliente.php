<?php 

function cargarRutasCliente($router) {

    $router->get('/Pizzeria', function() {
        echo "Bienvenido al sitio de la Pizzería!";
    });

    $router->get('/Pizzeria/dashboard', function() {
        session_start();
        if(!isset($_SESSION['user'])){
            header('Location: /Pizzeria/login');
            exit();
        }
        print_r($_SESSION['user']);
    });
}
?>