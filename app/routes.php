<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\App;

require_once '../src/controller/MailController.php';

return function (App $app) {

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello World');
        return $response;
    });

    $app->post('/sendEmail', '\controller\MailController:sendEmail');

};
