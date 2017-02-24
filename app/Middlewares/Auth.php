<?php

namespace App\Middlewares;

use App\Models\Session;
use App\Models\User;

class Auth
{

	public function __construct($container){
		
		$this->container = $container;
		
	}

	public function __invoke($request, $response, $next)
	{ 

		if( !isset($_SESSION['uniqid']) ){

			$this->container->flash->addMessage('warning', 'Not logged in.');
			return $response->withStatus(302)->withHeader('Location', '/login');

		}

		// search the current session uniqid in the session table
		$session = Session::where('uniqid', '=', $_SESSION['uniqid'])->first();

		if( !$session ){

			$this->container->flash->addMessage('warning', 'Session not found.');
			return $response->withStatus(302)->withHeader('Location', '/login');

		}

		// search the current users exist for the current session uniqid
		$user = User::where('id', '=', $session->user_id)->where('active', 1)->first();

		if( !$user ){

			$this->container->flash->addMessage('danger', 'User not logged in.');
			return $response->withStatus(302)->withHeader('Location', '/login');

		}

		$response = $next($request, $response);
		
		// no post actions

		return $response;
		
	}

}