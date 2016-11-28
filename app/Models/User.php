<?php

namespace Models;

class User extends \Illuminate\Database\Eloquent\Model {
	
	public function __construct() {

	}

	public function encryptPassword($password){
		
		return password_hash($password, PASSWORD_DEFAULT);
	
	}

	public function checkPassword($password){

		return password_verify($password, $this->password);

	}

	public function setPassword($password){

		$this->password = $this->encryptPassword($password);
		return $this;

	}
	
}