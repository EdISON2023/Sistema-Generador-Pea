<?php
namespace PeaYavirac\Controllers;

use PeaYavirac\Services\ConfiguracionService;

class ConfiguracionContoller
{
    private $MallaCurricularService;
    
    public function __construct()
    {
        $this->MallaCurricularService = new ConfiguracionService();
    }


    public function configuracionPage()
    {
        
        $this->MallaCurricularService->configuracion();
        
    }

   
}

?>