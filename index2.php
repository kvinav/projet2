<?php
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
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_POST['pseudo']) && isset($_POST['comment']) {

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
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_POST['pseudo']) && isset($_POST['answer']) { 

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

}

else { 
	getListPosts();
}

