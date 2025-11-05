<?php require_once __DIR__ . '/../header.php'; ?>

<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$mensaje = $_SESSION['mensaje-register'] ?? '';
$nameClass = '';
$colorbtn = '';
$classbtn = 'ocultar';
unset($_SESSION['mensaje-register']);
?>

<section id="contenedor-register" style="background-color: #000;">
    <div>
        <img src="/public/register-cliente.jpg" alt="">
    </div> 
    <div>
        <section style="
            background-color: #f5f3ef;
            width: 50%;
            padding: 1.5rem;
            border-radius: 1.5rem;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            box-shadow: -2px 5px 10px 5px rgba(218, 213, 213, 0.75);
        ">
        <h2 style="color: #5c2c06;">Pizzeria Don Luigi</h2>
        <h7 class="<?= htmlspecialchars($nameClass) ?>" style="color: #b0b0b0;">Ingrese sus datos personales</h7>
        <?php if (!empty($mensaje)): ?>
            <?php 
                if ($mensaje === 'Usuario registrado correctamente') {
                    $nameClass = 'ocultar';
                    $colorbtn = 'alert-success';
                    $classbtn = '';
                } else {
                    $nameClass = '';
                    $colorbtn = 'alert-danger';
                    $classbtn = 'ocultar';
                }
            ?>
            <div class="alert <?= htmlspecialchars($colorbtn) ?>" role="alert" style="margin-bottom: 0.1rem;text-align: center;">
                <?= htmlspecialchars($mensaje) ?> 
            </div>
        <?php endif; ?>
        <form class="<?= htmlspecialchars($nameClass) ?>" method="post" action="/Pizzeria/register">
            <div class="mb-2">
                <input type="text" class="form-control" name="nombre" placeholder="Juan Perez" >
            </div>
            <div class="mb-2">
                <input type="email" class="form-control" name="email" placeholder="example@gmail.com" >
            </div>
            <div class="mb-2">
                <input type="password" class="form-control" name="password" placeholder="********" >
            </div>
            <button type="submit" class="btn btn-danger">Registrarse</button>
        </form>
        <a href="/Pizzeria/login" style="text-decoration: none; width: 70%;" class="btn btn-success <?= htmlspecialchars($classbtn) ?>">Iniciar Sesion</a>
        </section>
    </div>
</section>

<?php require_once __DIR__ . '/../footer.php'; ?>
