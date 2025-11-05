<?php require_once __DIR__ . '/header.php'; ?>
<?php 
    if ($_SERVER['REQUEST_URI'] === '/Pizzeria/login'){
        $action = '/Pizzeria/login';
        $h2color = 'red';
        $btncolor = 'btn-danger';
        $bgcolor =  'rgb(254, 246, 235)';
        $text = 'Pizzeria Don Luigi';
        $img = '/public/login-cliente.jpg';
;
    } elseif ($_SERVER['REQUEST_URI'] === '/trabajadores/login'){
        $action = '/trabajadores/login';
        $h2color = '#c95f09ff';
        $btncolor = 'btn-dark';
        $bgcolor = '#ffffffff';
        $text = 'Panel de Trabajadores';
        $img = '/public/login-trabajadores.jpg';
    }
?>
<section id="contenedor-login" style=" background-color: <?= $bgcolor ?>; ">
    <div>
        <h2 style="color: <?= $h2color ?>;"><?= $text ?></h2>
        <h7 style="color: #686868ff;">Ingrese su Correo y Contraseña</h7>

        <?php 
        session_start();
        $error = $_SESSION['error'] ?? '';
        unset($_SESSION['error']);
        ?>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger" role="alert" style="margin-bottom: -0.5rem;text-align: center;">
                <?= htmlspecialchars($error) ?> 
            </div>
        <?php endif; ?>
        <form method="post" action="<?= htmlspecialchars($action) ?>">
            <div class="mb-3">
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="example@gmail.com">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="********">
            </div>
            <button type="submit" class="btn <?= $btncolor ?>">Iniciar Sesion</button>
        </form>

        <?php if ($_SERVER['REQUEST_URI'] === '/Pizzeria/login'): ?>
            <div style="margin-top: 0.5rem; text-align: center;">
                <p style="color: #686868ff; margin-bottom: 2rem;">¿No tienes una cuenta?</p>
                <a href="/Pizzeria/register" class="btn btn-outline-danger">Crear cuenta</a>
            </div>
        <?php endif; ?>
    </div>
    <div>
        <img src="<?= $img ?>" alt="imagen de Login">
    </div>
</section>
    
<?php require_once __DIR__ . '/footer.php'; ?>
