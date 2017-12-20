<?php

namespace Blog\Model;

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
		                        [$answer->getPseudo(), $answer->getAnswer(), $answer->getId_comment()]
		                        );

	
	}

	public function get($id)
	{
		$req = $this->db->query('SELECT pseudo, answer, DATE_FORMAT(dateanswer, \'%d/%m/%Y à %Hh%imin\') AS dateanswer, report FROM answers ORDER BY id');
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		$req->execute();
	}

	public function report(Answers $answer)
	{
		$req = $this->db->query('UPDATE answers SET report = ?,  datereport = NOW() WHERE id = ?',
		                        [$answer->getReport() + 1, $answer->getId()]
		                        );

	}

	public function deletereport(Answers $answer)
	{
		$req = $this->db->query('UPDATE answers SET report = ?, datereport = NULL WHERE id = ?',
		                        [0, $answer->getId()]
		                        );
	

	}

	public function getListadmin()
	{
		$answersadmin = [];

		$req = $this->db->query('SELECT id, pseudo, answer, DATE_FORMAT(dateanswer, \'%d/%m/%Y à %Hh%imin\') AS dateanswer, report FROM answers WHERE                             id_comment = ? ORDER BY report DESC, id DESC',
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

		$req = $this->db->query('SELECT id, pseudo, answer, DATE_FORMAT(dateanswer, \'%d/%m/%Y à %Hh%imin\') AS dateanswer, report FROM answers WHERE                             id_comment = ? ORDER BY id', 
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

		$req = $this->db->query('SELECT id, pseudo, answer, DATE_FORMAT(dateanswer, \'%d/%m/%Y à %Hh%imin\') AS dateanswer, report, id_comment FROM answers ORDER BY report DESC, id DESC');
     

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$answerstotal[] = new Answers($donnees);
		}

		return $answerstotal;
	}

	public function getListreports()
	{
		$answerstotalreports = [];

		$req = $this->db->query('SELECT id, pseudo, answer, report, id_post, datereport, DATE_FORMAT(dateanswer, "%d/%m/%Y à %Hh%imin") AS dateanswer FROM answers ORDER BY datereport DESC LIMIT 0,5');
    

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
		{
			$answerstotalreports[] = new Answers($donnees);
		}

		return $answerstotalreports;
	}

	public function getUnique()
    {
       
      $req = $this->db->query('SELECT id, pseudo, answer, DATE_FORMAT(dateanswer, \'%d/%m/%Y à %Hh%imin\') AS dateanswer, report, id_comment FROM answers                      WHERE id = ?',
                                [$_GET['idrep']]
                                );
      $donnees = $req->fetch(PDO::FETCH_ASSOC);

           $answerunique = new Answers($donnees);
    
      
      return $answerunique;

    }

	public function update(Answers $answer)
	{
		$req = $this->db->query('UPDATE answers SET pseudo = ?, answer = ? WHERE id= :id',
		                        [$answer->getPseudo(), $answer->getAnswer()]
		                        );

	}

	public function delete(Answers $answer)
	{
		$this->db->exec('DELETE FROM answers WHERE id = '.$answer->getID());
	}

	
}