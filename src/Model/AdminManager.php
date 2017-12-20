<?php

namespace Blog\MODEL;

<<<<<<< HEAD
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
=======
class AdminManager
{

	private $bdd;

	public function __construct($bdd)
	{
		$this->setBDD($bdd);
	}

	public function get($id)
	{
		$req = $this->bdd->query('SELECT * FROM admin');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		$req->execute();
	}

	 public function getUnique()
    {
       
<<<<<<< HEAD
      $req = $this->db->query('SELECT * FROM admin WHERE id = ?', [1]);
      
       
     $donnees = $req->fetch(PDO::FETCH_ASSOC);

           $firstadmin = new Admin($donnees);
      
=======
      $req = $this->bdd->query('SELECT * FROM admin WHERE id = ?', [1]);
      
      $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Admin');
      $firstadmin = $req->fetch();
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
      return $firstadmin;

    }

<<<<<<< HEAD
=======
	public function setBDD($bdd)
	{
		$this->bdd = $bdd;
	}


>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
}