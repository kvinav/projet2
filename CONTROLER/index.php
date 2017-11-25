<?php
require '../APP/bootstrap.php';

// Création des objets $billets et $manager
$postobject = new Posts();

$manager = new ManagerPosts($bdd);


//Renvoie la liste complète de tous les billets
$posts = $manager->getList();



include('../VIEW/home.php');

?>