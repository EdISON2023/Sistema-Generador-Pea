<?php

namespace PeaYavirac\Controllers;

use PeaYavirac\Services\MallaCurricularService;

class MallaCurricularController
{
    private $MallaCurricularService;

    public function __construct()
    {
        $this->MallaCurricularService = new MallaCurricularService();
    }


    public function Software()
    {




        $this->MallaCurricularService->Software();
        
    }

    public function Culinaria()
    {
        $this->MallaCurricularService->Culinaria();
    }

    public function Modas()
    {
        $this->MallaCurricularService->Modas();
    }

    public function Turismo()
    {
        $this->MallaCurricularService->Turismo();
    }

    public function Marketing()
    {
        $this->MallaCurricularService->Marketing();
    }
}
