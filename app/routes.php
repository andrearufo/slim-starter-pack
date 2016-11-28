<?php

// static public pages
$app->get('/', '\Controllers\HomeController:index')->setName('index');
$app->get('/login', '\Controllers\HomeController:login')->setName('login');

// login form action
$app->post('/access', '\Controllers\AdminController:access')->setName('access');

// reserved area
$app->group('/admin', function () {

	$this->get('/dashboard', '\Controllers\AdminController:dashboard')->setName('dashboard');
	$this->get('/logout', '\Controllers\AdminController:logout')->setName('logout');

	$this->get('/users', '\Controllers\UserController:index')->setName('users');
	$this->get('/users/add', '\Controllers\UserController:add')->setName('usersadd');
	$this->post('/users/save', '\Controllers\UserController:save')->setName('userssave');
	$this->get('/users/edit/{id}', '\Controllers\UserController:edit')->setName('usersedit');
	$this->post('/users/update/{id}', '\Controllers\UserController:update')->setName('usersupdate');
	$this->get('/users/delete/{id}', '\Controllers\UserController:delete')->setName('usersdelete');
   
})->add(new Middlewares\Auth($container));