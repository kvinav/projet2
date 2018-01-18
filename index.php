<?php

session_start(); 


require 'app/config.php';
require 'vendor/autoload.php';

require_once("vendor/autoload.php");

use Blog\Controller\AdminController;
use Blog\Controller\FrontController;
use Blog\Controller\Controller;


if (!empty($_GET['action'])) { 
	if($_GET['action'] == 'listPosts') { 
		$frontcontroller = new FrontController();
		$frontcontroller->getListPosts();
	}
	elseif ($_GET['action'] == 'post') { 
		if (isset($_GET['id']) && $_GET['id'] > 0) { 

			if (isset($_GET['idcom']) && $_GET['idcom'] > 0 && isset($_GET['report'])) { 

					$idcom = $_GET['idcom'];
					$id = $_GET['id'];
					$frontcontroller = new FrontController();
					$frontcontroller->reportComment($idcom, $id);
			} elseif (isset($_POST['pseudo']) && isset($_POST['comment'])) {

					$comment = [
						'pseudo' => htmlspecialchars($_POST['pseudo']),
						'comment' => htmlspecialchars($_POST['comment']),
						'id_post' => $_GET['id'],

					];
					$id = $_GET['id'];
					$frontcontroller = new FrontController();
					$frontcontroller->addComment($comment, $id);

			} else {
					$id = $_GET['id'];
					$frontcontroller = new FrontController();
					$frontcontroller->getPost($id);
			
			}
				
		}
		else { 
			echo 'Erreur'; 
		}
	}
	elseif ($_GET['action'] == 'comment') { 
		if (isset($_GET['id']) && $_GET['id'] > 0) {

			if (isset($_POST['pseudo']) && isset($_POST['answer'])) { 


				$answer = [
					'pseudo' => htmlspecialchars($_POST['pseudo']),
					'answer' => htmlspecialchars($_POST['answer']),
					'id_comment' => $_GET['id'],

				];
				$id = $_GET['id'];
				$frontcontroller = new FrontController();
				$frontcontroller->addAnswer($answer, $id);
		

			}elseif (isset($_GET['idrep']) && $_GET['idrep'] > 0 && isset($_GET['report'])) {
				$idrep = $_GET['idrep'];
				$id = $_GET['id'];
				$frontcontroller = new FrontController();
				$frontcontroller->reportAnswer($idrep, $id);
				

			} else {
				$id = $_GET['id'];
				$frontcontroller = new FrontController();
				$frontcontroller->getComment($id);
				
			}

		} else {
			echo 'Erreur';
		}
	}
	else if($_GET['action'] == 'listPostsAdmin') { 
		$admincontroller = new AdminController();
		$admincontroller->getListPosts();
	}
	elseif ($_GET['action'] == 'postAdmin') { 
		if (isset($_GET['id']) && $_GET['id'] > 0) { 

			if (isset($_GET['deletepost'])) { 
				$post = [
					'id' => $_GET['id'],
				];
				$admincontroller = new AdminController();
				$admincontroller->deletePost($post);

			} elseif (isset($_GET['idcom']) && $_GET['idcom'] > 0 && isset($_GET['deletecom'])) { 

				$comment = [
					'id' => $_GET['idcom'],
				];
				$id = $_GET['id'];

				$admincontroller = new AdminController();
				$admincontroller->deleteComment($comment, $id);
				
			} else {
				$id = $_GET['id'];
				$admincontroller = new AdminController();
				$admincontroller->getPost($id);
				

			}
		} else {
			echo 'Erreur';
		}
	}
	elseif ($_GET['action'] == 'listComments') {
		if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['deletereport'])) {

			$comment = [
				'id' => $_GET['id'],

			];
			$admincontroller = new AdminController();
			$admincontroller->deleteReport($comment);

		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0  && isset($_GET['delete'])) {

			$comment = [
				'id' => $_GET['id'],

			];
			$admincontroller = new AdminController();
			$admincontroller->deleteCommentList($comment);
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
            
            if (isset($_POST['pseudo']) && isset($_POST['answer'])) { 

				$answer = [
					'pseudo' => htmlspecialchars($_POST['pseudo']),
					'answer' => htmlspecialchars($_POST['answer']),
					'id_comment' => $_GET['id'],

				];
				$id = $_GET['id'];
                $admincontroller = new AdminController();
                $admincontroller->addAnswer($answer, $id);
            }

            elseif (isset($_GET['idrep']) && $_GET['idrep'] > 0 && isset($_GET['deleteanswer'])) {


				$answer = [
					'id' => $_GET['idrep'],

				];

				$id = $_GET['id']; 
                $admincontroller = new AdminController();
                $admincontroller->deleteAnswer($answer, $id);
            }

            elseif (isset($_GET['idrep']) && $_GET['idrep'] > 0 && isset($_GET['deletereport'])) {

            	$answer = [
					'id' => $_GET['idrep'],

				];

				$id = $_GET['id'];

                $admincontroller = new AdminController();
                $admincontroller->deleteReportAnswer($answer, $id);
            }

            elseif (isset($_GET['deletecom'])) {

            	$comment = [
					'id' => $_GET['id'],

				];
                $admincontroller = new AdminController();
                $admincontroller->deleteCommentUnique($comment);
            }

            else {
            	$id = $_GET['id'];
                $admincontroller = new AdminController();
                $admincontroller->getComment($id);
            }
        
        }
        
        else {
            echo 'Erreur';
        }
    }
	
	elseif ($_GET['action'] == 'addPost') {
		if  (isset($_POST['title']) && isset($_POST['post'])) {

				$post = [
					'title' => htmlspecialchars($_POST['title']),
					'post' => htmlspecialchars($_POST['post']),
				];
				$admincontroller = new AdminController();
				$admincontroller->addPost($post);
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


				$post = [
					'id' => $_GET['id'],
					'title' => htmlspecialchars($_POST['title']),
					'post' => htmlspecialchars($_POST['post']),

				];
		
				$admincontroller = new AdminController();
				$admincontroller->updatePost($post);
		}
		elseif (!isset($_POST['title']) && !isset($_POST['post'])) {
				$id = $_GET['id'];
				$admincontroller = new AdminController();
				$admincontroller->getUpdatePost($id);
		}
		else {
			echo 'Erreur';
		}

	}
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

			$comment = [
				'id' => $_GET['id'],

			];
			$admincontroller = new AdminController();
			$admincontroller->deleteReportAdmin($comment);

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

