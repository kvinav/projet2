<?php

namespace Blog\MODEL;

<<<<<<< HEAD
use \PDO;

class AnswersManager
{
	private $db;

	public function __construct($db)
 	{
    $this->db = $db;
  	}


	public function add(Answers $answer)
	{
		$req = $this->db->query('INSERT INTO answers (pseudo, answer, id_comment, dateanswer) VALUES(?, ?, ?, NOW())',
=======
class AnswersManager
{
	private $bdd;

	public function __construct($bdd)
	{
		$this->setBDD($bdd);
	}

	public function add(Answers $answer)
	{
		$req = $this->bdd->query('INSERT INTO answers (pseudo, answer, id_comment, dateanswer) VALUES(?, ?, ?, NOW())',
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		                        [$answer->getPseudo(), $answer->getAnswer(), $answer->getId_comment()]
		                        );

	
	}

	public function get($id)
	{
<<<<<<< HEAD
		$req = $this->db->query('SELECT pseudo, answer, DATE_FORMAT(dateanswer, \'%d/%m/%Y à %Hh%imin\') AS dateanswer, report FROM answers ORDER BY id');
=======
		$req = $this->bdd->query('SELECT pseudo, answer, DATE_FORMAT(dateanswer, \'%d/%m/%Y à %Hh%imin\') AS dateanswer, report FROM answers ORDER BY id');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		$req->execute();
	}

	public function report(Answers $answer)
	{
<<<<<<< HEAD
		$req = $this->db->query('UPDATE answers SET report = ?,  datereport = NOW() WHERE id = ?',
=======
		$req = $this->bdd->query('UPDATE answers SET report = ? WHERE id = ?',
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		                        [$answer->getReport() + 1, $answer->getId()]
		                        );

	}

	public function deletereport(Answers $answer)
	{
<<<<<<< HEAD
		$req = $this->db->query('UPDATE answers SET report = ?, datereport = NULL WHERE id = ?',
=======
		$req = $this->bdd->query('UPDATE answers SET report = ?, datereport = NULL WHERE id = ?',
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		                        [0, $answer->getId()]
		                        );
	

	}

	public function getListadmin()
	{
		$answersadmin = [];

<<<<<<< HEAD
		$req = $this->db->query('SELECT id, pseudo, answer, DATE_FORMAT(dateanswer, \'%d/%m/%Y à %Hh%imin\') AS dateanswer, report FROM answers WHERE                             id_comment = ? ORDER BY report DESC, id DESC',
=======
		$req = $this->bdd->query('SELECT id, pseudo, answer, DATE_FORMAT(dateanswer, \'%d/%m/%Y à %Hh%imin\') AS dateanswer, report FROM answers WHERE                             id_comment = ? ORDER BY report DESC, id DESC',
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		                        [$_GET['id']]
		                        );
		

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$answersadmin[] = new Answers($donnees);
		}

		return $answersadmin;
	}

	public function getList()
	{
		$answers = [];

<<<<<<< HEAD
		$req = $this->db->query('SELECT id, pseudo, answer, DATE_FORMAT(dateanswer, \'%d/%m/%Y à %Hh%imin\') AS dateanswer, report FROM answers WHERE                             id_comment = ? ORDER BY id', 
=======
		$req = $this->bdd->query('SELECT id, pseudo, answer, DATE_FORMAT(dateanswer, \'%d/%m/%Y à %Hh%imin\') AS dateanswer, report FROM answers WHERE                             id_comment = ? ORDER BY id', 
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
	                        	[$_GET['id']]
		                        );

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$answers[] = new Answers($donnees);
		}

		return $answers;
	}

	public function getListtotal()
	{
		$answerstotal = [];

<<<<<<< HEAD
		$req = $this->db->query('SELECT id, pseudo, answer, DATE_FORMAT(dateanswer, \'%d/%m/%Y à %Hh%imin\') AS dateanswer, report, id_comment FROM answers ORDER BY report DESC, id DESC');
=======
		$req = $this->bdd->query('SELECT id, pseudo, answer, DATE_FORMAT(dateanswer, \'%d/%m/%Y à %Hh%imin\') AS dateanswer, report, id_comment FROM answers ORDER BY report DESC, id DESC');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
     

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$answerstotal[] = new Answers($donnees);
		}

		return $answerstotal;
	}

	public function getListreports()
	{
		$answerstotalreports = [];

<<<<<<< HEAD
		$req = $this->db->query('SELECT id, pseudo, answer, report, id_post, datereport, DATE_FORMAT(dateanswer, "%d/%m/%Y à %Hh%imin") AS dateanswer FROM answers ORDER BY datereport DESC LIMIT 0,5');
=======
		$req = $this->bdd->query('SELECT id, pseudo, answer, report, id_post, datereport, DATE_FORMAT(dateanswer, "%d/%m/%Y à %Hh%imin") AS dateanswer FROM answers ORDER BY datereport DESC LIMIT 0,5');
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
    

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$answerstotalreports[] = new Answers($donnees);
		}

		return $answerstotalreports;
	}

	public function getUnique()
    {
       
<<<<<<< HEAD
      $req = $this->db->query('SELECT id, pseudo, answer, DATE_FORMAT(dateanswer, \'%d/%m/%Y à %Hh%imin\') AS dateanswer, report, id_comment FROM answers                      WHERE id = ?',
                                [$_GET['idrep']]
                                );
      $donnees = $req->fetch(PDO::FETCH_ASSOC);

           $answerunique = new Answers($donnees);
    
      
=======
      $req = $this->bdd->query('SELECT id, pseudo, answer, DATE_FORMAT(dateanswer, \'%d/%m/%Y à %Hh%imin\') AS dateanswer, report, id_comment FROM answers                      WHERE id = ?',
                                [$_GET['idrep']]
                                );
     
      $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Answers');
      $answerunique = $req->fetch();
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
      return $answerunique;

    }

	public function update(Answers $answer)
	{
<<<<<<< HEAD
		$req = $this->db->query('UPDATE answers SET pseudo = ?, answer = ? WHERE id= :id',
=======
		$req = $this->bdd->query('UPDATE answers SET pseudo = ?, answer = ? WHERE id= :id',
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
		                        [$answer->getPseudo(), $answer->getAnswer()]
		                        );

	}

	public function delete(Answers $answer)
	{
<<<<<<< HEAD
		$this->db->exec('DELETE FROM answers WHERE id = '.$answer->getID());
	}

	
=======
		$this->bdd->exec('DELETE FROM answers WHERE id = '.$answer->getID());
	}

	public function setBDD($bdd)
	{
		$this->bdd = $bdd;
	}
>>>>>>> d509a76cae10964e08a7609029b60d7e11662eb4
}