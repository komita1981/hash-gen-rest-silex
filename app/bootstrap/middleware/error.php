<?php

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

$app->error(function (Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    if ($e instanceof UnexpectedValueException) {
        $response = new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
    } else {
        $response = new JsonResponse('Internal server error', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    return $response;
});
