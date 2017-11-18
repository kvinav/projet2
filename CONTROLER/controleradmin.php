<?php
require '../APP/bootstrap.php';

$admin = new Admin();


$manageradmin = new ManagerAdmin($bdd);

$firstadmin = $manageradmin->getUnique();


if (isset($_POST['user']) && isset($_POST['password']) && $_POST['user'] == $firstadmin->getUser()  && $_POST['password'] == $firstadmin->getPassword())
{
	$_SESSION['user'] = $_POST['user'];
	$_SESSION['password'] = $_POST['password'];
	require_once('../VIEW/administration.php');
}
elseif (isset($_POST['user']) && isset($_POST['password']) && $_POST['user'] !== $firstadmin->getUser() || $_POST['password'] !== $firstadmin->getPassword()) 
{
	require_once('../VIEW/connectionerror.php');
}
elseif (!isset($_POST['user']) OR !isset($_POST['password']))
{
	require_once('../VIEW/connection.php');
}
else
{
	require_once('../VIEW/connection.php');
}

