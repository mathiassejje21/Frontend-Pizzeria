<?php 
function cargarRutasCliente($router) {

    $router->get('/pizzeria/dashboard', function() {
        session_start();
        if(!isset($_SESSION['user'])){
            header('Location: /pizzeria/login');
            exit();
        }
        if($_SESSION['user']['rol'] !== 'cliente') {
            header('Location: /trabajadores/login');
            exit();
        }
        echo "<h1>Panel de Cliente</h1>";
        print_r($_SESSION['user']);
    });
}
?>