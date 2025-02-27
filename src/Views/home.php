<?php
require_once '../src/Views/components/navbar.php';
?>

<div class="d-flex position-relative">
    <span class="position-absolute">
        <?php require_once '../src/Views/components/sidebar.php'; ?>
    </span>

    <div class="espacioContenido">
        <?php require_once '../src/Views/components/header.php'; ?>
        <div class="d-flex  justify-content-center my-3 align-items-center">
            <h2 class="mb-0">Visualizador de <span class="colorPrincipal">PEAS</span></h2>
            <p class="colorTexto descripcionPages ms-5 mb-0">El PEA es un documento que detalla la estructura, contenidos y requisitos de una materia o asignatura dentro del currículo académico. Su objetivo principal es proporcionar claridad sobre lo que se espera que los estudiantes aprendan y cómo se llevará a cabo el proceso de enseñanza-aprendizaje.</p>
        </div>

        <h3 class="colorPrincipal text-center my-5">NUESTRAS CARRERAS</h3>

        <div class="d-flex flex-wrap justify-content-center mb-3">
            <?php 
                if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 0) {
                    echo "<a href='index.php?config=true' class='card borderblue m-3 colorSecundario position-static' style='width: 15rem;'>
    <img src='./resources/images/global/tuerca.jpeg' class='card-img-top' alt='...'>
    <div class='card-body'>
        <p class='card-text text-center'>Configuracion del sistema</p>
    </div>
</a>";
                }
            ?>
            <a href="index.php?action=1" class="card borderblue m-3 colorSecundario position-static" style="width: 15rem;">
                <img src="./resources/images/global/desarrollo-software-v2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text text-center">Desarrollo de software</p>
                </div>
            </a>
            <a href="index.php?action=2" class="card borderblue m-3 colorSecundario position-static" style="width: 15rem;">
                <img src="./resources/images/global/arte-culinario.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text text-center">Arte culinario Ecuatoriano</p>
                </div>
            </a>
            <a href="index.php?action=3" class="card borderblue m-3 colorSecundario position-static" style="width: 15rem;">
                <img src="./resources/images/global/modas-v2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text text-center">Diseño de modas</p>
                </div>
            </a>
            <a href="index.php?action=4" class="card borderblue m-3 colorSecundario position-static" style="width: 15rem;">
                <img src="./resources/images/global/guia-v2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text text-center">Guía nacional de turismo</p>
                </div>
            </a>
            <a href="index.php?action=5" class="card borderblue m-3 colorSecundario position-static" style="width: 15rem;">
                <img src="./resources/images/global/marketing-v2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text text-center">Marketing digital</p>
                </div>
            </a>

        </div>
    </div>
</div>