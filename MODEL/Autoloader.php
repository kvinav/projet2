<?php

class Autoloader
{


	static function autoload($class_name)
	{
		require '../MODEL/' . strtolower($class_name) . '.php';

	}

	static function register()
	{
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}

}