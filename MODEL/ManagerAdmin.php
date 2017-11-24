<?php
class ManagerAdmin
{

	private $bdd;

	public function __construct($bdd)
	{
		$this->setBDD($bdd);
	}

	public function get($id)
	{
		$req = $this->bdd->query('SELECT * FROM admin');
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		$req->execute();
	}

	 public function getUnique()
    {
       
      $req = $this->bdd->query('SELECT * FROM admin WHERE id = ?', [1]);
      
      $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Admin');
      $firstadmin = $req->fetch();
      return $firstadmin;

    }

	public function setBDD($bdd)
	{
		$this->bdd = $bdd;
	}


}