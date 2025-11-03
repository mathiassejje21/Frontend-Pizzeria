<?php require_once __DIR__ . '/../header.php'; ?>

<form action="/trabajadores/login" method="POST">
    <h2>Login de Trabajadores</h2>
    <input name="email" placeholder="email" type="email" required>
    <input name="password" placeholder="Contraseña" type="password" required>
    <button type="submit">Entrar</button>
</form>


<img src="/Frontend-Pizzeria/public/assets/user-login.svg" alt="Usuario" width="50" height="50">


<?php require_once __DIR__ . '/../footer.php'; ?>

    
