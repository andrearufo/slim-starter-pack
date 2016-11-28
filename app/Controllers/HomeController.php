<?php

namespace Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

final class HomeController
{

	public function __construct($container)
	{
		
		$this->container = $container;
	
	}

	public function index (Request $request, Response $response, $args)
	{	

		$messages = $this->container->flash->getMessages();
		
		$data = [
			'messages' => $messages
		];

		return $this->container->view->render($response, 'index.php', $data);

	}

	public function login (Request $request, Response $response, $args)
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

		return $this->container->view->render($response, 'login.php', $data);

	}

}