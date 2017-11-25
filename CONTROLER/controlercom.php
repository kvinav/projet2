<?php
require '../APP/bootstrap.php';

$comment = new Comments();

$manager = new ManagerComments($bdd);

$answer = new Answers();

$manageranswers = new ManagerAnswers($bdd);



if (isset($_GET['id']) && isset($_POST['pseudo']) && isset($_POST['reponse']))
{
	$answer->setPseudo($_POST['pseudo']);
	$answer->setAnswer($_POST['reponse']);
	$answer->setId_comment($_GET['id']);

	$manageranswers->add($answer);
$commentunique = $manager->getUnique($_GET['id']);
$listanswer = $manageranswers->getList();

	include_once('../VIEW/commentaires.php');
}
if (isset($_GET['idrep']) && isset($_GET['signaler']))
{	

	$answerunique = $manageranswers->getUnique($_GET['idrep']);

	$manageranswers->report($answerunique);
	$commentunique = $manager->getUnique($_GET['id']);
$listanswer = $manageranswers->getList();

	include_once('../VIEW/commentaires.php');

}


else if (isset($_GET['id']))
{
    $commentunique = $manager->getUnique($_GET['id']);
$listanswer = $manageranswers->getList();

	include_once('../VIEW/commentaires.php');
}
