<?php 

class AdminController // Contient mes actuels fichiers : controleradmin; controleradmincom;
						// controleraddpost; controleradminlist; controleradminpost; controlercomlist; controlerupdatepost.

{



	public function getListPosts() {

		$manager = new PostsManager($bdd);

		$posts = $manager->getList();

		require('../VIEW/adminlist.php');

	}

	public function getPost() {


		$manager = new PostsManager($bdd);

		$managercomment = new CommentsManager($bdd);


		$postunique = $manager->getUnique($_GET['id']);
		$listcomment = $managercomment->getListadmin();

		require('../VIEW/adminpost.php');
	}


	public function deletePost() {

		$post = new Posts();

		$manager = new PostsManager($bdd);
	
		$post->setId($_GET['id']);
		$manager->delete($post);

		require('../VIEW/adminlist.php');
	}

	public function addPost() {}

	public function updatePost() {}

	public function getListComments() {


		$managercomment = new CommentsManager($bdd);

		$listcomment = $managercomment->getListtotal();

		require('../VIEW/comlist.php');

	}

	public function deleteComment() {

		$commentobj = new Comments();

		$managercomment = new CommentsManager($bdd);

		$postunique = $manager->getUnique($_GET['id']);
		$listcomment = $managercomment->getListadmin();
		$commentobj->setId($_GET['idcom']);
		$managercomment->delete($commentobj);
		require('../VIEW/adminpost.php');
	}

	public function deleteCommentList() {


		$commentobj = new Comments();

		$managercomment = new CommentsManager($bdd);
		$commentobj->setId($_GET['id']);
		$managercomment->delete($commentobj);
		$listcomment = $managercomment->getListtotal();

		require('../VIEW/comlist.php');
	}

	public function deleteReport() {

		$commentobj = new Comments();

		$managercomment = new CommentsManager($bdd);
		$commentobj->setId($_GET['id']);
		$managercomment->deletereport($commentobj);
		$listcomment = $managercomment->getListtotal();

		require('../VIEW/comlist.php');

	}

	public function deleteAnswer() {}

}