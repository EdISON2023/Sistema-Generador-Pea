<?php

namespace PeaYavirac\Services;

use PeaYavirac\Services\ConfiguracionService;

require_once('../src/constants/funcionCargaArchivos.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Access JSON data for fields
    $input = $_POST;  // $_POST ahora contiene los datos no de archivo
    $ConfiguracionService = new ConfiguracionService();

    // Extract non-file fields from the POST data
    $contraseña = $input['Newcontrasena'];
    $nombresUser = $input['nombresEditUser'];
    $roleUser = (int) $input['roleEditUser'];
    $cedulaUser = $input['cedulaEditUser'];
    $correoUser = $input['correo_institucionalEditUser'];
    $userId = $input['id'];

    // Initialize the image variable
    $archivo = "";

    // Check if a file was uploaded
    if (isset($_FILES['image_urlEditUser']) && $_FILES['image_urlEditUser']['error'] === UPLOAD_ERR_OK) {
        $imagenUser = $_FILES['image_urlEditUser'];

        // Process the file (e.g., save it to the server)
        $archivo = cargarArchivo($imagenUser['name'], $imagenUser['type'], $imagenUser['tmp_name'], './resources/', "docentesImages/");
    } else {
        // Use existing image URL if no new image was uploaded
        $archivo = $input['image_urlEditUser'];
    }

    // Process and update user if all required fields are valid
    if ($nombresUser && $roleUser >= 0 && $cedulaUser && $correoUser) {
        if ($archivo !== false) {
            // Prepare data for user update
            $dataEnvio = [
                "nombres" => $nombresUser,
                "cedula" => $cedulaUser,
                "contraseña" => $contraseña,
                "correo_institucional" => $correoUser,
                "image_url" => $archivo,
                "role" => (int) $roleUser,
                "delete_at" => false
            ];

            // Update user data
            $addMalla = $ConfiguracionService->editUser($userId, $dataEnvio);
            $_SESSION['user']['nombres'] = $dataEnvio['nombres'];
            $_SESSION["user"]["image_url"] = $dataEnvio['image_url'];
            // Respond with success
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'message' => 'Datos actualizados correctamente',
                'updatedData' => $dataEnvio
            ]);
        } else {
            // Handle error in file upload
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'message' => 'Error al procesar los datos',
            ]);
        }
    } else {
        // Missing parameters error
        header('Content-Type: application/json', true, 400);
        echo json_encode([
            'success' => false,
            'message' => 'Faltan parámetros necesarios',
        ]);
    }
}






// Para los archivos

    // if (isset($_POST['idEdit'])) {
    //     $nameUrlEdit='';
    //     if (isset($_FILES['imagenUser']) && $_FILES['imagenUser']['name']) {
    //         $imagenUser = $_FILES['imagenUser'];
    //         $archivo = cargarArchivo($imagenUser['name'], $imagenUser['type'], $imagenUser['tmp_name'],'./resources/', "docentesImages/");
    //         $nameUrlEdit= $archivo;
    //     }else{
    //         $nameUrlEdit= $_POST['urlEdit'];
    //     }
    //     $dataEnvio = [
    //         "nombres" => $nombresUser,
    //         "cedula" => $cedulaUser,
    //         "correo_institucional" => $correoUser,
    //         "image_url" => $nameUrlEdit,
    //         "fecha_nacimiento" => $fechaNacimientoUser,
    //         "role" => (int) $roleUser,
    //         "delete_at" => false
    //     ];
    //     $addMalla = $ConfiguracionService->editUser($_POST['idEdit'], $dataEnvio);

    //     header('Content-Type: application/json');
    //     echo json_encode([
    //         'success' => true,
    //         'message' => 'Datos actualizados correctamente',
    //         'updatedData' => $addMalla  // Puedes devolver los datos que se enviaron
    //     ]);
    // } else 
