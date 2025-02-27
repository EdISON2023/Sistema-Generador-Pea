<?php

namespace PeaYavirac\Models;

use MongoDB\BSON\ObjectId;
use PeaYavirac\MongoDBConnection;

class UsuariosModel
{
    protected $model;
    protected $connection;
    public function __construct()
    {
        $this->model = new MongoDBConnection();
        $this->connection = $this->model->getDatabase()->selectCollection('usuarios');
    }
    public function findOne($id)
    {
        $objectId = new ObjectId($id);
        $filters = ["_id" => $objectId];
        $consulta = $this->connection->findOne($filters);
        return $consulta;
    }

    public function login($usuario, $contraseña)
    {
        $filters = [
            'cedula' => $usuario,
        ];
        $consulta = $this->connection->findOne($filters);
        if ($consulta) {
            $contraseñaAlmacenada = $consulta['contraseña'] ?? '';
            if ($contraseña === $contraseñaAlmacenada) {
                $data = [
                    'estado' => 'ok',
                    'nombres' => $consulta['nombres'] ?? 'Nombre no disponible',
                    '_id' => (string) $consulta['_id'],
                    'role' => $consulta['role'] ?? 'Role no disponible',
                    'image_url' => $consulta['image_url'] ?? 'Imagen no disponible'
                ];
                return $data;
            }
        }

        return ['estado' => 'error',];
    }

    public function findAllDocentes()
    {
        $filters = [
            'role' => 1,
        ];

        $projeccion = [
            '_id' => 1,
            'nombres' => 1,
            'cedula' => 1,
        ];

        $result = $this->connection->find($filters, ['projection' => $projeccion]);

        return iterator_to_array($result);
    }

    public function findAll($filtros)
    {
        $filters = $filtros;

        $projeccion = [
            '_id' => 1,
            'nombres' => 1,
            'cedula' => 1,
            'correo_institucional' => 1,
            'image_url' => 1,
            'role' => 1
        ];

        $result = $this->connection->find($filters, ['projection' => $projeccion]);

        return iterator_to_array($result);
    }

    public function insertOne($data)
    {
        $result = $this->connection->insertOne($data);
        return $result;
    }

    public function edit($id, $data)
    {
        $objectId = new ObjectId($id);
        $filters = ["_id" => $objectId];
        $updateData = [
            '$set' => $data, 
        ];
        $result = $this->connection->updateOne($filters, $updateData);
        return $result;
    }
}
