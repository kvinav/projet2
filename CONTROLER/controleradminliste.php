<?php
require '../APP/bootstrap.php';

$billetobject = new Billets();

$manager = new ManagerBillets($bdd);

$billets = $manager->getList();

if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: ../VIEW/connection.php');
}
else
{
include('../VIEW/adminliste.php');
}