<?php

namespace App\Middlewares;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Session;
use App\Models\User;

class Auth extends Middleware
{

	public function __invoke(Request $request, Response $response, callable $next)
	{
		$login = $this->container->get('router')->pathFor('login');

		if( !isset($_SESSION['uniqid']) ){
			$this->container->flash->addMessage('warning', 'Not logged in.');
			return $response->withStatus(302)->withHeader('Location', $login);
		}

		// search the current session uniqid in the session table
		$session = Session::where('uniqid', '=', $_SESSION['uniqid'])->first();

		if( !$session ){
			$this->container->flash->addMessage('warning', 'Session not found.');
			return $response->withStatus(302)->withHeader('Location', $login);
		}

		// search the current users exist for the current session uniqid
		$user = User::where('id', '=', $session->user_id)->where('active', 1)->first();

		if( !$user ){
			$this->container->flash->addMessage('danger', 'User not logged in.');
			return $response->withStatus(302)->withHeader('Location', $login);
		}

		return $next($request, $response);
	}

}
