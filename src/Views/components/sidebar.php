<?php

$action = 'index';
if(isset($_GET['action'])){
    $action=$_GET['action'];
}else if(isset($_GET['config'])){
    $action='configuracion';
}
 
 $bgColor = ($action == 'index') ? '#0058A0' : 'transparent';
?>

<link rel="stylesheet" href="./css/sidebar.css">


<nav class="fondoPrincipal cuadroSidebar overflow-hidden" id="sidebar">
    <button class="btn p-0 ms-1 mt-2 botones" id="botonSidebar">
        <img src="./resources/images/global/toggle.png" alt="toggel" id="imagen-toggle" class="rotar-imagen-inicio">
    </button>
    <div class="separador my-2"></div>
    <a href="index.php?action=index" class="d-flex align-items-center ps-1 py-1 mb-2" <?php if($action == 'index'){echo 'style="background-color: #0058A0; " ';}?>>
        <img src="./resources/images/global/hogar.png" alt="guia de turismo" width="30">
        <p class="text-light m-0 ps-2 text-sidebar-option">Inicio</p>
    </a>
    <a href="index.php?action=1" class="d-flex align-items-center ps-1 py-1 mb-2" <?php if($action == '1'){echo 'style="background-color: #0058A0; " ';}?>>
        <img src="./resources/images/global/development.png" alt="guia de turismo" width="30">
        <p class="text-light m-0 ps-2 text-sidebar-option">Desarrollo de software</p>
    </a>
    <a href="index.php?action=2" class="d-flex align-items-center ps-1 py-1 mb-2" <?php if($action == '2'){echo 'style="background-color: #0058A0; " ';}?>>
        <img src="./resources/images/global/cocinero.png" alt="guia de turismo" width="30">
        <p class="text-light m-0 ps-2 text-sidebar-option">Arte culinario Ecuatoriano</p>
    </a>
    <a href="index.php?action=3" class="d-flex align-items-center ps-1 py-1 mb-2" <?php if($action == '3'){echo 'style="background-color: #0058A0; " ';}?>>
        <img src="./resources/images/global/vestido-tipico-mexicano.png" alt="guia de turismo" width="30">
        <p class="text-light m-0 ps-2 text-sidebar-option">Diseño de modas</p>
    </a>
    <a href="index.php?action=4" class="d-flex align-items-center ps-1 py-1 mb-2" <?php if($action == '4'){echo 'style="background-color: #0058A0; " ';}?>>
        <img src="./resources/images/global/viaje-y-turismo.png" alt="guia de turismo" width="30">
        <p class="text-light m-0 ps-2 text-sidebar-option">Guía nacional de turismo</p>
    </a>
    <a href="index.php?action=5" class="d-flex align-items-center ps-1 py-1 mb-2" <?php if($action == '5'){echo 'style="background-color: #0058A0; " ';}?>>
        <img src="./resources/images/global/marketing.png" alt="guia de turismo" width="30">
        <p class="text-light m-0 ps-2 text-sidebar-option">Marketing digital</p>
    </a>
    <?php
if (isset($_SESSION['user']) && $_SESSION['user']['role']==0 || isset($_SESSION['user']) && $_SESSION['user']['role']==2) {
    $color= $action == 'configuracion' ? "style='background-color: #0058A0; '" : '';
    echo "<a href='index.php?config=true' class='d-flex align-items-center ps-1 py-1 mb-2' $color>
        <img src='./resources/images/global/configuracion.png' alt='configuracion' width='30'>
        <p class='text-light m-0 ps-2 text-sidebar-option'>Configuracion del sistema</p>
    </a>";
}
    ?>
    
    
</nav>

<script src="./js/sidebar.js"></script>