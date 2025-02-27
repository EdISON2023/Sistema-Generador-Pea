<?php
namespace PeaYavirac\Controllers;

use PeaYavirac\Services\MateriaService;

class MateriaController
{
    public $materia;
    private $MateriaService;
    public function __construct($materiaId)
    {
        $this->MateriaService=new MateriaService();
        $this->materia=$materiaId;
    }

    public function Materia()
    {
        $header='$this->materia';
        $datos=$this->MateriaService->materiasId($this->materia);
        $data['header']=$datos->descripcion;
        include '../src/Views/materia.php';
    }

    public function MateriaForm()
    {
        $header='$this->materia';
        $datos=$this->MateriaService->materiasId($this->materia);
        $data['header']=$datos->descripcion;
        include '../src/Views/materiaForm.php';
    }
}

?>