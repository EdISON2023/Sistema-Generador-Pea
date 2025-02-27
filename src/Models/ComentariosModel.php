<?php
namespace PeaYavirac\Models;

use PeaYavirac\MongoDBConnection;

class ComentariosModel
{
    protected $model;
    protected $connection;
    public function __construct(){
        $this->model = new MongoDBConnection();
        $this->connection = $this->model->getDatabase()->selectCollection('comentarios');
    }
    public function getAll(){

    }
}

?>