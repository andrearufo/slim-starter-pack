<?php

namespace Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class UserController
{

	public function __construct($container)
	{
		
		$this->container = $container;
	
	}

	public function index (Request $request, Response $response)
	{

		$data['users'] = \Models\User::all();
		$data['messages'] = $this->container->flash->getMessages();

		return $this->container->view->render($response, 'users.php', $data);

	}

	public function edit (Request $request, Response $response)
	{

		$id = (int) $request->getAttribute('id');

		$user = \Models\User::find($id);

		if( !$user ){
		
			$this->container->flash->addMessage('warning', 'User not found');
			return $response->withStatus(302)->withHeader('Location', '/admin/users');
		
		}

		$data['user'] = $user;
		$data['messages'] = $this->container->flash->getMessages();
		
		return $this->container->view->render($response, 'users-edit.php', $data);

	}

}