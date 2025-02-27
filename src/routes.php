<?php

use PeaYavirac\Controllers\LoginController;
use PeaYavirac\Controllers\MallaCurricularController;
use PeaYavirac\Controllers\MateriaController;
use PeaYavirac\Controllers\ReportesController;
use PeaYavirac\Controllers\ConfiguracionContoller;

$HomeController = new LoginController();
$MallaCurricularController = new MallaCurricularController();

$action = $_GET['action'] ?? 'index';
if (isset($_GET['validacion']) && $_GET['validacion']=='true') {
    include '../src/Services/procesarSubidaArchivos.php';
} else if (isset($_GET['reportePea'])) {
    $ReportesController = new ReportesController();

    $ReportesController->PeaReporte($_GET['reportePea']);
} else if (isset($_GET['config']) && $_GET['config'] == 'true' && isset($_SESSION['user']) && $_SESSION['user']['role'] == 0 || isset($_GET['config']) && $_GET['config'] == 'true' && isset($_SESSION['user']) && $_SESSION['user']['role'] == 2) {
    $ConfiguracionContoller = new ConfiguracionContoller();

    $ConfiguracionContoller->configuracionPage();
} else if (isset($_GET['reporte']) && $_GET['reporte'] == 'true' && isset($_GET['mayaYear'])) {
    $ReportesController = new ReportesController();

    $ReportesController->MayaCurricularReporte();
} else if (isset($_GET['userProcess'])) {
    if ($_GET['userProcess'] == 'create') {
        include '../src/Services/createUserProsess.php';
    } else if ($_GET['userProcess'] == 'edit') {
        include '../src/Services/editUserProsess.php';
    } else if ($_GET['userProcess'] == 'editPerfil') {
        include '../src/Services/editPerfilUserProsess.php';
    }
} else if (isset($_GET['mallaEditProcess']) && $_GET['mallaEditProcess'] == 'true') {
    include '../src/Services/mallaEditProcess.php';
} else if (isset($_GET['mallaProcess']) && $_GET['mallaProcess'] == 'true') {
    include '../src/Services/mallaProsess.php';
} else if (isset($_GET['materiaProcess']) && $_GET['materiaProcess'] == 'true') {
    include '../src/Services/materiaProsess.php';
} else if (isset($_GET['action']) && isset($_GET['materia'])) {
    $MateriaController = new MateriaController($_GET['materia']);

    if (isset($_GET['action']) && isset($_GET['materia']) && isset($_GET['edit']) && $_GET['edit'] = 'materiaEdit') {
        echo $MateriaController->MateriaForm();
    } else {
        echo $MateriaController->Materia();
    }
} else {
    switch ($action) {
        case 'login':
            echo $HomeController->login();
            break;

        case 'index':
            $data = ['header' => 'Inicio'];
            include '../src/Views/home.php';
            break;
        case 'config':
            
            echo $HomeController->PerfilConfig();
            break;
        case '1':
            echo $MallaCurricularController->Software();
            break;

        case '2':
            echo $MallaCurricularController->Culinaria();
            break;

        case '3':
            echo $MallaCurricularController->Modas();
            break;

        case '4':
            echo $MallaCurricularController->Turismo();
            break;

        case '5':
            echo $MallaCurricularController->Marketing();
            break;

        default:
            include_once 'Views/404.php';
            http_response_code(404);
            exit();
    }
}
