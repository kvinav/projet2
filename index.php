<?php

<<<<<<< HEAD
session_start(); 


require 'app/config.php';
=======
require 'APP/config.php';
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
require 'vendor/autoload.php';

use Blog\Controller\AdminController;
use Blog\Controller\FrontController;
use Blog\Controller\Controller;
<<<<<<< HEAD


if (isset($_GET['action'])) { 
	if($_GET['action'] == 'listPosts') { 
		$frontcontroller = new FrontController();
=======
use Blog\Model\App;
use Blog\Model\Database;

$admincontroller = new AdminController();
$frontcontroller = new FrontController();
$controller = new Controller();
$bdd = Blog\Model\App::getDatabase();

if (isset($_GET['action'])) { 
	if($_GET['action'] == 'listPosts') { 

>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		$frontcontroller->getListPosts();
	}
	elseif ($_GET['action'] == 'post') { 
		if (isset($_GET['id']) && $_GET['id'] > 0) { 

<<<<<<< HEAD
			if (isset($_GET['idcom']) && $_GET['idcom'] > 0 && isset($_GET['report'])) { 
					$frontcontroller = new FrontController();
					$frontcontroller->reportComment();
			} elseif (isset($_POST['pseudo']) && isset($_POST['comment'])) {
					$frontcontroller = new FrontController();
					$frontcontroller->addComment();
			} else {

					$frontcontroller = new FrontController();
					$frontcontroller->getPost();
			
			}
				
=======
			$frontcontroller->getPost();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idcom']) && $_GET['idcom'] > 0 && isset($_GET['report'])) { 

			$frontcontroller->reportComment();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_POST['pseudo']) && isset($_POST['comment'])) {

			$frontcontroller->addComment();
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		}
		else { 
			echo 'Erreur'; 
		}
	}
	elseif ($_GET['action'] == 'comment') { 
<<<<<<< HEAD
		if (isset($_GET['id']) && $_GET['id'] > 0) {

			if (isset($_POST['pseudo']) && isset($_POST['answer'])) { 

				$frontcontroller = new FrontController();
				$frontcontroller->addAnswer();
		

			}elseif (isset($_GET['idrep']) && $_GET['idrep'] > 0 && isset($_GET['report'])) {
				$frontcontroller = new FrontController();
				$frontcontroller->reportAnswer();
				

			} else {
				$frontcontroller = new FrontController();
				$frontcontroller->getComment();
				
			}

		} else {
=======
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
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
			echo 'Erreur';
		}
	}
	else if($_GET['action'] == 'listPostsAdmin') { 
<<<<<<< HEAD
		$admincontroller = new AdminController();
=======

>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		$admincontroller->getListPosts();
	}
	elseif ($_GET['action'] == 'postAdmin') { 
		if (isset($_GET['id']) && $_GET['id'] > 0) { 

<<<<<<< HEAD
			if (isset($_GET['deletepost'])) { 
				$admincontroller = new AdminController();
				$admincontroller->deletePost();

			} elseif (isset($_GET['idcom']) && $_GET['idcom'] > 0 && isset($_GET['deletecom'])) { //
				$admincontroller = new AdminController();
				$admincontroller->deleteComment();
			} else {
				$admincontroller = new AdminController();
				$admincontroller->getPost();

			}
		} else {
=======
			$admincontroller->getPost();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['deletepost'])) { 

			$admincontroller->deletePost();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idcom']) && $_GET['idcom'] > 0 && isset($_GET['deletecom'])) { //

			$admincontroller->deleteComment();
		}
		else {
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
			echo 'Erreur';
		}
	}
	elseif ($_GET['action'] == 'listComments') {
		if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['deletereport'])) {
<<<<<<< HEAD
			$admincontroller = new AdminController();
=======

>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
			$admincontroller->deleteReport();

		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0  && isset($_GET['delete'])) {
<<<<<<< HEAD
			$admincontroller = new AdminController();
			$admincontroller->deleteCommentList();
		}
		elseif (isset($_GET['get']) == 'list') {
			$admincontroller = new AdminController();
=======

			$admincontroller->deleteCommentList();
		}
		elseif (isset($_GET['get']) == 'list') {

>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
			$admincontroller->getListComments();
		}

		else {
			echo 'Erreur';
		}
	}
	elseif ($_GET['action'] == 'commentAdmin') {
<<<<<<< HEAD
		 if (isset($_GET['id']) && $_GET['id'] > 0) { 
            
            if (isset($_POST['pseudo']) && isset($_POST['answer'])) { 
                $admincontroller = new AdminController();
                $admincontroller->addAnswer();
            }

            elseif (isset($_GET['idrep']) && $_GET['idrep'] > 0 && isset($_GET['deleteanswer'])) {
                $admincontroller = new AdminController();
                $admincontroller->deleteAnswer();
            }

            elseif (isset($_GET['idrep']) && $_GET['idrep'] > 0 && isset($_GET['deletereport'])) {
                $admincontroller = new AdminController();
                $admincontroller->deleteReportAnswer();
            }

            elseif (isset($_GET['deletecom'])) {
                $admincontroller = new AdminController();
                $admincontroller->deleteCommentUnique();
            }

            else {
                $admincontroller = new AdminController();
                $admincontroller->getComment();
            }
        
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
=======
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

>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
				$admincontroller->getAddPost();
		}
		else {
			echo 'Erreur';
		}
<<<<<<< HEAD
	}
	
	elseif ($_GET['action'] == 'updatePost') {
		if  (isset($_POST['title']) && isset($_POST['post'])) {
				$admincontroller = new AdminController();
				$admincontroller->updatePost();
		}
		elseif (!isset($_POST['title']) && !isset($_POST['post'])) {
				$admincontroller = new AdminController();
=======

	}
	elseif ($_GET['action'] == 'updatePost') {
		if  (isset($_POST['title']) && isset($_POST['post'])) {

				$admincontroller->updatePost();
		}
		elseif (!isset($_POST['title']) && !isset($_POST['post'])) {

>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
				$admincontroller->getUpdatePost();
		}
		else {
			echo 'Erreur';
		}

	}
<<<<<<< HEAD
	elseif ($_GET['action'] == 'connexion') {
		$admincontroller = new AdminController();
		$admincontroller->connexionPage();
	}
	elseif ($_GET['action'] == 'connexion' && isset($_SESSION['user']) && isset($_SESSION['password'])) {
			$admincontroller = new AdminController();
			$admincontroller->adminSession();
	}
	elseif ($_GET['action'] == 'dashboard') {
		if (isset($_GET['id']) && isset($_GET['deletereport'])) {
			$admincontroller = new AdminController();
			$admincontroller->deleteReportAdmin();

		} else {
		$admincontroller = new AdminController();
		$admincontroller->adminSession();
		}
	}
	elseif ($_GET['action'] == 'admin') {
		if (isset($_POST['user']) && isset($_POST['password'])) {
			$admincontroller = new AdminController();
			$admincontroller->admin();

		} elseif (!isset($_POST['user']) OR !isset($_POST['password']) OR $_POST['user'] !== $firstadmin->getUser()  OR $_POST['password'] !== $firstadmin->getPassword()) {
			$admincontroller = new AdminController();
			$admincontroller->connexionPage();
		} else {
=======
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
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
			echo 'Erreur';
		}
		
	}
	elseif ($_GET['action'] == 'disconnexion') {
<<<<<<< HEAD
		$admincontroller = new AdminController();
=======

>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		$admincontroller->disconnexion();

	}

	elseif ($_GET['action'] == 'about') {
<<<<<<< HEAD
		$frontcontroller = new FrontController();
		$frontcontroller->about();
	}
	elseif ($_GET['action'] == 'notice') {
		$frontcontroller = new FrontController();
=======
		$frontcontroller->about();
	}
	elseif ($_GET['action'] == 'notice') {
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		$frontcontroller->notice();
	}


}

else { 
<<<<<<< HEAD

	$frontcontroller = new FrontController();
=======
	var_dump($bdd);
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
	$frontcontroller->getListPosts();
}

