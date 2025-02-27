<?php
namespace PeaYavirac\Models;

use PeaYavirac\MongoDBConnection;

class UsuariosAdministrativosModel
{
    protected $model;
    protected $connection;
    public function __construct(){
        $this->model = new MongoDBConnection();
        $this->connection = $this->model->getDatabase()->selectCollection('usuarios_administrativos');
    }
    public function getAll(){

    }
}

?>