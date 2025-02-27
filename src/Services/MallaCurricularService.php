<?php

namespace PeaYavirac\Services;

use PeaYavirac\Models\MallaCurricularModel;
use PeaYavirac\Models\UsuariosModel;
use PeaYavirac\constants\Carreras;
use PeaYavirac\Services\MateriaService;

class MallaCurricularService
{
    private $model;
    private $modelDocente;
    public $Carreras;
    public $CarrerasConstants;
    private $materiasService;
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
    public function __construct()
    {
        $this->materiasService = new MateriaService();
        $this->model = new MallaCurricularModel();
        $this->CarrerasConstants = new Carreras();
        $this->Carreras = $this->CarrerasConstants->Carreras();
        $this->modelDocente = new UsuariosModel();
    }

    public function materiaIdFind($id){
        return $this->materiasService->materiasId($id);
    }

    public function EditarMalla($data,$id,$delete)
    {
        $dataMaterias = [
            'codigo_asignatura' => '',
            'usuario' => '',
            'semestre' => 1,
            'Distribucion_Horas' => [
                'A_contacto_docente' => '0',
                'A_experimental_decente' => '0',
                'A_experimental_autonomo' => '0',
                'A_autonomo' => '0',
            ],
            'documento_Validacion' => '',
            'prerequisitos' => [],
            'correquisitos' => [],
            'formacion_habilidades_blandas' => [],
            'metodologia_enseñanza' => [],
            'bibliografia' => [
                'basica' => [],
                'complementaria' => []
            ],
            'resultados_aprendizaje' => [],
            'contenido_asignatura' => [],
            'resultado' => '',
            'descripcion' => '',
            'descripcion_materia'=>'',
            'usuario_revisado'=>'',
            'usuario_aprovado'=>'',
            'objetivo' => '',
            'creditos_materia' => '',
        ];
        if(count($delete)>0){
            $this->materiasService->EliminarMany($delete);
        }
        $idExist=[];
        $dataMateriasenvio = [];
        foreach ($data['materias'] as $value) {
            if(isset($value['_id'])){
                $dataIdMateria=$this->materiasService->materiasId($value['_id']['$oid']);
                $dataIdMateria->usuario = $value['usuario'];
                $dataIdMateria->descripcion = $value['descripcion'];
                $dataIdMateria->semestre = (int) $value['semestre'];
                print_r($dataIdMateria);
                unset($dataIdMateria->_id);
                
                $this->materiasService->editar($value['_id']['$oid'],$dataIdMateria);
                $idExist[]=$value['_id'];
            }else{
                $dataMaterias['usuario'] = $value['usuario'];
                $dataMaterias['descripcion'] = $value['descripcion'];
                $dataMaterias['semestre'] = (int) $value['semestre'];
                array_push($dataMateriasenvio, $dataMaterias);
            }
        }
        $idsMaterias=[];
        if(count($dataMateriasenvio) > 0){
            $idsMaterias = $this->materiasService->agregarMaterias($dataMateriasenvio);
            
        }
        $data['materias'] = array_merge($idExist,$idsMaterias);
        unset($data->_id);
        return $this->model->UpdateOne($id,$data);
    }

    public function AgregarMalla($data)
    {
        $dataMaterias = [
            'codigo_asignatura' => '',
            'usuario' => '',
            'semestre' => 1,
            'Distribucion_Horas' => [
                'A_contacto_docente' => '0',
                'A_experimental_decente' => '0',
                'A_experimental_autonomo' => '0',
                'A_autonomo' => '0',
            ],
            'documento_Validacion' => '',
            'prerequisitos' => [],
            'correquisitos' => [],
            'formacion_habilidades_blandas' => [],
            'metodologia_enseñanza' => [],
            'bibliografia' => [
                'basica' => [],
                'complementaria' => []
            ],
            'resultados_aprendizaje' => [],
            'contenido_asignatura' => [],
            'resultado' => '',
            'descripcion' => '',
            'descripcion_materia'=>'',
            'usuario_revisado'=>'',
            'usuario_aprovado'=>'',
            'objetivo' => '',
            'creditos_materia' => '',
        ];
        $dataMateriasenvio = [];
        foreach ($data['materias'] as $value) {
            $dataMaterias['usuario'] = $value['docente'];
            $dataMaterias['descripcion'] = $value['nombre'];
            $dataMaterias['semestre'] = (int) $value['semestre'];
            array_push($dataMateriasenvio, $dataMaterias);
        }

        $idsMaterias=[];
        if(count($dataMateriasenvio) > 0){
            $idsMaterias = $this->materiasService->agregarMaterias($dataMateriasenvio);
        }
        
        $data['materias'] = $idsMaterias;
        return $this->model->insertOne($data);
    }


