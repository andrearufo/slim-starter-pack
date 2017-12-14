<?php

namespace App\Middlewares;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Email;
use App\Services\Mailer;

class Sender extends Middleware
{

	const emailnum = 5;

	public function __invoke(Request $request, Response $response, callable $next)
	{
		$emails = Email::where('send_at', '=', '0000-00-00 00:00:00')->take(self::emailnum)->get();
		$sender = new Mailer($this->container);

		foreach( $emails as $mail ){
			// sender
			$send = $sender->sendEmail(
				$mail->to,
				$mail->to_name,
				$mail->subject,
				$mail->message
			);

			// send email
			if( $send ){
				$mail->send_at = now();
				$mail->save();
			}
		}

		return $next($request, $response);
	}

}
