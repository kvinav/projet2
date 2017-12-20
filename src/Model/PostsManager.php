<?php

namespace Blog\Model;

<<<<<<< HEAD
use \PDO;

class PostsManager
{
	private $db;

	public function __construct($db)
  {
    $this->db = $db;
=======
class PostsManager
{
	private $bdd;

	public function __construct($bdd)
  {
    $this->setBdd($bdd);
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
  }

	//Ajouter post

	public function add(Posts $posts)
	{

<<<<<<< HEAD
		$req = $this->db->query('INSERT INTO posts (author, title, post, datepost) VALUES(\'Jean Forteroche\', ?, ?, NOW())', 
=======
		$req = $this->bdd->query('INSERT INTO posts (author, title, post, datepost) VALUES(\'Jean Forteroche\', ?, ?, NOW())', 
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		                          [$posts->getTitle(), $posts->getPost()] 
		                        );

	}

	public function get($id)
    {
<<<<<<< HEAD
   		$req = $this->db->query('SELECT id, author, title, post, DATE_FORMAT(datepost, \'%d/%m/%Y %Hh%imin\') AS datepost FROM posts ORDER BY id DESC');
=======
   		$req = $this->bdd->query('SELECT id, author, title, post, DATE_FORMAT(datepost, \'%d/%m/%Y %Hh%imin\') AS datepost FROM posts ORDER BY id DESC');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
   		$donnees = $req->fetch(PDO::FETCH_ASSOC);

   		 //Execution requète
    	$req->execute();
    }

    //récupérer liste billets
  	public function getList()
  	{
     	$posts = [];

<<<<<<< HEAD
    	$req = $this->db->query('SELECT id, author, title, post, DATE_FORMAT(datepost, \'%d/%m/%Y à %Hh%imin\') AS datepost, DATE_FORMAT(datemodif, \'%d/%m/%Y à %Hh%imin\') AS datemodif FROM posts ORDER BY id DESC');
=======
    	$req = $this->bdd->query('SELECT id, author, title, post, DATE_FORMAT(datepost, \'%d/%m/%Y à %Hh%imin\') AS datepost, DATE_FORMAT(datemodif, \'%d/%m/%Y à %Hh%imin\') AS datemodif FROM posts ORDER BY id DESC');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

    		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
    		{
     			 $posts[] = new Posts($donnees);
    		}
<<<<<<< HEAD
      
=======

>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
    	return $posts;
  	}

      // post unique
    public function getUnique()
    {
<<<<<<< HEAD

    $req = $this->db->query('SELECT id, author, title, post, DATE_FORMAT(datepost, \'%d/%m/%Y à %Hh%imin\') AS datepost, DATE_FORMAT(datemodif, \'%d/%m/%Y à %Hh%imin\') AS datemodif FROM posts WHERE id = ?', [$_GET['id']]);
      
     $donnees = $req->fetch(PDO::FETCH_ASSOC);

           $postunique = new Posts($donnees);
    
=======
       
      $req = $this->bdd->query('SELECT id, author, title, post, DATE_FORMAT(datepost, \'%d/%m/%Y à %Hh%imin\') AS datepost, DATE_FORMAT(datemodif, \'%d/%m/%Y à %Hh%imin\') AS datemodif FROM posts WHERE id = ?', [$_GET['id']]);
      
      $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Posts');
      $postunique = $req->fetch();
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
      return $postunique;

    }
   	//Update post

  	 public function update(Posts $posts)
    {
<<<<<<< HEAD
        $req = $this->db->query('UPDATE posts SET title = ?, post = ?, datemodif = NOW() WHERE id = '.$posts->getId(), 
=======
        $req = $this->bdd->query('UPDATE posts SET title = ?, post = ?, datemodif = NOW() WHERE id = '.$posts->getId(), 
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
                                [$posts->getTitle(), $posts->getPost()]
                                );
  
    }

    //Suppression d'un post

  	 public function delete(Posts $post)
    {
<<<<<<< HEAD
        $this->db->exec('DELETE FROM posts WHERE id = '.$post->getId());

        
    }
 
=======
        $this->bdd->exec('DELETE FROM posts WHERE id = '.$post->getId());
    }
 
 
  	public function setBdd($bdd)
  	{
   		 $this->bdd = $bdd;
  	}
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4

}