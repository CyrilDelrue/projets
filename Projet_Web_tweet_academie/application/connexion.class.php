<?php

namespace MyFramework;

Class Connexion 
{
	private static $connexion = null;
	private $host = "localhost;dbname=tweet";
	private $dbname = "tweet";
	private $username = "root";
	private $password = "8765GxAx@";
	private $pdo = null;
	public $retour;

	private function __construct()
	{
		$this->pdo = new \PDO("mysql:".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
	}

	public static function getConnexion()
	{
		if (is_null(self::$connexion))
		{
			self::$connexion = new self();
		}
		return self::$connexion;
	} 

	public function request($query, $my_array = null)
	{

		$my_request = $this->pdo->prepare($query);
		$my_request->execute();
		$retour = $my_request->fetchAll(\PDO::FETCH_ASSOC);
		$this->retour = $retour;
		return $this->retour;
	}
}
?>