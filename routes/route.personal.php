<?php 

function cargarRutasPersonal($router) {
    $router->get('/personal/dashboard', function() {
        session_start();
        if(!isset($_SESSION['user'])){
            header('Location: /trabajadores/login');
            exit();
        }
        if($_SESSION['user']['rol'] == 'cliente') {
            header('Location: /pizzeria/login');
            exit();
        }
        print_r($_SESSION['user']);
    });
}
?>

