<?php
require '../APP/bootstrap.php';

$commentaire = new Commentaires();

$manager = new ManagerCommentaires($bdd);

$reponse = new Reponses();

$managerreponses = new ManagerReponses($bdd);



if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: ../VIEW/connection.php');
}

if (isset($_POST['pseudo']) && isset($_POST['reponse']))
{
	$reponse->setPseudo($_POST['pseudo']);
	$reponse->setReponse($_POST['reponse']);
	$reponse->setId_commentaire($_GET['id']);

	$managerreponses->add($reponse);
$commentaireunique = $manager->getUnique($_GET['id']);
$listreponse = $managerreponses->getList();

	include_once('../VIEW/admincom.php');
}

else if (isset($_GET['id']) && isset($_GET['idrep']) && isset($_GET['supprimerrep']))

{
    $commentaireunique = $manager->getUnique($_GET['id']);
$listreponse = $managerreponses->getList();

	$reponse->setId($_GET['idrep']);
	$managerreponses->delete($reponse);
	include_once('../VIEW/admincom.php');
}

else if (isset($_GET['id']) && isset($_GET['supprimercom']))
{
	$commentaire->setId($_GET['id']);
	$manager->delete($commentaire);

	
	header('Location: ../CONTROLER/controlercomliste.php');
}
if (isset($_GET['id']) && isset($_GET['idrep']) && isset($_GET['supprimersignalement'])) 
{
	$reponse->setId($_GET['idrep']);
	$managerreponses->supprimersignalement($reponse);
	$commentaireunique = $manager->getUnique($_GET['id']);
    $listreponse = $managerreponses->getList();

	include_once('../VIEW/admincom.php');


}
else if (isset($_GET['id']))
{
    $commentaireunique = $manager->getUnique($_GET['id']);
$listreponse = $managerreponses->getList();

	include_once('../VIEW/admincom.php');
}
