<?php
class Answers
{

	private $id;
	private $pseudo;
	private $dateanswer;
	private $answer;
	private $id_comment;
	private $report;
	private $datereport;

	public function __construct($value = [])
	{
		if (!empty($value))
		{

			$this->hydrate($value);
		}
	}

	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value)
		{
			$method = 'set'.ucfirst($key);
		
			if (method_exists($this, $method)) 
			{
			$this->$method($value);
			}
		}
	}

	public function setID($id)
	{

		$id = (int) $id;

			if ($id > 0)
			{
				$this->id = $id;
			}

	}

	public function getID()
	{
		return $this->id;
	}

	public function setPseudo($pseudo)
	{
		if (is_string($pseudo))
		{
			$this->pseudo = $pseudo;
		}
	}

	public function getPseudo()
	{
		return $this->pseudo;
	}

	public function setAnswer($answer)
	{
		if(is_string($answer))
		{
			$this->answer = $answer;
		}
	}

	public function getAnsweranswer()
	{
		return $this->answer;
	}

	public function setDateanswer($dateanswer)
	{
		$this->dateanswer = $dateanswer;
	}

	public function getDateanswer()
	{
		return $this->dateanswer;
	}

	public function setId_comment($id_comment)
	{
		$id_comment = (int) $id_comment;

		if ($id_comment > 0) 
		{
			$this->id_comment = $id_comment;
		}
	}

	public function getId_comment()
	{
		return $this->id_comment;
	}

	public function setReport($report)
	{
		$report = (int) $report;

		if ($report > 0)
		{
			$this->report = $report;
		}
	}

	public function getReport()
	{
		return $this->report;
	}
	
	public function setDatereport($datereport)
	{
			$this->datereport = $datereport;
		
	}

	public function getDatereport()
	{
		return $this->datereport;
	}


}