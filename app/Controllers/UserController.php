<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\User;

final class UserController
{

	public function __construct($container)
	{
		$this->container = $container;
	}

	public function index (Request $request, Response $response, $args)
	{
		$data['users'] = User::all();
		$data['messages'] = $this->container->flash->getMessages();

		return $this->container->view->render($response, 'admin/users/index.html.twig', $data);
	}

	public function add (Request $request, Response $response, $args)
	{

		$data['user'] = null;

		$data['csrf']['nameKey'] 	= $this->container->csrf->getTokenNameKey();
		$data['csrf']['valueKey'] 	= $this->container->csrf->getTokenValueKey();
		$data['csrf']['name'] 		= $request->getAttribute($data['csrf']['nameKey']);
		$data['csrf']['value'] 		= $request->getAttribute($data['csrf']['valueKey']);

		$data['messages'] = $this->container->flash->getMessages();
		$data['action'] = '/admin/users/save';
		$data['title'] = 'Add utente';

		return $this->container->view->render($response, 'admin/users/edit.html.twig', $data);
	}

	public function save (Request $request, Response $response, $args)
	{
		$user = new User();

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
		$data['user'] = User::find($id);

		$data['csrf']['nameKey'] 	= $this->container->csrf->getTokenNameKey();
		$data['csrf']['valueKey'] 	= $this->container->csrf->getTokenValueKey();
		$data['csrf']['name'] 		= $request->getAttribute($data['csrf']['nameKey']);
		$data['csrf']['value'] 		= $request->getAttribute($data['csrf']['valueKey']);

		$data['messages'] = $this->container->flash->getMessages();
		$data['action'] = '/admin/users/update/'.$id;
		$data['title'] = 'Edit utente';

		return $this->container->view->render($response, 'admin/users/edit.html.twig', $data);
	}

	public function update (Request $request, Response $response, $args)
	{
		$id = $request->getAttribute('id');

		$user = User::find($id);

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

		$user = User::find($id);

		$user->delete();

		$this->container->flash->addMessage('warning', 'User deleted');
		return $response->withStatus(302)->withHeader('Location', '/admin/users');
	}

}
