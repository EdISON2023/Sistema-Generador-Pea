

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php require_once '../src/Views/components/navbar.php'; ?>

<div class="d-flex position-relative">
    <span class="position-absolute">
        <?php require_once '../src/Views/components/sidebar.php'; ?>
    </span>

    <div class="espacioContenido d-flex justify-content-center w-100 pt-5">
        <div class="d-flex flex-column align-items-center w-100">
            <h1>Error 404: Página no encontrada</h1>
            <p>Lo siento, la página que estás buscando no existe.</p>
            <a href="index.php">Volver a la página principal</a>
        </div>
    </div>
</div>
</body>
</html>