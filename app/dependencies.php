<?php

// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('templates');
};

// Service for the tokens
$container['csrf'] = function ($container) {
    return new \Slim\Csrf\Guard;
};

// Flash Messages
$container['flash'] = function ($container) {
    return new \Slim\Flash\Messages();
};