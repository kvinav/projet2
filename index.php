<?php

require '../APP/bootstrap.php';
require('CONTROLLER/Admincontroller.php');
require('CONTROLLER/Frontcontroller.php');

$admincontroller = new AdminController();
$frontcontroller = new FrontController();
$controller = new Controller();

if (isset($_GET['action'])) { 
	if($_GET['action'] == 'listPosts') { 

		$frontcontroller->getListPosts();
	}
	elseif ($_GET['action'] == 'post') { 
		if (isset($_GET['id']) && $_GET['id'] > 0) { 

			$frontcontroller->getPost();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idcom']) && $_GET['idcom'] > 0 && isset($_GET['report'])) { 

			$frontcontroller->reportComment();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_POST['pseudo']) && isset($_POST['comment'])) {

			$frontcontroller->addComment();
		}
		else { 
			echo 'Erreur'; 
		}
	}
	elseif ($_GET['action'] == 'comment') { 
		if (isset($_GET['id']) && $_GET['id'] > 0) { 

			$frontcontroller->getComment();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_POST['pseudo']) && isset($_POST['answer'])) { 

			$frontcontroller->addAnswer();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idrep']) && $_GET['idrep'] > 0 && isset($_GET['report'])) {

			$frontcontroller->reportAnswer();

		}
		else {
			echo 'Erreur';
		}
	}
	else if($_GET['action'] == 'listPostsAdmin') { 

		$admincontroller->getListPosts();
	}
	elseif ($_GET['action'] == 'postAdmin') { 
		if (isset($_GET['id']) && $_GET['id'] > 0) { 

			$admincontroller->getPost();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['deletepost'])) { 

			$admincontroller->deletePost();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idcom']) && $_GET['idcom'] > 0 && isset($_GET['deletecom'])) { //

			$admincontroller->deleteComment();
		}
		else {
			echo 'Erreur';
		}
	}
	elseif ($_GET['action'] == 'listComments') {
		if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['deletereport'])) {

			$admincontroller->deleteReport();

		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0  && isset($_GET['delete'])) {

			$admincontroller->deleteCommentList();
		}
		elseif (isset($_GET['get']) == 'list') {

			$admincontroller->getListComments();
		}

		else {
			echo 'Erreur';
		}
	}
	elseif ($_GET['action'] == 'commentAdmin') {
		if (isset($_GET['id']) && $_GET['id'] > 0) { 

			$admincontroller->getComment();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_POST['pseudo']) && isset($_POST['answer'])) { 

			$admincontroller->addAnswer();
		}
		else if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idrep']) && $_GET['idrep'] > 0 && isset($_GET['deleteanswer'])) {
			$admincontroller->deleteAnswer();
		}
		elseif  (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idrep']) && $_GET['idrep'] > 0 && isset($_GET['deletereport'])) {

			$admincontroller->deleteReportAnswer();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['deletecom'])) {

			$admincontroller->deleteCommentUnique();
		}
		else {
			echo 'Erreur';
		}
	}
	elseif ($_GET['action'] == 'addPost') {
		if  (isset($_POST['title']) && isset($_POST['post'])) {

				$admincontroller->addPost();
		}
		elseif (!isset($_POST['title']) && !isset($_POST['post'])) {

				$admincontroller->getAddPost();
		}
		else {
			echo 'Erreur';
		}

	}
	elseif ($_GET['action'] == 'updatePost') {
		if  (isset($_POST['title']) && isset($_POST['post'])) {

				$admincontroller->updatePost();
		}
		elseif (!isset($_POST['title']) && !isset($_POST['post'])) {

				$admincontroller->getUpdatePost();
		}
		else {
			echo 'Erreur';
		}

	}
	elseif ($_GET['action'] == 'admin') {
		if (isset($_POST['user']) && isset($_POST['password']) && $_POST['user'] == $firstadmin->getUser()  && $_POST['password'] == $firstadmin->getPassword()) {

			$admincontroller->admin();
		}
		elseif (isset($_SESSION['user']) && isset($_SESSION['password'])) {

			$admincontroller->admin();
		}
		elseif (!isset($_POST['user']) && !isset($_POST['password']) OR $_POST['user'] !== $firstadmin->getUser()  OR $_POST['password'] !== $firstadmin->getPassword()) {

			$admincontroller->connexionPage();
		}
		elseif (isset($_SESSION['user']) && isset($_SESSION['password']) && isset($_GET['id']) && isset($_GET['deletereport'])) {

			$admincontroller->deleteReportAdmin();

		}
		else {
			echo 'Erreur';
		}
		
	}
	elseif ($_GET['action'] == 'disconnexion' {

		$admincontroller->disconnexion();

	}

	elseif ($_GET['action'] == 'about') {
		$frontcontroller->about();
	}
	elseif ($_GET['action'] == 'notice') {
		$frontcontroller->notice();
	}


}

else { 

	$frontcontroller->getListPosts();
}

