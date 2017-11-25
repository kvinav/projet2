<?php
require '../APP/bootstrap.php';

$comment = new Comments();

$manager = new ManagerComments($bdd);

$answer = new Answers();

$manageranswers = new ManagerAnswers($bdd);



if (isset($_GET['id']) && isset($_POST['pseudo']) && isset($_POST['answer']))
{
	$answer->setPseudo($_POST['pseudo']);
	$answer->setAnswer($_POST['answer']);
	$answer->setId_comment($_GET['id']);

	$manageranswers->add($answer);
$commentunique = $manager->getUnique($_GET['id']);
$listanswer = $manageranswers->getList();

	include_once('../VIEW/comments.php');
}
if (isset($_GET['idrep']) && isset($_GET['report']))
{	

	$answerunique = $manageranswers->getUnique($_GET['idrep']);

	$manageranswers->report($answerunique);
	$commentunique = $manager->getUnique($_GET['id']);
$listanswer = $manageranswers->getList();

	include_once('../VIEW/comments.php');

}


else if (isset($_GET['id']))
{
    $commentunique = $manager->getUnique($_GET['id']);
$listanswer = $manageranswers->getList();

	include_once('../VIEW/comments.php');
}
