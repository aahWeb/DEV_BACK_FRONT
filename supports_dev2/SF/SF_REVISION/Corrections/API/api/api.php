<?php

require_once __DIR__ . '/../bootstrap.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$action = $request->query->get('action');

$response = new Response();

if ($action == 'all') {

    $response->setContent(json_encode([
        'data' => '',
    ]));
}

if ($action == 'getRestaurants') {
    $pipeline = [
        [
            '$unwind' => '$grades',
        ],
        [
            '$group' => [
                '_id' => null,
                'average_score' => ['$avg' => '$grades.score'],
            ],
            
        ],

    ];

    $response->setContent(json_encode([
        'data' => $collection->aggregate($pipeline)->toArray()
    ]));
}

$response->headers->set('Content-Type', 'application/json');

$response->send();
