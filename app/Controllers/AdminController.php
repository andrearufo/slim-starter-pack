<?php

namespace Controllers;

final class AdminController
{

	public function __construct($container)
    {
        
        $this->view = $container->view;
    
    }

	public function dashboard ($request, $response, $args)
	{

		return $this->view->render($response, 'dashboard.php');

	}

	public function logout(Request $request, Response $response)
	{

		$session = $session = \Models\Session::where('uniqid', '=', $_SESSION['uniqid'])->first();

		$session->delete();

		unset($_SESSION['uniqid']);

		$this->container->flash->addMessage('success', 'You are logged out');
		
		return $response->withStatus(302)->withHeader('Location', '/');

	}

}