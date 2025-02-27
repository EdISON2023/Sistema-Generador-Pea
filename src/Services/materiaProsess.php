<?php
 // Inicia el almacenamiento en búfer de salida
namespace PeaYavirac\Services;

use PeaYavirac\Models\MateriaModel;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $MateriaService = new MateriaModel();
    
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['id']) && isset($data['data'])) {
        $updateResult = $MateriaService->UpdateOne($data['id'],$data['data']);
        $response = [
            'success' => true,
            'message' => 'Datos actualizados correctamente',
            'updatedData' => $data  
        ];
        echo json_encode($response);
    } else {
        $response = [
            'success' => false,
            'message' => 'Faltan parámetros necesarios en materia'
        ];
        echo json_encode($response);
    }
}

// Finaliza y envía el contenido almacenado
?>