<?php

namespace Blog\Model;

use Blog\Model\Database;

class App 
{

	static $bdd = NULL;

	static function getDatabase() 
	{
		if (!self::$bdd) 
		{
			self::$bdd = new Database('root', 'root', 'projet2'); 
		}

		return self::$bdd;

	}
}