    public function Software()
    {
        $semestres = $this->semestres;

        $data = [
            "header" => 'Desarrollo de software',
            "DescripcionCarrera" => $this->Carreras['software']['descripcion'],
            'coleccion' => [],
            'docentes' => [],
            'materiasSelected' => []
        ];
        $data['docentes'] = $this->modelDocente->findAllDocentes();
        $documentos = $this->model->find($this->Carreras['software']['id']);
        foreach ($documentos as $documento) {
            $data['coleccion'][] = json_decode(json_encode($documento), true);
        }
        //data sel select
        if (isset($data['coleccion']) && count($data['coleccion']) > 0) {
            $selectedValue = isset($_POST['ciclo']) ? $_POST['ciclo'] : $data['coleccion'][0]['periodo'];
            foreach ($data['coleccion'] as $dataSelect) {
                if ($dataSelect['periodo'] == $selectedValue) {
                    $materias = $this->materiasService->materiasName($dataSelect['materias']);
                    $maxSemestre = $dataSelect['semestres'];
                }
            }
            
        }

        $materiasFind = [];
        if (is_array($data['coleccion'])) {
            foreach($data['coleccion'] as $datosSelectMateria){
                if ($datosSelectMateria['periodo'] == $selectedValue) {
                    foreach ($datosSelectMateria['materias'] as $materiasData) {
                        if (is_array($materiasData) && isset($materiasData['$oid'])) {
                            $materiasFind[] = $this->materiaIdFind($materiasData['$oid']);
                        } else {
                            echo "Error: $materiasData no es un array o no tiene la clave '\$oid'.";
                        }
                    }
                    
                    $data['materiasSelected'] = $materiasFind;
                }
            }
        } else {
            // Manejar el caso cuando 'coleccion' no sea un array
            echo "Error: 'coleccion' no es un array.";
        }

       

        include '../src/Views/mallaCurricular.php';
        return $data;
    }

    public function Culinaria()
    {
        $semestres = $this->semestres;
        $data = [
            "header" => 'Arte culinario Ecuatoriano',
            "DescripcionCarrera" => $this->Carreras['culinaria']['descripcion'],
            'coleccion' => [],
            'docentes' => [],
            'materiasSelected' => []
        ];
        $data['docentes'] = $this->modelDocente->findAllDocentes();
        $documentos = $this->model->find($this->Carreras['culinaria']['id']);

        foreach ($documentos as $documento) {
            $data['coleccion'][] = json_decode(json_encode($documento), true);
        }
        //data sel select
        if (isset($data['coleccion']) && count($data['coleccion']) > 0) {
            $selectedValue = isset($_POST['ciclo']) ? $_POST['ciclo'] : $data['coleccion'][0]['periodo'];
        
            foreach ($data['coleccion'] as $dataSelect) {
                if ($dataSelect['periodo'] == $selectedValue) {
                    $materias = $this->materiasService->materiasName($dataSelect['materias']);
                    $maxSemestre = $dataSelect['semestres'];
                }
            }
        }


        $materiasFind = [];
        if (is_array($data['coleccion'])) {
            foreach($data['coleccion'] as $datosSelectMateria){
                if ($datosSelectMateria['periodo'] == $selectedValue) {
                    foreach ($datosSelectMateria['materias'] as $materiasData) {
                        if (is_array($materiasData) && isset($materiasData['$oid'])) {
                            $materiasFind[] = $this->materiaIdFind($materiasData['$oid']);
                        } else {
                            echo "Error: $materiasData no es un array o no tiene la clave '\$oid'.";
                        }
                    }
                    
                    $data['materiasSelected'] = $materiasFind;
                }
            }
        } else {
            // Manejar el caso cuando 'coleccion' no sea un array
            echo "Error: 'coleccion' no es un array.";
        }

        include '../src/Views/mallaCurricular.php';
        return $data;
    }

    public function Modas()
    {
        $semestres = $this->semestres;
        $data = [
            "header" => 'Diseño de modas',
            "DescripcionCarrera" => $this->Carreras['modas']['descripcion'],
            'coleccion' => [],
            'docentes' => [],
            'materiasSelected' => []
        ];
        $data['docentes'] = $this->modelDocente->findAllDocentes();
        $documentos = $this->model->find($this->Carreras['modas']['id']);

        foreach ($documentos as $documento) {
            $data['coleccion'][] = json_decode(json_encode($documento), true);
        }
        //data sel select
        if (isset($data['coleccion']) && count($data['coleccion']) > 0) {
            $selectedValue = isset($_POST['ciclo']) ? $_POST['ciclo'] : $data['coleccion'][0]['periodo'];
            foreach ($data['coleccion'] as $dataSelect) {
                if ($dataSelect['periodo'] == $selectedValue) {
                    $materias = $this->materiasService->materiasName($dataSelect['materias']);
                    $maxSemestre = $dataSelect['semestres'];
                }
            }
            
        }


        $materiasFind = [];
        if (is_array($data['coleccion'])) {
            foreach($data['coleccion'] as $datosSelectMateria){
                if ($datosSelectMateria['periodo'] == $selectedValue) {
                    foreach ($datosSelectMateria['materias'] as $materiasData) {
                        if (is_array($materiasData) && isset($materiasData['$oid'])) {
                            $materiasFind[] = $this->materiaIdFind($materiasData['$oid']);
                        } else {
                            echo "Error: $materiasData no es un array o no tiene la clave '\$oid'.";
                        }
                    }
                    
                    $data['materiasSelected'] = $materiasFind;
                }
            }
        } else {
            // Manejar el caso cuando 'coleccion' no sea un array
            echo "Error: 'coleccion' no es un array.";
        }
        include '../src/Views/mallaCurricular.php';
        return $data;
    }

