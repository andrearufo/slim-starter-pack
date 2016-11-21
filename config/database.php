<?php

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection([
	'driver'    => 'mysql',
	'host'      => 'localhost',
	'database'  => 'ssp',
	'username'  => 'root',
	'password'  => 'root',
	'charset'   => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();