<?php

namespace Blog\MODEL;

<<<<<<< HEAD
use \PDO;

class CommentsManager
{
	private $db;

	public function __construct($db)
 	{
    $this->db = $db;
  	}

	public function add(Comments $comment)
	{
		$req = $this->db->query('INSERT INTO comments (pseudo, comment, id_post, datecomment) VALUES(?, ?, ?, NOW())',
		                        [$comment->getPseudo(), $comment->getComment(), $comment->getId_post()]);
		
=======
class CommentsManager
{
	private $bdd;

	public function __construct($bdd)
	{
		$this->setBDD($bdd);
	}

	public function add(Comments $comment)
	{
		$req = $this->bdd->query('INSERT INTO comments (pseudo, comment, id_post, datecomment) VALUES(?, ?, ?, NOW())',
		                        [$comment->getPseudo(), $comment->getComment(), $comment->getId_post()]);

>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

	}

	public function get($id)
	{
<<<<<<< HEAD
		$req = $this->db->query('SELECT pseudo, comment, report, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM comments ORDER BY id');
=======
		$req = $this->bdd->query('SELECT pseudo, comment, report, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM comments ORDER BY id');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		$req->execute();
	}

	public function report(Comments $comment)
	{
<<<<<<< HEAD
		$req = $this->db->query('UPDATE comments SET report = ?, datereport = NOW() WHERE id = ?', 
=======
		$req = $this->bdd->query('UPDATE comments SET report = ?, datereport = NOW() WHERE id = ?', 
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		                        [$comment->getReport() + 1, $comment->getId()]
		                        );

	}
	public function deletereport(Comments $comment)
	{
<<<<<<< HEAD
		$req = $this->db->query('UPDATE comments SET report = ?, datereport = NULL WHERE id = ?',
=======
		$req = $this->bdd->query('UPDATE comments SET report = ?, datereport = NULL WHERE id = ?',
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		                        [0, $comment->getId()]
		                        );
		

	}

	public function getListadmin()
	{
		$commentsadmin = [];

<<<<<<< HEAD
		$req = $this->db->query('SELECT id, pseudo, comment, report, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM comments                     WHERE id_post = ? ORDER BY report DESC, id DESC',
=======
		$req = $this->bdd->query('SELECT id, pseudo, comment, report, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM comments                     WHERE id_post = ? ORDER BY report DESC, id DESC',
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		                        [$_GET['id']]
		                        );


		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$commentsadmin[] = new Comments($donnees);
		}

		return $commentsadmin;
	}

	public function getList()
	{
		$comments = [];

<<<<<<< HEAD
		$req = $this->db->query('SELECT id, pseudo, comment, id_post, report, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM comments                      WHERE id_post = ? ORDER BY id',
=======
		$req = $this->bdd->query('SELECT id, pseudo, comment, report, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM comments                      WHERE id_post = ? ORDER BY id',
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		                        [$_GET['id']]
		                        );
	
		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$comments[] = new Comments($donnees);
		}
<<<<<<< HEAD
	
=======

>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		return $comments;
	}

	public function getListtotal()
	{
		$commentstotal = [];

<<<<<<< HEAD
		$req = $this->db->query('SELECT id, pseudo, comment, report, id_post, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM comments ORDER BY id_post DESC, report DESC');
=======
		$req = $this->bdd->query('SELECT id, pseudo, comment, report, id_post, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM comments ORDER BY id_post DESC, report DESC');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
     

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$commentstotal[] = new Comments($donnees);
		}

		return $commentstotal;
	}
	
	public function getListreports()
	{
		$commentstotalreports = [];

<<<<<<< HEAD
		$req = $this->db->query('SELECT id, pseudo, comment, report, id_post, datereport, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM comments ORDER BY datereport DESC LIMIT 0,5');
=======
		$req = $this->bdd->query('SELECT id, pseudo, comment, report, id_post, datereport, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM comments ORDER BY datereport DESC LIMIT 0,5');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
     

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$commentstotalreports[] = new Comments($donnees);
		}

		return $commentstotalreports;
	}
	public function getUnique($id)
    {
       
<<<<<<< HEAD
      $req = $this->db->query('SELECT id, pseudo, comment, report, id_post, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM                          comments WHERE id = ?',
                                [$id]
                                );
     
      $donnees = $req->fetch(PDO::FETCH_ASSOC);

           $commentunique = new Comments($donnees);
    
      
=======
      $req = $this->bdd->query('SELECT id, pseudo, comment, report, id_post, DATE_FORMAT(datecomment, "%d/%m/%Y à %Hh%imin") AS datecomment FROM                          comments WHERE id = ?',
                                [$id]
                                );
     
      $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comments');
      $commentunique = $req->fetch();
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
      return $commentunique;

    }

	public function update(Comments $comment)
	{
<<<<<<< HEAD
		$req = $this->db->query('UPDATE comments SET pseudo = ?, comment = ? WHERE id= :id',
=======
		$req = $this->bdd->query('UPDATE comments SET pseudo = ?, comment = ? WHERE id= :id',
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		                        [$comment->getPseudo(), $comment->getComment()]
		                        );

	}

	public function delete(Comments $comment)
	{
<<<<<<< HEAD
		$this->db->exec('DELETE FROM comments WHERE id = '.$comment->getID());
	}

=======
		$this->bdd->exec('DELETE FROM comments WHERE id = '.$comment->getID());
	}

	public function setBDD($bdd)
	{
		$this->bdd = $bdd;
	}
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
}