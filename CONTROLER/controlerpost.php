<?php
require '../APP/bootstrap.php';

// Création des objets $billet et $manager
$billet = new Billets();

$manager = new ManagerBillets($bdd);

//Création des objets $commentaire et $managercommentaire
$commentaireobj = new Commentaires();

$managercommentaire = new ManagerCommentaires($bdd);


$reponse = new Reponses();

$managerreponses = new ManagerReponses($bdd);



// Si on a un id pour le commentaire et signaler,
//on récupère le commentaire et on lui ajoute +1 à signaler;

if (isset($_GET['idcom']) && isset($_GET['signaler']))
{	

	$commentaireunique = $managercommentaire->getUnique($_GET['idcom']);

	$managercommentaire->signaler($commentaireunique);

}
// Si on rentre formulaire : ajouter commentaire et afficher liste commentaires
if (isset($_POST['pseudo']) && isset($_POST['commentaire']))
{
	$commentaireobj->setPseudo($_POST['pseudo']);
	$commentaireobj->setCommentaire($_POST['commentaire']);
	$commentaireobj->setId_billet($_GET['id']);



	$managercommentaire->add($commentaireobj);

	$billetunique = $manager->getUnique($_GET['id']);
	$listcommentaire = $managercommentaire->getList();
	$listreponse = $managerreponses->getListtotal();
	
	include('../VIEW/post.php');
}

// Sinon : afficher liste commentaires
else
{
		$billetunique = $manager->getUnique($_GET['id']);
		$listcommentaire = $managercommentaire->getList();
		$listreponse = $managerreponses->getListtotal();
	include('../VIEW/post.php');
}
?>