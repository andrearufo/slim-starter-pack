<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\User;
use App\Models\Session;

class AdminController extends Controller
{

	public function dashboard (Request $request, Response $response, $args)
	{
		return $this->container->view->render($response, 'admin/dashboard.html.twig');
	}

	public function access (Request $request, Response $response, $args)
	{
		// get the parameters
		$username = $request->getParam('username');
		$password = $request->getParam('password');

		// search the user
		$user = User::where('email', '=', $username)->where('active', 1)->first();

		// if user not exist and password isn't correct redirect to index...
		if( !$user || !$user->checkPassword($password) ){
			$this->container->flash->addMessage('warning', 'Incorrect username or password');
			return $response->withStatus(302)->withHeader('Location', $this->container->get('router')->pathFor('login'));
		}

		// ...else create a session of loggin
		$user_id = $user->id;
		$uniqid = uniqid();

		$_SESSION['uniqid'] = $uniqid;

		$session = new Session;

		$session->user_id = $user_id;
		$session->uniqid = $uniqid;

		// register the session
		$session->save();

		// then redirect to admin dashboard
		return $response->withStatus(302)->withHeader('Location', $this->container->get('router')->pathFor('dashboard'));

	}

	public function logout (Request $request, Response $response, $args)
	{

		$session = $session = Session::where('uniqid', '=', $_SESSION['uniqid'])->first();

		$session->delete();
		unset($_SESSION['uniqid']);

		$this->container->flash->addMessage('success', 'You are logged out');
		return $response->withStatus(302)->withHeader('Location', $this->container->get('router')->pathFor('index'));
	}

}
