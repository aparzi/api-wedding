<?php

use DI\Container;
use middleware\JsonBodyParserMiddleware;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'])['path'];
$scriptName = dirname(dirname($_SERVER['SCRIPT_NAME']));
$len = strlen($scriptName);
if ($len > 0 && $scriptName !== '/') {
    $path = substr($path, $len);
}
$_SERVER['REQUEST_URI'] = $path ?: '';

// Register Container
$container = new Container();
$serviceContainer = require '../app/serviceContainer.php';
$serviceContainer($container);
AppFactory::setContainer($container);

// Register App Slim
$app = AppFactory::create();

// Register middleware and errorMiddleware
$app->add(JsonBodyParserMiddleware::class);
$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

// Register routes
$routes = require '../app/routes.php';
$routes($app);

// Register CORS
$cors = require '../app/settingCors.php';
$cors($app);

$app->run();
