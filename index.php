<?php

require 'app/config.php';
require 'vendor/autoload.php';

use Blog\Controller\AdminController;
use Blog\Controller\FrontController;
use Blog\Controller\Controller;


if (isset($_GET['action'])) { 
	if($_GET['action'] == 'listPosts') { 
		$frontcontroller = new FrontController();
		$frontcontroller->getListPosts();
	}
	elseif ($_GET['action'] == 'post') { 
		if (isset($_GET['id']) && $_GET['id'] > 0) { 
			
			$frontcontroller = new FrontController();
			$frontcontroller->getPost();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idcom']) && $_GET['idcom'] > 0 && isset($_GET['report'])) { 
			$frontcontroller = new FrontController();
			$frontcontroller->reportComment();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_POST['pseudo']) && isset($_POST['comment'])) {
			$frontcontroller = new FrontController();
			$frontcontroller->addComment();
		}
		else { 
			echo 'Erreur'; 
		}
	}
	elseif ($_GET['action'] == 'comment') { 
		if (isset($_GET['id']) && $_GET['id'] > 0) { 
			$frontcontroller = new FrontController();
			$frontcontroller->getComment();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_POST['pseudo']) && isset($_POST['answer'])) { 
			$frontcontroller = new FrontController();
			$frontcontroller->addAnswer();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idrep']) && $_GET['idrep'] > 0 && isset($_GET['report'])) {
			$frontcontroller = new FrontController();
			$frontcontroller->reportAnswer();

		}
		else {
			echo 'Erreur';
		}
	}
	else if($_GET['action'] == 'listPostsAdmin') { 
		$admincontroller = new AdminController();
		$admincontroller->getListPosts();
	}
	elseif ($_GET['action'] == 'postAdmin') { 
		if (isset($_GET['id']) && $_GET['id'] > 0) { 
			$admincontroller = new AdminController();
			$admincontroller->getPost();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['deletepost'])) { 
			$admincontroller = new AdminController();
			$admincontroller->deletePost();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idcom']) && $_GET['idcom'] > 0 && isset($_GET['deletecom'])) { //
			$admincontroller = new AdminController();
			$admincontroller->deleteComment();
		}
		else {
			echo 'Erreur';
		}
	}
	elseif ($_GET['action'] == 'listComments') {
		if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['deletereport'])) {
			$admincontroller = new AdminController();
			$admincontroller->deleteReport();

		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0  && isset($_GET['delete'])) {
			$admincontroller = new AdminController();
			$admincontroller->deleteCommentList();
		}
		elseif (isset($_GET['get']) == 'list') {
			$admincontroller = new AdminController();
			$admincontroller->getListComments();
		}

		else {
			echo 'Erreur';
		}
	}
	elseif ($_GET['action'] == 'commentAdmin') {
		if (isset($_GET['id']) && $_GET['id'] > 0) { 
			$admincontroller = new AdminController();
			$admincontroller->getComment();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_POST['pseudo']) && isset($_POST['answer'])) { 
			$admincontroller = new AdminController();
			$admincontroller->addAnswer();
		}
		else if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idrep']) && $_GET['idrep'] > 0 && isset($_GET['deleteanswer'])) {
			$admincontroller = new AdminController();
			$admincontroller->deleteAnswer();
		}
		elseif  (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idrep']) && $_GET['idrep'] > 0 && isset($_GET['deletereport'])) {
			$admincontroller = new AdminController();

			$admincontroller->deleteReportAnswer();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['deletecom'])) {
			$admincontroller = new AdminController();
			$admincontroller->deleteCommentUnique();
		}
		else {
			echo 'Erreur';
		}
	}
	elseif ($_GET['action'] == 'addPost') {
		if  (isset($_POST['title']) && isset($_POST['post'])) {
				$admincontroller = new AdminController();
				$admincontroller->addPost();
		}
		elseif (!isset($_POST['title']) && !isset($_POST['post'])) {
				$admincontroller = new AdminController();
				$admincontroller->getAddPost();
		}
		else {
			echo 'Erreur';
		}

	}
	elseif ($_GET['action'] == 'updatePost') {
		if  (isset($_POST['title']) && isset($_POST['post'])) {
				$admincontroller = new AdminController();
				$admincontroller->updatePost();
		}
		elseif (!isset($_POST['title']) && !isset($_POST['post'])) {
				$admincontroller = new AdminController();
				$admincontroller->getUpdatePost();
		}
		else {
			echo 'Erreur';
		}

	}
	elseif ($_GET['action'] == 'admin') {
		if (isset($_POST['user']) && isset($_POST['password'])) {
			$admincontroller = new AdminController();
			$admincontroller->admin();
		}
		elseif (isset($_SESSION['user']) && isset($_SESSION['password'])) {
			$admincontroller = new AdminController();
			$admincontroller->admin();
		}
		elseif (!isset($_POST['user']) && !isset($_POST['password']) OR $_POST['user'] !== $firstadmin->getUser()  OR $_POST['password'] !== $firstadmin->getPassword()) {
			$admincontroller = new AdminController();
			$admincontroller->connexionPage();
		}
		elseif (isset($_SESSION['user']) && isset($_SESSION['password']) && isset($_GET['id']) && isset($_GET['deletereport'])) {
			$admincontroller = new AdminController();
			$admincontroller->deleteReportAdmin();

		}
		else {
			echo 'Erreur';
		}
		
	}
	elseif ($_GET['action'] == 'disconnexion') {
		$admincontroller = new AdminController();
		$admincontroller->disconnexion();

	}

	elseif ($_GET['action'] == 'about') {
		$frontcontroller = new FrontController();
		$frontcontroller->about();
	}
	elseif ($_GET['action'] == 'notice') {
		$frontcontroller = new FrontController();
		$frontcontroller->notice();
	}


}

else { 

	$frontcontroller = new FrontController();
	$frontcontroller->getListPosts();
}

