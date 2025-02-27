<link rel="stylesheet" href="./css/header.css">
<div class="px-3 py-2">
    <div class="d-flex mx-3 justify-content-between mb-2">
        <h4 class="colorSecundario ">
            <?php echo $data['header']; ?>
        </h4>
        <div class="d-flex">
            <?php
            $malla = ['1', '2', '3', '4', '5'];
            if (isset($_SESSION['user'])) {

                if (count($_GET) == 1 && isset($_GET['action']) && in_array($_GET['action'], $malla) && $_SESSION['user']['role'] != 1) {
                    echo '<button type="button" onclick="addMallaModal()"  class="btn btn-success text-light" data-bs-toggle="modal"  data-bs-target="#MallaFormModal"><img class="me-1" src="./resources/images/global/plus-circle.svg" alt=""> Agregar Malla</button>';
                } else if (!isset($_GET['edit']) && isset($_GET['materia']) && strlen($datos->documento_Validacion) == 0) {
                    echo '<button type="button" id="editButton" class="btn btn-success text-light me-2"><img class="me-1" src="./resources/images/global/plus-circle.svg" alt=""> editar</button> <button type="button" class="btn btn-danger text-light" data-bs-toggle="modal" data-bs-target="#subirArchivo">Validar Pea <img class="mb-1 ms-1" src="./resources/images/global/exclamation-triangle-fill.svg" alt=""></button>';
                } else if (isset($_GET['edit']) && $_GET['edit'] == 'materiaEdit') {
                    echo '<button type="button" onclick="enviarDatos()" class="btn btn-success text-light" style="width: 100px;">Editar</button>';
                }
            }

            if (isset($_GET['materia']) && strlen($datos->documento_Validacion) > 0) {
                $PeaDescarga = $datos->documento_Validacion;
                echo "<a href='./resources/peas/$PeaDescarga' Target='_blank' class='btn btn-secondary text-light ms-2'><img class='me-1' src='./resources/images/global/cloud-download-fill.svg' alt=''>Descargar Pea</a>";
            } else if (count($_GET) == 1 && isset($_GET['action']) && in_array($_GET['action'], $malla) && isset($data['coleccion'][0]['periodo']) || isset($_POST['ciclo'])) {
                $periodo = isset($_POST['ciclo']) ? $_POST['ciclo'] : $data['coleccion'][0]['periodo'];
                echo "<a href='index.php?action=" . $_GET['action'] . "&reporte=true&mayaYear=" . $periodo . "' class='btn btn-secondary text-light ms-2'><img class='me-1' src='./resources/images/global/cloud-download-fill.svg' alt=''>Descargar Malla</a>";
            }
            ?>
        </div>
    </div>

    <div class="fondoSecundario separadorHeader"></div>
</div>

<script>
    if (document.getElementById('editButton')) {
        document.getElementById('editButton').addEventListener('click', function() {
            const currentUrl = window.location.href;
            const newUrl = currentUrl.includes('&edit=') ? currentUrl : currentUrl + '&edit=materiaEdit';
            window.location.href = newUrl;
        });
    }

    function addMallaModal() {
        localStorage.removeItem('editMalla')
    }
</script>

<?php
if (isset($_GET['action']) && in_array($_GET['action'], $malla) && !isset($_GET['materia']) && !isset($_GET['config'])) {
    require_once '../src/Views/components/modalFormMalla.php';
}
//index.php?action=1&reporte=true&mayaYear=2022-3
?>