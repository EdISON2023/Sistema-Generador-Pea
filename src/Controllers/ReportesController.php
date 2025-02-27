<?php
namespace PeaYavirac\Controllers;

use PeaYavirac\Services\ReportespdfService;

class ReportesController
{
    public $materia;
    private $ServiceReportes;
    public function __construct()
    {
        $this->ServiceReportes=new ReportespdfService();
    }

    public function MayaCurricularReporte()
    {
        $data=$this->ServiceReportes->mayaCurricular()['data'];
        $materias=$this->ServiceReportes->mayaCurricular()['materias'];
        $maxSemestre=$this->ServiceReportes->mayaCurricular()['maxSemestre'];
        $semestres=$this->ServiceReportes->mayaCurricular()['semestres'];
        include '../src/Views/reportes/mallaCurricularReporte.php';

    }

    public function PeaReporte($idPea)
    {
        $datos=$this->ServiceReportes->PeaReportService($idPea);
        include '../src/Views/reportes/PeaReporte.php';
    }
}

?>