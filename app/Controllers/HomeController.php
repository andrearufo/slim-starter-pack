<?php

namespace Controllers;

final class HomeController
{

	public function __construct($container)
    {
        
        $this->container = $container;
    
    }

	public function index ($request, $response, $args)
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

		return $this->container->view->render($response, 'index.php', $data);

	}

	public function login ($request, $response, $args)
	{	

		// get the parameters
		$username = $request->getParam('username');
		$password = $request->getParam('password');

		// search the user
		$user = \Models\User::where('email', '=', $username)->first(); 

		// if user not exist and password isn't correct redirect to index...
		if( !$user || !$user->checkPassword($password) ){
		
			$this->container->flash->addMessage('warning', 'Incorrect username or password');
			return $response->withStatus(302)->withHeader('Location', '/');
		
		}

		// ...else create a session of loggin
		$user_id = $user->id;
		$uniqid = uniqid();

		$_SESSION['uniqid'] = $uniqid;

		$session = new \Models\Session;

		$session->user_id = $user_id;
		$session->uniqid = $uniqid;

		// register the session
		$session->save();	

		// then redirect to admin dashboard
		return $response->withStatus(302)->withHeader('Location', 'admin/dashboard');

	}

}