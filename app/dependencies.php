<?php

// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(PATH_ROOT . 'templates', [
		'debug' => true
		// TODO: use cache
		// 'cache' => __DIR__ . '/cache'
	]);

	// Instantiate and add Slim specific extension
	$basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
	$view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
	$view->addExtension(new Twig_Extension_Debug());

	return $view;
};

// Service for the tokens
$container['csrf'] = function ($container) {
	return new \Slim\Csrf\Guard;
};

// Flash Messages
$container['flash'] = function ($container) {
	return new \Slim\Flash\Messages();
};
