<?php
class Admin
{
	
	private $user;
	private $password;

	public function __construct($value = [])
	{
		if (!empty($value))
		{
			$this->hydrate($value);
		}
	}

	public function hydrate (array $donnees)
	{
		foreach ($donnees as $key => $value) 
		{
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}

	public function setUser($user)
	{
		if (is_string($user))
		{
			$this->user = $user;
		}
	}

	public function getUser()
	{
		return $this->user;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getPassword()
	{
		return $this->password;
	}



}