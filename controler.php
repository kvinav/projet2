<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

include_once('managerbillets.php');
include_once('billets.php');

$billets = new Billets();

$bdd = new PDO('mysql:host=localhost;dbname=projet2', 'root', '');


$manager = new ManagerBillets($bdd);

//ajouter billet
if (isset($_POST['titre']) && isset($_POST['billet']))
{
$manager->add($billets);
}

$billets = $manager->getList();


include('index.php');

?>