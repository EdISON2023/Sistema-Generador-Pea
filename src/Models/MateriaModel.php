<?php
namespace PeaYavirac\Models;

use PeaYavirac\MongoDBConnection;
use MongoDB\BSON\ObjectId;
class MateriaModel
{
    protected $model;
    protected $connection;
    public function __construct(){
        $this->model = new MongoDBConnection();
        $this->connection = $this->model->getDatabase()->selectCollection('materia');
    }
    
    public function findOne($id){
        $objectId = new ObjectId($id); 
        $filters=["_id" => $objectId];
        $consulta= $this->connection->findOne($filters);
        return $consulta;
    }

    public function UpdateOne($id, $data){
        $objectId = new ObjectId($id); 
        $filters = ["_id" => $objectId];
        $update = ['$set' => $data];
        $result = $this->connection->updateOne($filters, $update);
        return $result;
    }

    public function insertOne($data){
        $result = $this->connection->insertOne($data);
        return $result->getInsertedId();
    }
    public function insertMany($dataArray) {
        $result = $this->connection->insertMany($dataArray);
        return $result->getInsertedIds();
    }

     // Eliminar un solo documento
     public function deleteOne($id){
        $objectId = new ObjectId($id);
        $filters = ["_id" => $objectId];
        $result = $this->connection->deleteOne($filters);
        return $result;
    }

    // Eliminar múltiples documentos
    public function deleteMany($filters){
        $result = $this->connection->deleteMany($filters);
        return $result;
    }
}

?>