<?php
namespace PeaYavirac\Services;
use PeaYavirac\Services\MallaCurricularService;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $MallaCurricularService = new MallaCurricularService();
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data)) {
        $addMalla = $MallaCurricularService->EditarMalla($data['data'], $data['id'], $data['eliminar']);
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'message' => 'Datos actualizados correctamente',
            'updatedData' => $addMalla
        ]);
    } else {
        header('Content-Type: application/json', true, 400);
        echo json_encode([
            'success' => false,
            'message' => 'Faltan parámetros necesarios en malla'
        ]);
    }
}
?>