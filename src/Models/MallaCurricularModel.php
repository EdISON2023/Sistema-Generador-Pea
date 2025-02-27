<?php
namespace PeaYavirac\Models;

use PeaYavirac\MongoDBConnection;
use MongoDB\BSON\ObjectId;

class MallaCurricularModel
{
    protected $model;
    protected $connection;
    public function __construct(){
        $this->model = new MongoDBConnection();
        $this->connection = $this->model->getDatabase()->selectCollection('malla_curricular');
    }
    public function find($carrera){
        $filters=['delete_at' => true,'carrera' => $carrera];
        $options=['sort' => ['periodo' => -1]];
        return $this->connection->find($filters,$options);
    }

    public function insertOne($data){
        $result = $this->connection->insertOne($data);
        return $result;
    }

    public function UpdateOne($id, $data){
        $objectId = new ObjectId($id); 
        $filters = ["_id" => $objectId];
        $update = ['$set' => $data];
        $result = $this->connection->updateOne($filters, $update);
        return $result;
    }
}

?>