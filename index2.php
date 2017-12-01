<?php
require('CONTROLLER/Admincontroller.php');
require('CONTROLLER/Frontcontroller.php');

$admincontroller = new AdminController();
$frontcontroller = new FrontController();
$controller = new Controller();

if (isset($_GET['action'])) { // Si le parametre action est présent
	if($_GET['action'] == 'listPosts') { // Si sa valeur est listPosts -> on appelle la fonction  getListPosts()

		$controller->getListPosts();
	}
	elseif ($_GET['action'] == 'post') { // Si sa valeur est post
		if (isset($_GET['id']) && $_GET['id'] > 0) { // si on a un ID supérieur à O -> on affiche un post unique
			$controller->getPost();
		}
		else { // Sinon on affiche une erreur
			echo 'Erreur'; 
		}
	}
	elseif ($_GET['action'] == 'comment') {
		if (isset($_GET['id']) && $_GET['id'] > 0) {

			$controller->getComment();
		}
		elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_POST['pseudo']) && isset($_POST['answer']) {

			$controller->addAnswer();
		}
		else {
			echo 'Erreur';
		}
	}

}

else { // EN l'absence de paramètres, on affiche la liste des posts ( pour l'url simple projet2/index.php )
	getListPosts();
}

