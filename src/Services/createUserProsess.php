<?php

namespace PeaYavirac\Services;

use PeaYavirac\Services\ConfiguracionService;

require_once('../src/constants/funcionCargaArchivos.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ConfiguracionService = new ConfiguracionService();

    // Recoger los datos del formulario
    $nombresUser = $_POST['nombresUser'];
    $roleUser =(int) $_POST['roleUser'];
    $cedulaUser = $_POST['cedulaUser'];
    $correoUser = $_POST['correoUser'];

    // Para los archivos

    if (isset($_POST['idEdit'])) {
        $nameUrlEdit='';
        if (isset($_FILES['imagenUser']) && $_FILES['imagenUser']['name']) {
            $imagenUser = $_FILES['imagenUser'];
            $archivo = cargarArchivo($imagenUser['name'], $imagenUser['type'], $imagenUser['tmp_name'],'./resources/', "docentesImages/");
            $nameUrlEdit= $archivo;
        }else{
            $nameUrlEdit= $_POST['urlEdit'];
        }
        $dataEnvio = [
            "nombres" => $nombresUser,
            "cedula" => $cedulaUser,
            "correo_institucional" => $correoUser,
            "image_url" => $nameUrlEdit,
            "role" => (int) $roleUser,
            "delete_at" => false
        ];
        $addMalla = $ConfiguracionService->editUser($_POST['idEdit'], $dataEnvio);

        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'message' => 'Datos actualizados correctamente',
            'updatedData' => $addMalla  // Puedes devolver los datos que se enviaron
        ]);
    } else if ($nombresUser && $roleUser >= 0 && $cedulaUser && $correoUser) {
        $archivo = "";
        if (isset($_FILES['imagenUser'])) {
            $imagenUser = $_FILES['imagenUser'];
            $archivo = cargarArchivo($imagenUser['name'], $imagenUser['type'], $imagenUser['tmp_name'] ,'./resources/', "docentesImages/");
            if ($archivo != false) {

                $dataEnvio = [
                    "nombres" => $nombresUser,
                    "cedula" => $cedulaUser,
                    "contraseña" => $cedulaUser,
                    "correo_institucional" => $correoUser,
                    "image_url" => $archivo,
                    "role" => (int) $roleUser,
                    "delete_at" => false
                ];

                $addMalla = $ConfiguracionService->UsersAdd($dataEnvio);

                // Aquí puedes agregar los datos a la base de datos, por ejemplo


                // Responder con JSON válido
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => true,
                    'message' => 'Datos actualizados correctamente',
                    'updatedData' => $addMalla  // Puedes devolver los datos que se enviaron
                ]);
            } else {
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => true,
                    'message' => 'error al procesar los datos',
                ]);
            }
        }
    } else {
        // Responder con error JSON válido
        header('Content-Type: application/json', true, 400);
        echo json_encode([
            'success' => false,
            'message' => 'Faltan parámetros necesarios',
            'updatedData' => $_POST
        ]);
    }
}
