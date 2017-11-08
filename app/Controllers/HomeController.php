<?php

namespace App\Controllers;

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
		$data['messages'] = $this->container->flash->getMessages();
		return $this->container->view->render($response, 'public/index.html.twig', $data);
	}

	public function login (Request $request, Response $response, $args)
	{
		$data['csrf']['nameKey'] 	= $this->container->csrf->getTokenNameKey();
		$data['csrf']['valueKey'] 	= $this->container->csrf->getTokenValueKey();
		$data['csrf']['name'] 		= $request->getAttribute($data['csrf']['nameKey']);
		$data['csrf']['value'] 		= $request->getAttribute($data['csrf']['valueKey']);

		$data['messages'] = $this->container->flash->getMessages();

		return $this->container->view->render($response, 'public/login.html.twig', $data);
	}

}
