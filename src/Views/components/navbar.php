<?php 
if (isset($_POST['action']) && $_POST['action'] == 'logout') {
    // Eliminar la sesión
    session_unset();
session_destroy();
}
?>
<link rel="stylesheet" href="./css/navbar.css">
<style>
    .cerrarsession:hover{
        background-color: #0058A0 !important;
        color: white;
    }
</style>
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#" style="background: none !important;">
            <img src="./resources/images/global/logo-yavirac.png" alt="Logo" width="45" class="d-inline-block align-text-top">
            <p class="m-0 colorPrincipal ms-2">Bienvenido</p>
        </a>
        
        <?php
        if (isset($_SESSION['user'])) {
            $datasession=$_SESSION['user']['nombres'];
            $urlimages=$_SESSION["user"]["image_url"];
            echo "<div class='d-flex align-items-center'>
    <div class='dropdown'>
        <button class='btn dropdown-toggle colorPrincipal' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
            $datasession
        </button>
        <ul class='dropdown-menu'>
            <li><a class='dropdown-item' href='index.php?action=config'>Configurar perfil</a></li>
            <li><form method='POST' action=''>
                        <input type='hidden' name='action' value='logout'>
                        <button class='dropdown-item ps-3 py-1 cerrarsession' type='submit' style='border: none; background: none; padding: 0; cursor: pointer;'>Cerrar Sesión</button>
                    </form></li>
        </ul>
    </div>
    <img src='./resources/docentesImages/$urlimages' alt='foto-perfil' width='45'>
</div>";
        }else{
            echo "<form class='d-flex' method='POST' action='index.php?action=login' onsubmit='handleLogin(); return false;'>
    <input type='hidden' name='redirect_url' id='redirect_url'>
    <button class='btn colorPrincipal d-flex align-items-center' type='submit'>
        <p class='m-0 me-2'>Inicio sesión</p>
        <img src='./resources/images/global/BoxArrowInRight.png' alt='foto-perfil' width='30'>
    </button>
</form>";
        }
        ?>
    </div>
</nav>

<script>
    function handleLogin() {
        const url = new URL(window.location.href);
        const cleanedUrl = url.pathname + url.search;

        document.getElementById('redirect_url').value = cleanedUrl;
        document.querySelector('form').submit();
    }
</script>