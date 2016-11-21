<?php

$app->get('/', '\Controllers\HomeController:index')->setName('index');
$app->post('/login', '\Controllers\HomeController:login')->setName('login');

$app->group('/admin', function () {

    $this->get('/dashboard', '\Controllers\AdminController:dashboard')->setName('dashboard');
	$this->get('/logout', '\Controllers\UserController:logout')->setName('logout');

    $this->get('/users', '\Controllers\UserController:index')->setName('users');
    $this->get('/users/edit/{id}', '\Controllers\UserController:edit')->setName('usersedit');
   

})->add(new Middlewares\Auth($container));