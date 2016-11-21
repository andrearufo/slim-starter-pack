<?php

namespace Models;

class User extends \Illuminate\Database\Eloquent\Model {
	
	public function __construct() {

	}

	public function encryptPassword($password){
		
		return password_hash($password, PASSWORD_DEFAULT);
	
	}

	function checkPassword($password){

		return password_verify($password, $this->password);

	}



}