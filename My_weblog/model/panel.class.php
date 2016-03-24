<?php
include_once('connexion.class.php');
Class Panel
{
	private $id;
	private $login;
	private $email;
	private $date;
	private $sexe;
	private $rang;
	public $membre_rang;
	public $sexe_user;


	public function membre()
	{
		$request = 'SELECT id_user, login, email, date_inscription, sexe, id_level AS Rang FROM users;';
		$retour = (Connexion::getConnexion()->request($request));
		return $retour;
	}

	public function billet()
	{
		$request_billet = 'SELECT id_billet, users.login, created, updated, title, content FROM billet 
		INNER JOIN users ON users.id_user = billet.id_user;';
		$retour_billet = (Connexion::getConnexion()->request($request_billet));
		return $retour_billet;

	}

	public function billet_blog()
	{
		$request_billet = 'SELECT id_billet, users.login, created, updated, title, content FROM billet 
		INNER JOIN users ON users.id_user = billet.id_user WHERE users.id_user='.$_SESSION['id'].';';
		$retour_billet = (Connexion::getConnexion()->request($request_billet));
		return $retour_billet;
	}

	public function com()
	{
		$request_com = 'SELECT id, id_billet, users.login, content, date FROM commentaire
		 INNER JOIN users ON users.id_user = commentaire.id_user;';
		$retour_com = (Connexion::getConnexion()->request($request_com));
		return $retour_com;

	}

	public function com_blog()
	{
		$request_com = 'SELECT id, id_billet, users.login, content, date FROM commentaire
		 INNER JOIN users ON users.id_user = commentaire.id_user WHERE users.id_user='.$_SESSION['id'].';';
		$retour_com = (Connexion::getConnexion()->request($request_com));
		return $retour_com;

	}

	public function com_user()
	{
		$request_com = 'SELECT id, id_billet, users.login, content, date FROM commentaire
		 INNER JOIN users ON users.id_user = commentaire.id_user WHERE users.id_user='.$_SESSION['id'].';';
		$retour_com = (Connexion::getConnexion()->request($request_com));
		return $retour_com;

	}

	public function update_user()
	{
		$this->setId($this->security_bdd($_POST['id']));
		$this->setLogin($this->security_bdd($_POST['login']));
		$this->setEmail($this->security_bdd($_POST['email']));
		$this->setDate($this->security_bdd($_POST['date']));
		$this->setSexe($this->security_bdd($_POST['f_or_m']));
		$this->setRang($this->security_bdd($_POST['users']));
		if ($this->getRang() != "Changer Droit")
		{
			$request_user = $this->search_rang();
		}
		if ($this->getSexe() != "Sexe")
		{
			$request_user = $this->search();
		}
		if($this->getRang() != "Changer Droit" && $this->getSexe() != "Sexe")
		{
			$request_user = 'UPDATE users SET login="' . $this->getLogin() . '", email="'. 
			$this->getEmail() .'", date_inscription ="'.$this->getDate() .'", sexe="'. $this->sexe_user .'
			", id_level="'. $this->membre_rang .'" WHERE id_user = "'. $this->getId() .'" && id_user > 1;';
		}
		elseif ($this->getRang() == "Changer Droit" && $this->getSexe() == "Sexe")
		{
			$request_user = 'UPDATE users SET login="' . $this->getLogin() . '", email="'.
			$this->getEmail() .'", date_inscription ="'.
			$this->getDate() .'" WHERE id_user = "'. $this->getId() .'" && id_user > 1;';
		}
		Connexion::getConnexion()->request($request_user);
	}

	public function search_rang()
	{
		$request_rang = 'SELECT * FROM level WHERE nom="'.$this->getRang().'";';
		$retour_billet = (Connexion::getConnexion()->request($request_rang));
		$this->membre_rang = $retour_billet[0]['id_level'];	
		$request_user = 'UPDATE users SET login="' . $this->getLogin() . '", email="'. $this->getEmail() .
		'", date_inscription ="'.$this->getDate() .'", id_level="'. $this->membre_rang .
		'" WHERE id_user = "'. $this->getId() .'" && id_user > 1;';
		return $request_user;
	}

	public function search()
	{
		$this->sexe_user = $this->getSexe();
		$request_user = 'UPDATE users SET login="' . $this->getLogin() . '", email="'.
		$this->getEmail() .'", date_inscription ="'.
		$this->getDate() .'", sexe="'. $this->sexe_user .'" WHERE id_user = "'. $this->getId() .'"
		&& id_user > 1;';
		return $request_user;
	}


	public function delete_user()
	{
		$this->setId($this->security_bdd($_POST['id']));
		$request_del = 'DELETE FROM users WHERE id_user ="'. $this->getId().'" && id_user > 1;';
		Connexion::getConnexion()->request($request_del);
	}

	public function delete_billet()
	{
		$this->setId($this->security_bdd($_POST['id']));
		$request_del = 'DELETE FROM billet WHERE id_billet ="'. $this->getId().'";';
		Connexion::getConnexion()->request($request_del);
	}

	public function delete_com()
	{
		$this->setId($this->security_bdd($_POST['id']));
		$request_del = 'DELETE FROM commentaire WHERE id ="'. $this->getId().'";';
		Connexion::getConnexion()->request($request_del);
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

	public function getId()
	{
		return $this->id;
	}

	public function getLogin()
	{
		return $this->login;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getDate()
	{
		return $this->date;
	}

	public function getSexe()
	{
		return $this->sexe;
	}

	public function getRang()
	{
		return $this->rang;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setLogin($login)
	{
		$this->login = $login;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}
	
	public function setDate($date)
	{
		$this->date = $date;
	}

	public function setSexe($sexe)
	{
		$this->sexe = $sexe;
	}

	public function setRang($rang)
	{
		$this->rang = $rang;
	}
}

?>