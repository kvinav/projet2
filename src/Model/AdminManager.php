<?php

namespace Blog\Model;

use \PDO;

class AdminManager
{

	private $db;

	public function __construct($db)
 	{
    $this->db = $db;
  	}

	public function get($id)
	{
		$req = $this->db->query('SELECT * FROM admin');
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		$req->execute();
	}

	 public function getUnique()
    {
       
      $req = $this->db->query('SELECT * FROM admin WHERE id = ?', [1]);
      
       
     $donnees = $req->fetch(PDO::FETCH_ASSOC);

           $firstadmin = new Admin($donnees);
      
      return $firstadmin;

    }

}