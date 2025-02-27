<?php

namespace PeaYavirac\Services;

use PeaYavirac\Models\MateriaModel;

class MateriaService
{
    private $model;

    public function __construct()
    {
        $this->model = new MateriaModel();
    }

    public function agregarMaterias($dataArray)
    {
        return $this->model->insertMany($dataArray);
    }


    public function materiasName($materias)
    {
        $data = [];
        foreach ($materias as $materia) {
            // Asegurarse de que $materia sea un array
            if (is_object($materia)) {
                $materia = (array) $materia;  // Convertir el objeto en array
            }
            if (isset($materia['$oid'])) {
                // Obtener el objeto de la base de datos y convertirlo en array
                $materiaSelect = json_decode(json_encode($this->model->findOne($materia['$oid'])), true);
                if (isset($materiaSelect['descripcion']) && isset($materiaSelect['semestre'])) {
                    $data[] = [
                        'oid' => $materia['$oid'],
                        'materia' => $materiaSelect['descripcion'],
                        'usuarioDocente' => $materiaSelect['usuario'],
                        'semestre' => $materiaSelect['semestre']
                    ];
                } else {
                    // Manejar el caso en que 'descripcion' o 'semestre' no existen
                    $data[] = [
                        'oid' => $materia['$oid'],
                        'materia' => 'Desconocida',
                        'semestre' => 'Desconocido'
                    ];
                }
            } else {
                // Manejar el caso en que '$oid' no esté presente en $materia
                $data[] = [
                    'oid' => 'Desconocido',
                    'materia' => 'Desconocida',
                    'semestre' => 'Desconocido'
                ];
            }
        }
        return $data;
    }

    public function materiasId($id)
    {
        $data = json_decode(json_encode($this->model->findOne($id), true));

        return $data;
    }

    public function EliminarUno($dataArray)
    {
        return $this->model->deleteOne($dataArray);
    }

    public function EliminarMany($dataArray)
    {
        return $this->model->deleteMany($dataArray);
    }
    public function editar($id, $dataArray)
    {
        return $this->model->UpdateOne($id, $dataArray);
    }
}
