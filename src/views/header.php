<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $uri = $_SERVER['REQUEST_URI'];
        $uriLower = strtolower($uri);

        if (preg_match('#^/pizzeria($|/)#', $uriLower)) {
            $urlimg = '/public/logo-pizza.png';
            $text = 'Pizzeria Don Luigi';
        } else {
            $urlimg = '/public/logo-admin.png';
            $text = 'Personal';
        }
    ?>
    <link rel="icon" type="image/png" href="<?= $urlimg ?>">
    <link rel="stylesheet" href="/public/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title><?= $text ?></title>
</head>
<body>
