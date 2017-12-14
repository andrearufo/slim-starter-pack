<?php

return [
 	'settings' => [

		'determineRouteBeforeAppMiddleware' => false,
		'displayErrorDetails' => true,

		'mailer' =>[
			// sender Api from mailjet.com
			'sender_email' 			=> '',
			'sender_password' 		=> '',
			'sender_host'			=> 'ssl://in-v3.mailjet.com',
			// sender info
			'sender_display_name' 	=> 'Slim Starter Pack',
			'sender_display_email' 	=> 'admin@slimstarterpack.ltd',
			'sender_reply_to_name' 	=> 'Slim Starter Pack',
			'sender_reply_to_email' => 'admin@slimstarterpack.ltd',
			// debug info
			'debug'					=> 0, // [0,1,2]

		],

        'db' => [
        	'driver'    => 'mysql',
        	'host'      => 'localhost',
        	'database'  => 'slimstarterpack',
        	'username'  => 'homestead',
        	'password'  => 'secret',
        	'charset'   => 'utf8',
        	'collation' => 'utf8_unicode_ci',
        	'prefix'    => '',
        ]

	]
];
