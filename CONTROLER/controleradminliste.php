<?php
require '../APP/bootstrap.php';

$postobject = new Posts();

$manager = new ManagerPosts($bdd);

$posts = $manager->getList();

if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: ../VIEW/connection.php');
}
else
{
include('../VIEW/adminliste.php');
}