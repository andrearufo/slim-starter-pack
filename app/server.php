<?php

// use Illuminate\Database\Query\Builder;
// use Psr\Http\Message\ServerRequestInterface as Request;
// use Psr\Http\Message\ResponseInterface as Response;

require PATH_ROOT . 'vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require PATH_ROOT . 'config/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require PATH_ROOT . 'app/dependencies.php';

// Register middleware
require PATH_ROOT . 'app/middlewares.php';

// Register routes
require PATH_ROOT . 'app/routes.php';

// Run the app
$app->run();