    public function Turismo()
    {
        $semestres = $this->semestres;
        $data = [
            "header" => 'Guía nacional de turismo',
            "DescripcionCarrera" => $this->Carreras['turismo']['descripcion'],
            'coleccion' => [],
            'docentes' => [],
            'materiasSelected' => []
        ];
        $data['docentes'] = $this->modelDocente->findAllDocentes();
        $documentos = $this->model->find($this->Carreras['turismo']['id']);

        foreach ($documentos as $documento) {
            $data['coleccion'][] = json_decode(json_encode($documento), true);
        }
        //data sel select
        if (isset($data['coleccion']) && count($data['coleccion']) > 0) {
            $selectedValue = isset($_POST['ciclo']) ? $_POST['ciclo'] : $data['coleccion'][0]['periodo'];
            foreach ($data['coleccion'] as $dataSelect) {
                if ($dataSelect['periodo'] == $selectedValue) {
                    $materias = $this->materiasService->materiasName($dataSelect['materias']);
                    $maxSemestre = $dataSelect['semestres'];
                }
            }
           
        }


        $materiasFind = [];
        if (is_array($data['coleccion'])) {
            foreach($data['coleccion'] as $datosSelectMateria){
                if ($datosSelectMateria['periodo'] == $selectedValue) {
                    foreach ($datosSelectMateria['materias'] as $materiasData) {
                        if (is_array($materiasData) && isset($materiasData['$oid'])) {
                            $materiasFind[] = $this->materiaIdFind($materiasData['$oid']);
                        } else {
                            echo "Error: $materiasData no es un array o no tiene la clave '\$oid'.";
                        }
                    }
                    
                    $data['materiasSelected'] = $materiasFind;
                }
            }
        } else {
            // Manejar el caso cuando 'coleccion' no sea un array
            echo "Error: 'coleccion' no es un array.";
        }
        include '../src/Views/mallaCurricular.php';
        return $data;
    }

    public function Marketing()
    {
        $semestres = $this->semestres;
        $data = [
            "header" => 'Marketing digital',
            "DescripcionCarrera" => $this->Carreras['marketing']['descripcion'],
            'coleccion' => [],
            'docentes' => [],
            'materiasSelected' => []
        ];
        $data['docentes'] = $this->modelDocente->findAllDocentes();
        $documentos = $this->model->find($this->Carreras['marketing']['id']);

        foreach ($documentos as $documento) {
            $data['coleccion'][] = json_decode(json_encode($documento), true);
        }
        //data sel select
        if (isset($data['coleccion']) && count($data['coleccion']) > 0) {
            $selectedValue = isset($_POST['ciclo']) ? $_POST['ciclo'] : $data['coleccion'][0]['periodo'];
            foreach ($data['coleccion'] as $dataSelect) {
                if ($dataSelect['periodo'] == $selectedValue) {
                    $materias = $this->materiasService->materiasName($dataSelect['materias']);
                    $maxSemestre = $dataSelect['semestres'];
                }
            }
            
        }

        $materiasFind = [];
        if (is_array($data['coleccion'])) {
            foreach($data['coleccion'] as $datosSelectMateria){
                if ($datosSelectMateria['periodo'] == $selectedValue) {
                    foreach ($datosSelectMateria['materias'] as $materiasData) {
                        if (is_array($materiasData) && isset($materiasData['$oid'])) {
                            $materiasFind[] = $this->materiaIdFind($materiasData['$oid']);
                        } else {
                            echo "Error: $materiasData no es un array o no tiene la clave '\$oid'.";
                        }
                    }
                    
                    $data['materiasSelected'] = $materiasFind;
                }
            }
        } else {
            // Manejar el caso cuando 'coleccion' no sea un array
            echo "Error: 'coleccion' no es un array.";
        }
        include '../src/Views/mallaCurricular.php';
        return $data;
    }
}
