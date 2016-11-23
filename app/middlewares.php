<?php

// Middlewares
$app->add($container->get('csrf'));

$app->add(new Middlewares\Mailer($container));