<?php

// Middlewares
$app->add($container->get('csrf'));

$app->add(new App\Middlewares\Sender($container));