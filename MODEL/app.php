<?php
class App 
{

	static $bdd = NULL;

	static function getDatabase() 
	{
		if (!self::$bdd) 
		{
			self::$bdd = new Database('avignonkevin_com_monsite', 'kvinav', 'avignonkevin_com_monsite'); 
		}

		return self::$bdd;

	}
}