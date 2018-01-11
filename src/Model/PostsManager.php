<?php

namespace Blog\Model;

use \PDO;

class PostsManager
{
	private $db;

	public function __construct($db)
  {
    $this->db = $db;
  }

	//Ajouter post

	public function add($post)
	{
        $post = new Posts($post);


		$req = $this->db->query('INSERT INTO posts (author, title, post, datepost) VALUES(\'Jean Forteroche\', ?, ?, NOW())', 
		                          [$post->getTitle(), $post->getPost()] 
		                        );

	}

	public function get($id)
    {
   		$req = $this->db->query('SELECT id, author, title, post, DATE_FORMAT(datepost, \'%d/%m/%Y %Hh%imin\') AS datepost FROM posts ORDER BY id DESC');
   		$donnees = $req->fetch(PDO::FETCH_ASSOC);

   		 //Execution requète
    	$req->execute();
    }

    //récupérer liste billets
  	public function getList()
  	{
     	$posts = [];

    	$req = $this->db->query('SELECT id, author, title, post, DATE_FORMAT(datepost, \'%d/%m/%Y à %Hh%imin\') AS datepost, DATE_FORMAT(datemodif, \'%d/%m/%Y à %Hh%imin\') AS datemodif FROM posts ORDER BY id DESC');

    		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
    		{
     			 $posts[] = new Posts($donnees);
    		}
      
    	return $posts;
  	}

      // post unique
    public function getUnique()
    {

    $req = $this->db->query('SELECT id, author, title, post, DATE_FORMAT(datepost, \'%d/%m/%Y à %Hh%imin\') AS datepost, DATE_FORMAT(datemodif, \'%d/%m/%Y à %Hh%imin\') AS datemodif FROM posts WHERE id = ?', [$_GET['id']]);
      
     $donnees = $req->fetch(PDO::FETCH_ASSOC);

           $postunique = new Posts($donnees);
    
      return $postunique;

    }
   	//Update post

  	 public function update($post)
    {
        $post = new Posts($post);
        
        $req = $this->db->query('UPDATE posts SET title = ?, post = ?, datemodif = NOW() WHERE id = '.$post->getId(), 
                                [$post->getTitle(), $post->getPost()]
                                );
  
    }

    //Suppression d'un post

  	 public function delete($post)

    {

        $post = new Posts($post);

        $this->db->exec('DELETE FROM posts WHERE id = '.$post->getId());

        
    }
 

}