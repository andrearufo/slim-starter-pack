<?php

// static public pages
$app->get('/', 'App\Controllers\HomeController:index')->setName('index');
$app->get('/login', 'App\Controllers\HomeController:login')->setName('login');

// login form action
$app->post('/access', 'App\Controllers\AdminController:access')->setName('access');

// reserved area
$app->group('/admin', function () {

	$this->get('/dashboard', 'App\Controllers\AdminController:dashboard')->setName('dashboard');
	$this->get('/logout', 'App\Controllers\AdminController:logout')->setName('logout');

	$this->get('/users', 'App\Controllers\UserController:index')->setName('users');
	$this->get('/users/add', 'App\Controllers\UserController:add')->setName('usersadd');
	$this->post('/users/save', 'App\Controllers\UserController:save')->setName('userssave');
	$this->get('/users/edit/{id}', 'App\Controllers\UserController:edit')->setName('usersedit');
	$this->post('/users/update/{id}', 'App\Controllers\UserController:update')->setName('usersupdate');
	$this->get('/users/delete/{id}', 'App\Controllers\UserController:delete')->setName('usersdelete');
   
})->add(new App\Middlewares\Auth($container));