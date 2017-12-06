<?php

namespace Blog\MODEL;

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
      
      $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Admin');
      $firstadmin = $req->fetch();
      return $firstadmin;

    }

}