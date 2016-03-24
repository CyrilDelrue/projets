<?php
include_once('connexion.class.php');
Class Connect
{
	private $login;
	private $pwd;

	public function __construct()
	{
		$this->setLogin($this->security_bdd($_POST['verif_login']));
		$this->setPwd($this->security_bdd($_POST['verif_pwd']));

	}
	

	public function search_login()
	{
		$request_login = 'SELECT login FROM users WHERE login="'.$this->getLogin().'";';
		$retour = (Connexion::getConnexion()->request($request_login));
		return $retour;
	}

	public function search_pwd()
	{
		$request_pwd = 'SELECT id_user, login, pwd, id_level FROM users WHERE login="'.$this->getLogin().'";';
	    $retour_pwd = (Connexion::getConnexion()->request($request_pwd));
	    return $retour_pwd;
	}

	public function security_bdd($str)
	{
		 if(ctype_digit($str))
        {
            $string = intval($str);
        }
        else
		{
            $str = htmlspecialchars($str);
            $str = addcslashes($str, '%_');
        }
        return $str;
	}

	public function getLogin()
	{
		return $this->login;
	}

	public function getPwd()
	{
		return $this->pwd;
	}

	public function setLogin($login)
	{
		$this->login = $login;
	}

	public function setPwd($pwd)
	{
		$this->pwd = $pwd;
	}
}
?>