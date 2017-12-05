<?php

namespace Blog\Model;

class PostsManager
{
	private $bdd;

	public function __construct($bdd)
  {
    $this->setBdd($bdd);
  }

	//Ajouter post

	public function add(Posts $posts)
	{

		$req = $this->bdd->query('INSERT INTO posts (author, title, post, datepost) VALUES(\'Jean Forteroche\', ?, ?, NOW())', 
		                          [$posts->getTitle(), $posts->getPost()] 
		                        );

	}

	public function get($id)
    {
   		$req = $this->bdd->query('SELECT id, author, title, post, DATE_FORMAT(datepost, \'%d/%m/%Y %Hh%imin\') AS datepost FROM posts ORDER BY id DESC');
   		$donnees = $req->fetch(PDO::FETCH_ASSOC);

   		 //Execution requète
    	$req->execute();
    }

    //récupérer liste billets
  	public function getList()
  	{
     	$posts = [];

    	$req = $this->bdd->query('SELECT id, author, title, post, DATE_FORMAT(datepost, \'%d/%m/%Y à %Hh%imin\') AS datepost, DATE_FORMAT(datemodif, \'%d/%m/%Y à %Hh%imin\') AS datemodif FROM posts ORDER BY id DESC');

    		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
    		{
     			 $posts[] = new Posts($donnees);
    		}

    	return $posts;
  	}

      // post unique
    public function getUnique()
    {
       
      $req = $this->bdd->query('SELECT id, author, title, post, DATE_FORMAT(datepost, \'%d/%m/%Y à %Hh%imin\') AS datepost, DATE_FORMAT(datemodif, \'%d/%m/%Y à %Hh%imin\') AS datemodif FROM posts WHERE id = ?', [$_GET['id']]);
      
      $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Posts');
      $postunique = $req->fetch();
      return $postunique;

    }
   	//Update post

  	 public function update(Posts $posts)
    {
        $req = $this->bdd->query('UPDATE posts SET title = ?, post = ?, datemodif = NOW() WHERE id = '.$posts->getId(), 
                                [$posts->getTitle(), $posts->getPost()]
                                );
  
    }

    //Suppression d'un post

  	 public function delete(Posts $post)
    {
        $this->bdd->exec('DELETE FROM posts WHERE id = '.$post->getId());
    }
 
 
  	public function setBdd($bdd)
  	{
   		 $this->bdd = $bdd;
  	}

}