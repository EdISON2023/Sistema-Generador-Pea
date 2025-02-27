<?php

namespace PeaYavirac\Services;

use PeaYavirac\Models\UsuariosModel;

class ConfiguracionService
{
    private $modelUser;
    
    public function __construct()
    {
        $this->modelUser = new UsuariosModel();
    }


    public function configuracion()
    {
        $filtros=[];
        if(isset($_SESSION['user']) && $_SESSION['user']['role']==2){
            $filtros=[
                'role' => 1,
            ];
        };

        $data = [
            "header" => 'Configuraciones',
            'datosUser' => []
        ];
        $data['datosUser']=$this->modelUser->findAll($filtros);
        

        include '../src/Views/configuracion.php';
        return $data;
    }

    public function UsersAdd($datosAdd)
    {
        $data = [
            "header" => 'Configuraciones',
            'datosUser' => []
        ];
        $data['datosUser']=$this->modelUser->insertOne($datosAdd);
        

        include '../src/Views/configuracion.php';
        return $data;
    }

    public function editUser($id,$datosAdd)
    {
        $data = [
            "header" => 'Configuraciones',
            'datosUser' => []
        ];
        $data['datosUser']=$this->modelUser->edit($id,$datosAdd);
        
        return $data;
    }

   
}

?>