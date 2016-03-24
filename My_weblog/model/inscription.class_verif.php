<?php
include_once('connexion.class.php');
Class Inscription
{
	public $retour;
	public $reponse;
	private $pwd;
	private $pwd_confirm;
	private $login;
	private $email;
	private $date_naissance;
	private $sexe;

	public function __construct()
	{
		$this->setPwd($this->security_bdd($_POST['pwd']));
		$this->setPwdConfirm($this->security_bdd($_POST['pwd_confirm']));
		$this->setLogin($this->security_bdd($_POST['login']));
		$this->setEmail($this->security_bdd($_POST['email']));
		$this->setDateNaissance($this->security_bdd($_POST['date_naissance']));
		$this->setSexe($this->security_bdd($_POST['f_or_m']));
	}

	public function subscribe()
	{
		if ($this->getPwd() === $this->getPwdConfirm() && null !== $this->getLogin()
		 && null !== $this->getEmail() && $this->getDateNaissance() != "0000-00-00" && 
			$this->getSexe() != "Selectionnez votre sexe..." && $this->getPwd() != "")
		{
			$hash = password_hash($this->getPwd(), PASSWORD_DEFAULT);
			$request = 'INSERT INTO users(login, pwd, email, date_naissance, sexe, id_level) VALUES 
			("'.$this->getLogin().'", "'.$hash.'", "'.$this->getEmail().'", "'.
			$this->getDateNaissance().'", "'.$this->getSexe().'", 3);';
			$this->retour = Connexion::getConnexion()->request($request);
			$this->reponse = '<div id="look">Vous avez bien crée votre compte <a href="connexion">';
			$this->reponse .= " Cliquer sur ce lien pour pouvoir vous conneceter</a></div>";
			return $this->reponse;
		}
		else if($this->getPwd() != $this->getPwdConfirm() )
		{
			$this->reponse = '<div id="look">Vos deux mot de passe ne sont pas identique</div>';
			return $this->reponse;
		}
		elseif (!null !== $this->getLogin() || !null !== $this->getEmail() || null !== $this->getPwd()
			|| $this->getDateNaissance() == "0000-00-00" || 
			$this->getSexe() == "Selectionnez votre sexe...")
		{
			$this->reponse = '<div id="look">Un des champs n\'a pas éte correctement remplie</div>';
			return $this->reponse;	
		}
	}

	public function security_bdd($str)
	{
		 if(ctype_digit($str))
        {
            $string = intval($str);
        }
        else
		{
            $str = addcslashes($str, '%_');
        }
        return $str;
	}

	public function getPwd()
	{
		return $this->pwd;
	}

	public function getPwdConfirm()
	{
		return $this->pwd_confirm;
	}

	public function getLogin()
	{
		return $this->login;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getDateNaissance()
	{
		return $this->date_naissance;
	}

	public function getSexe()
	{
		return $this->sexe;
	}

	public function setPwd($pwd)
	{
		$this->pwd = $pwd;
	}

	public function setPwdConfirm($confirm)
	{
		$this->pwd_confirm = $confirm;
	}

	public function setLogin($login)
	{
		$this->login = $login;
	}
	
	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setDateNaissance($date)
	{
		$this->date_naissance = $date;
	}

	public function setSexe($sexe)
	{
		$this->sexe = $sexe;
	}
}
?>