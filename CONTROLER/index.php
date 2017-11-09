<?php
require '../APP/bootstrap.php';

// Création des objets $billets et $manager
$billetobject = new Billets();

$manager = new ManagerBillets($bdd);


//Renvoie la liste complète de tous les billets
$billets = $manager->getList();



include('../VIEW/accueil.php');

?>