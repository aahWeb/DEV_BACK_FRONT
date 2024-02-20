<?php

require_once __DIR__ . '/vendor/autoload.php';

use Exception;
use MongoDB\Client;

$uri = 'mongodb://localhost:27017';
$db = "yams";
$collection = "pastries";

// Create a new client and connect to the server
$client = new Client($uri, [], []);

try {

    $database = $client->$db;
    $collection = $database->$collection;
    $documents = $collection->find();
    foreach ($documents as $pastry) {
        echo json_encode($pastry, JSON_PRETTY_PRINT) . "\n";
    }
} catch (Exception $e) {
    printf($e->getMessage());
}
