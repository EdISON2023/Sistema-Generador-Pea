<?php

namespace PeaYavirac;
use MongoDB\Client;

class MongoDBConnection
{
    private $client;
    private $database;

    public function __construct()
    {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $database = $_ENV['DB_DATABASE'];


        $uri = "mongodb://$host:$port/$database";

        $this->client = new Client($uri);
        $this->database = $this->client->selectDatabase($database);
    }

    public function getDatabase()
    {
        return $this->database;
    }
}

?>