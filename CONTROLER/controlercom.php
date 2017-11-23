<?php
require '../APP/bootstrap.php';

$commentaire = new Commentaires();

$manager = new ManagerCommentaires($bdd);

$reponse = new Reponses();

$managerreponses = new ManagerReponses($bdd);



if (isset($_GET['id']) && isset($_POST['pseudo']) && isset($_POST['reponse']))
{
	$reponse->setPseudo($_POST['pseudo']);
	$reponse->setReponse($_POST['reponse']);
	$reponse->setId_commentaire($_GET['id']);

	$managerreponses->add($reponse);
$commentaireunique = $manager->getUnique($_GET['id']);
$listreponse = $managerreponses->getList();

	include_once('../VIEW/commentaires.php');
}
if (isset($_GET['idrep']) && isset($_GET['signaler']))
{	

	$reponseunique = $managerreponses->getUnique($_GET['idrep']);

	$managerreponses->signaler($reponseunique);
	$commentaireunique = $manager->getUnique($_GET['id']);
$listreponse = $managerreponses->getList();

	include_once('../VIEW/commentaires.php');

}


else if (isset($_GET['id']))
{
    $commentaireunique = $manager->getUnique($_GET['id']);
$listreponse = $managerreponses->getList();

	include_once('../VIEW/commentaires.php');
}
