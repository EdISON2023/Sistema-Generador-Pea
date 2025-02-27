<?php

namespace PeaYavirac\Services;

use PeaYavirac\Models\MallaCurricularModel;
use PeaYavirac\Models\UsuariosModel;
use PeaYavirac\Services\MateriaService;

class ReportespdfService
{
    private $model;
    private $modelDocente;
    public $semestres = [
        "primero",
        "segundo",
        "tercero",
        "cuarto",
        "quinto",
        "sexto",
        "séptimo",
        "octavo",
        "noveno",
        "décimo"
    ];

    private $materiasService;

    public function __construct()
    {
        $this->materiasService = new MateriaService();
        $this->model = new MallaCurricularModel();
        
        $this->modelDocente = new UsuariosModel();
    }

    public function mayaCurricular(){
        $semestres = $this->semestres;
        $data = [
            'coleccion' => []
        ];
        $documentos = $this->model->find((int)$_GET['action']);
        
        // Simulamos un trabajo con los documentos obtenidos
        foreach ($documentos as $documento) {
            $data['coleccion'][] = json_decode(json_encode($documento), true);
        }
    
        $materias = [];
        $maxSemestre = null;
    
        if (isset($data['coleccion']) && count($data['coleccion']) > 0) {
            $selectedValue = isset($_GET['mayaYear']) ? $_GET['mayaYear'] : $data['coleccion'][0]['periodo'];
    
            foreach ($data['coleccion'] as $dataSelect) {
                if ($dataSelect['periodo'] == $selectedValue) {
                    $materias = $this->materiasService->materiasName($dataSelect['materias']);
                    $maxSemestre = $dataSelect['semestres'];
                    break;
                }
            }
        }
    
        return [
            'data' => $data,
            'materias' => $materias,
            'maxSemestre' => $maxSemestre,
            'semestres' => $semestres,
        ];
    }

    public function PeaReportService($idPea){
        $data = [
            'coleccion' => []
        ];
        // $documentos = $this->model->find((int)$_GET['action']);
        
        // // Simulamos un trabajo con los documentos obtenidos
        // foreach ($documentos as $documento) {
        //     $data['coleccion'][] = json_decode(json_encode($documento), true);
        // }
    
        // // Inicializamos las variables para evitar errores de variable no definida 
        // $materias = []; // o null, según lo que prefieras
        // $maxSemestre = null; // o 0, según lo que prefieras
    
        // // Data sel select
        // if (isset($data['coleccion']) && count($data['coleccion']) > 0) {
        //     $selectedValue = isset($_GET['mayaYear']) ? $_GET['mayaYear'] : $data['coleccion'][0]['periodo'];
    
        //     foreach ($data['coleccion'] as $dataSelect) {
        //         if ($dataSelect['periodo'] == $selectedValue) {
        //             $materias = $this->materiasService->materiasName($dataSelect['materias']);
        //             $maxSemestre = $dataSelect['semestres'];
        //             break; // Salimos del bucle una vez que encontramos el primer resultado
        //         }
        //     }
        // }
    
        return $data;
    }
}