<?php
include_once('connexion.class.php');
Class Inscription
{
	public $retour;
	public $reponse;

	public function subscribe()
	{
		if ($_POST['pwd'] === $_POST['pwd_confirm'])
		{
			$hash = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
			$request = 'INSERT INTO users(login, pwd, email, date_naissance, sexe, id_level) VALUES ("'.$_POST['login'].'",
			 "'.$hash.'", "'.$_POST['email'].'", "'.$_POST['date_naissance'].'", "'.$_POST['f_or_m'].'", 3);';
			$this->retour = Connexion::getConnexion()->request($request);
			$this->reponse = "Vous avez bien crée votre compte";
			return $this->reponse;
		}
		else
		{
			$this->reponse = "Vos deux mot de passe ne sont pas identique";
			return $this->reponse;
		}
		
	}
}
?>