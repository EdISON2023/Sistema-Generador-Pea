<?php
namespace PeaYavirac\Services;
require_once('../src/constants/funcionCargaArchivos.php');

use PeaYavirac\Models\MateriaModel;


if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0) {
    $MateriaModel = new MateriaModel();
    $nombre_archivo = $_FILES['archivo']['name'];
    $ruta_temporal = $_FILES['archivo']['tmp_name'];
    $tipo_archivo = $_FILES['archivo']['type'];
    $archivoCargado = cargarArchivo($nombre_archivo, $tipo_archivo, $ruta_temporal, './resources', '/peas/');
    if ($archivoCargado != false) {
        $materia=$MateriaModel->findOne($_POST['idMateriaArchivo']);
        $materia->documento_Validacion=$archivoCargado;
        $MateriaModel->UpdateOne($_POST['idMateriaArchivo'],$materia);
        header("Location: index.php?action=" . $_GET['action'] ."&materia=" . $_POST['idMateriaArchivo']);
    }
} else {
    echo "Error al subir el archivo. Código de error: " . $_FILES['archivo']['error'];
}



?>
