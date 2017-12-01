<?php
require '../APP/bootstrap.php';

$postobject = new Posts();

$manager = new PostsManager($bdd);

$posts = $manager->getList();

if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: ../VIEW/connexion.php');
}
else
{
include('../VIEW/adminlist.php');
}