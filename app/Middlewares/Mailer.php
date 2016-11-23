<?php

namespace Middlewares;

class Mailer
{

	public function __construct($container){
		
		$this->container = $container;
		
	}

	public function __invoke($request, $response, $next)
	{ 

		$emails = \Models\Email::where('send_at', '=', '0000-00-00 00:00:00')->take(5)->get();
		$sender = new \Services\Mailer($this->container);

		foreach( $emails as $mail ){

			// sender
		    $send = $sender->sendEmail( 
		    			$mail->to, 
		    			$mail->to_name, 
		    			$mail->subject, 
		    			$mail->message 
		    		);

		    // invio l'email
		    if( $send ){
		        $mail->send_at = now();
		        $mail->save();
		    }
		
		}

		$response = $next($request, $response);
		
		// no post actions

		return $response;
		
	}

}