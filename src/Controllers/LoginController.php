<?php

namespace PeaYavirac\Controllers;

use PeaYavirac\Services\LoginService;

class LoginController
{
    public $service;
    public function __construct(){
        $this->service = new LoginService();
    }
    public function login()
    {
        $this->service->login();
        include '../src/Views/login.php';
    }
    public function PerfilConfig()
    {
        $data = ['header' => 'Configuracion del perfil'];
        $datosUser=$this->service->configuracionPage($_SESSION['user']['_id']);
        include '../src/Views/configuracionPerfil.php';
    }
}

?>
