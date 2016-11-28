<?php

namespace Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

final class UserController
{

	public function __construct($container)
	{
		
		$this->container = $container;
	
	}

	public function index (Request $request, Response $response, $args)
	{

		$data['users'] = \Models\User::all();
		$data['messages'] = $this->container->flash->getMessages();

		return $this->container->view->render($response, 'users.php', $data);

	}

	public function add (Request $request, Response $response, $args)
	{

		$csrf['nameKey'] 	= $this->container->csrf->getTokenNameKey();
		$csrf['valueKey'] 	= $this->container->csrf->getTokenValueKey();
		$csrf['name'] 		= $request->getAttribute($csrf['nameKey']);
		$csrf['value'] 		= $request->getAttribute($csrf['valueKey']);

		$messages = $this->container->flash->getMessages();

		$data = [
			'csrf' => $csrf,
			'messages' => $messages
		];

		return $this->container->view->render($response, 'users-edit.php', $data);

	}

	public function save (Request $request, Response $response, $args)
	{

		$user = new \Models\User();

		$user->email 	= $request->getParam('email');
		$user->name 	= $request->getParam('name');
		$user->active 	= $request->getParam('active');

		$user->setPassword($request->getParam('password'));

		$user->save();

		$this->container->flash->addMessage('success', 'User saved');
		return $response->withStatus(302)->withHeader('Location', '/admin/users/edit/'.$user->id);

	}

	public function edit (Request $request, Response $response, $args)
	{

		$id = $request->getAttribute('id');
		$user = \Models\User::find($id);

		$csrf['nameKey'] 	= $this->container->csrf->getTokenNameKey();
		$csrf['valueKey'] 	= $this->container->csrf->getTokenValueKey();
		$csrf['name'] 		= $request->getAttribute($csrf['nameKey']);
		$csrf['value'] 		= $request->getAttribute($csrf['valueKey']);

		$messages = $this->container->flash->getMessages();

		$data = [
			'user' => $user,
			'csrf' => $csrf,
			'messages' => $messages
		];

		return $this->container->view->render($response, 'users-edit.php', $data);

	}

	public function update (Request $request, Response $response, $args)
	{

		$id = $request->getAttribute('id');

		$user = \Models\User::find($id);

		$user->email 	= $request->getParam('email');
		$user->name 	= $request->getParam('name');
		$user->active 	= $request->getParam('active');

		if($request->getParam('password'))
			$user->setPassword( $request->getParam('password') );

		$user->save();

		$this->container->flash->addMessage('success', 'User updated');
		return $response->withStatus(302)->withHeader('Location', '/admin/users/edit/'.$user->id);

	}

	public function delete (Request $request, Response $response, $args)
	{

		$id = $request->getAttribute('id');

		$user = \Models\User::find($id);

		$user->delete();

		$this->container->flash->addMessage('warning', 'User deleted');
		return $response->withStatus(302)->withHeader('Location', '/admin/users');

	}

}