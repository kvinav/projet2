<?php
require '../APP/bootstrap.php';

$comment = new Comments();

$manager = new CommentsManager($bdd);

$post = new Posts();

$answer = new Answers();

$manageranswers = new AnswersManager($bdd);



if (!isset($_SESSION['user']) OR !isset($_SESSION['password']))
{
	header('Location: ../VIEW/connexion.php');
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

else if (isset($_GET['id']) && isset($_GET['idrep']) && isset($_GET['deleteanswer']))

{
    $commentunique = $manager->getUnique($_GET['id']);
$listanswer = $manageranswers->getList();

	$answer->setId($_GET['idrep']);
	$manageranswers->delete($answer);
	include_once('../VIEW/admincom.php');
}

else if (isset($_GET['id']) && isset($_GET['deletecom']))
{
	$comment->setId($_GET['id']);
	$manager->delete($comment);

	
	header('Location: ../CONTROLER/controlercomlist.php');
}
if (isset($_GET['id']) && isset($_GET['idrep']) && isset($_GET['deletereport'])) 
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
