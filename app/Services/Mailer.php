<?php

namespace App\Services;

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;

class Mailer {

	private $mail;
	protected $sender_email 			= "";
	protected $sender_password 			= "";
	protected $sender_host 				= "";

	protected $sender_display_name 		= "";
	protected $sender_display_email 	= "";
	protected $sender_reply_to_name 	= "";
	protected $sender_reply_to_email 	= "";

	protected $settings;

	public function __construct($container)
	{

		date_default_timezone_set('Europe/Rome');

		//The setting from config file (see /config/settings.php)
		$this->settings = $container['settings']['mailer'];

		//Create a new PHPMailer instance
		$this->mail = new PHPMailer;

		//Tell PHPMailer to use SMTP
		$this->mail->isSMTP();

		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$this->mail->SMTPDebug = $this->settings['debug'];

		//Ask for HTML-friendly debug output
		$this->mail->Debugoutput = 'html';

		//Set the hostname of the mail server
		$this->mail->Host = $this->settings['sender_host'];

		// use
		// $this->mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$this->mail->Port = 465;

		//Set the encryption system to use - ssl (deprecated) or tls
		// $this->mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$this->mail->SMTPAuth = true;

		//Set the HTML case for the mail
		$this->mail->isHTML(true);

		$this->setSender(
			$this->settings['sender_email'],
			$this->settings['sender_password'],
			$this->settings['sender_display_name'],
			$this->settings['sender_display_email'],
			$this->settings['sender_reply_to_name'],
			$this->settings['sender_reply_to_email']
		);

	}

	public function setSender($email, $password, $display_name, $display_email, $reply_name, $reply_email)
	{

		//Username to use for SMTP authentication - use full email address for gmail
		$this->mail->Username = $email;

		//Password to use for SMTP authentication
		$this->mail->Password = $password;

		//Set who the message is to be sent from
		$this->mail->setFrom($display_email, $display_name);

		//Set an alternative reply-to address
		$this->mail->addReplyTo($reply_email, $reply_name);

	}

	public function sendEmail($to_email, $to_name, $subject, $message, $template_name = null)
	{

		//Set who the message is to be sent to
		$this->mail->addAddress($to_email, $to_name);

		//Set the subject line
		$this->mail->Subject = $subject;

		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		if( !is_null($template_name) )
			$this->mail->msgHTML(file_get_contents($template_name));

		//Replace the plain text body with one created manually
		$this->mail->Body = $message;

		//send the message, check for errors
		try {
			$this->mail->send();
			return true;
		} catch (Exception $e) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}

	}

}
