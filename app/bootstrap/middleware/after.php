<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Add procedures that run after request handling
// These settings handles cors requests
$app->after(function (Request $request, Response $response) use ($app) {
    $response->headers->set('Access-Control-Allow-Origin', '*');
    $response->headers->set('Content-Type', 'application/json');
    $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, HashToken');
    $response->headers->set('Access-Control-Allow-Methods', "GET, POST, OPTIONS, PUT, DELETE");
});