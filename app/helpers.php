<?php

function slugify($text)
{
	// replace non letter or digits by -
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);

	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	// trim
	$text = trim($text, '-');

	// remove duplicate -
	$text = preg_replace('~-+~', '-', $text);

	// lowercase
	$text = strtolower($text);

	if (empty($text)) {
	return 'n-a';
	}

	return $text;
}

function is_logged(){

	if( !isset($_SESSION['uniqid']) ) return false;

	// search the current session uniqid in the session table
	$session = \Models\Session::where('uniqid', '=', $_SESSION['uniqid'])->first();
	if( !$session )	return false;

	// search the current users exist for the current session uniqid
	$user = \Models\User::where('id', '=', $session->user_id)->first();
	if( !$user ) return false;

	return true;
	
}