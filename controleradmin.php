<?php
session_start();
ini_set('display_errors', 'on');
error_reporting(E_ALL);

require 'autoloader.php';
Autoloader::register();


$bdd = new PDO('mysql:host=localhost;dbname=projet2;charset=utf8', 'root', '');


$admin = new Admin();


$manageradmin = new ManagerAdmin($bdd);

$firstadmin = $manageradmin->getUnique();



if (isset($_POST['user']) && isset($_POST['password']) && $_POST['user'] == $firstadmin->getUser()  && $_POST['password'] == $firstadmin->getPassword())
{
	$_SESSION['user'] = $_POST['user'];
	$_SESSION['password'] = $_POST['password'];
	include_once('administration.php');
}
elseif (isset($_POST['user']) && isset($_POST['password']) && $_POST['user'] !== $firstadmin->getUser() || $_POST['password'] !== $firstadmin->getPassword()) 
{
	include_once('connectionerror.php');
}
else
{
	include_once('connection.php');
}