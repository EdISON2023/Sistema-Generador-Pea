<?php
require_once '../config/config.php';
session_start();
require_once '../src/services/LoginService.php';

if(!isset($_GET['materiaProcess'] ) && !isset($_GET['reporte'] ) && !isset($_GET['reportePea'] ) && !isset($_GET['mallaProcess']) && !isset($_GET['userProcess']) && !isset($_GET['validacion']) && !isset($_GET['mallaEditProcess']  )){

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./resources/images/global/logo-yavirac.png" type="image/x-icon">
    <link rel="stylesheet" href="./resources/boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/global.css">
    <title><?php echo APP_NAME; ?></title>
</head>
<body>

    <?php require_once '../src/routes.php'; ?>

    <script src="./resources/boostrap/js/popper.min.js"></script>
    <script src="./resources/boostrap/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php }else{
    require_once '../src/routes.php';
} ?>