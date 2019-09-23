<?php


namespace utils;

use dto\Result;
use \Psr\Http\Message\ResponseInterface as Response;

class JsonUtils
{

    public static function buildJsonResponse(Response $response, $object, $status = 200): Response
    {
        $payload = json_encode($object);

        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($status);
    }
}