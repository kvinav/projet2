<?php
require '../APP/bootstrap.php';

$comment = new Comments();

$manager = new ManagerComments($bdd);

$post = new Posts();

$manageranswers = new ManagerAnswers($bdd);



if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: ../VIEW/connection.php');
}

if (isset($_POST['pseudo']) && isset($_POST['post']))
{
	$post->setPseudo($_POST['pseudo']);
	$post->setAnswer($_POST['post']);
	$post->setId_comment($_GET['id']);

	$manageranswers->add($post);
$commentunique = $manager->getUnique($_GET['id']);
$listanswer = $manageranswers->getList();

	include_once('../VIEW/admincom.php');
}

else if (isset($_GET['id']) && isset($_GET['idrep']) && isset($_GET['supprimerrep']))

{
    $commentunique = $manager->getUnique($_GET['id']);
$listanswer = $manageranswers->getList();

	$post->setId($_GET['idrep']);
	$manageranswers->delete($post);
	include_once('../VIEW/admincom.php');
}

else if (isset($_GET['id']) && isset($_GET['supprimercom']))
{
	$comment->setId($_GET['id']);
	$manager->delete($comment);

	
	header('Location: ../CONTROLER/controlercomliste.php');
}
if (isset($_GET['id']) && isset($_GET['idrep']) && isset($_GET['supprimersignalement'])) 
{
	$post->setId($_GET['idrep']);
	$manageranswers->deletereport($post);
	$commentunique = $manager->getUnique($_GET['id']);
    $listanswer = $manageranswers->getList();

	include_once('../VIEW/admincom.php');


}
else if (isset($_GET['id']))
{
    $commentunique = $manager->getUnique($_GET['id']);
$listanswer = $manageranswers->getList();

	include_once('../VIEW/admincom.php');
}
