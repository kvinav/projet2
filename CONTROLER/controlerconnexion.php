<?php
require '../APP/bootstrap.php';

$admin = new Admin();


$manageradmin = new ManagerAdmin($bdd);

$firstadmin = $manageradmin->getUnique();

if (isset($_SESSION['user']) && isset($_SESSION['password']))
{
	include('../VIEW/administration.php');
}
else
{
	header('Location: ../VIEW/connection.php');
}