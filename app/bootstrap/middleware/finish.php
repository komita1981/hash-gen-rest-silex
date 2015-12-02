<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Last actions before sending response should be called here
// Usually used for logging
$app->finish(function (Request $request, Response $response) use ($app) {
});