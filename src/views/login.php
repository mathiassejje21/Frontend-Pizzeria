<?php require_once __DIR__ . '/header.php'; ?>
<section id="contenedor-login">
    <div class="form-login">
        <h2 style="color: red;">Pizzeria Don Luigi</h2>
        <h7 style="color: #686868ff;">Ingrese su Correo y Contraseña</h7>
        <form method="post" action="/trabajadores/login">
            <div class="mb-3">
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="example@gmail.com">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="********">
            </div>
            <button type="submit" class="btn btn-danger">Iniciar Sesion</button>
        </form>

        <?php if ($_SERVER['REQUEST_URI'] === '/Pizzeria/login'): ?>
            <div style="margin-top: 15px;">
                <a href="/Pizzeria/register" class="btn btn-secondary">Registrarse</a>
            </div>
        <?php endif; ?>
    </div>
    <div>
        <img src="/public/image-pizza.jpg" alt="">
    </div>
</section>
    
<?php require_once __DIR__ . '/footer.php'; ?>
