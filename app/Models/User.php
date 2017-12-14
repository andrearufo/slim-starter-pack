<?php

namespace App\Models;

class User extends Model {

	public function encryptPassword($password)
	{
		return password_hash($password, PASSWORD_DEFAULT);
	}

	public function checkPassword($password)
	{
		return password_verify($password, $this->password);
	}

	public function setPassword($password)
	{
		$this->password = $this->encryptPassword($password);
		return $this;
	}

}
