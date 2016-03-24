<?php
namespace MyFramework;

class DefaultController extends DefaultModel
{
	public function defaultAction()
	{
		$this->render(['prenom' => $this->getLogin()]);
	}

	public function ConnexionAction()
	{
		if (!isset($_SESSION['pseudo']) && !isset($_SESSION['id']))
		{
			$this->render(['url' => $this->getUrl(), 'rep' => ""]);
			if (isset($_POST['register-submit']))
			{
				$this->render(['login' => $this->getLogin(), 'url' => $this->getUrl(),
				 'rep' => $this->subscribeMembre()]);
			}
			elseif(isset($_POST['login-submit']))
			{
				$this->render(['url' => $this->getUrl(), 'rep' => $this->connexion()]);
			}
		}
		else
		{
			header('Location: /Projet_Web_tweet_academie/admin/profil');
		}
	}

	public function subscribeMembre()
	{
		$tab = [];
		$salt = "si tu aimes la wac tape dans tes mains";
		$errorMessage = [
		'pseudo' => 'Le champ pseudo est vide, Merci de le completer.',
		'name' => 'Le champ nom est vide, Merci de le completer.',
		'password' => 'Le champs password est vide, Merci de le completer.',
		'password1' => 'Les deux mot de passe ne sont pas identique'
		];
		foreach ($_POST as $key => $value)
		{
			if (empty($value) && isset($errorMessage[$key]))
			{
				return $errorMessage[$key];
			}
			elseif(!empty($value))
			{
				$this->verif_pwd($tab, $key, $value, $errorMessage);
			}
		}
		$reponse = $this->checked_iden($tab);
		return $reponse;
	}

	public function verif_pwd(&$tab, $key, $value, &$errorMessage)
	{
		$salt = "si tu aimes la wac tape dans tes mains";
		if ($key == "password")
		{
			if ($value === $_POST['conf_pwd'])
			{
				$pwd = hash('ripemd160', $this->security_bdd($value).$salt);
				$tab[$key] = $pwd;
			}
			else
			{
				return $errorMessage['password1'];
			}
		}
		elseif($key != "conf_pwd")
		{
			$tab[$key] = $this->security_bdd($value);
		}
	}

	public function checked_iden($array)
	{
		$iden = $this->checked($array['pseudo']);
		foreach ($iden as $key => $value)
		{
			foreach($value as $k => $v)
			{
				if ($v == $array[$k])
				{
					$text = "Le ".$k." que vous avez entrée est deja prit par un autre utilisateur,";
					$text .= "Merci d'en choisir un autre"; 
					return  $text;
				}
			}
		}
		parent::subscribe($array);
		return "Votre compte a été crée avec succés.";
	}

	public function connexion()
	{
		$reponse = "";
		$salt = "si tu aimes la wac tape dans tes mains";
		$pseudo = $this->security_bdd($_POST['pseudo']);
		$pass = hash('ripemd160', $this->security_bdd($_POST['password']).$salt);
		if (!empty($pseudo) && !empty($pass)) 
		{
			$reponse = $this->check_pwd($pseudo,$pass);
		}
		else
		{
			$reponse = "Mot de passe ou login incorrect";
		}
		return $reponse;
	}
	public function check_pwd($pseudo, $pass)
	{
		$check = $this->checked_pseudo($pseudo);
		if (is_array($check) && isset($check[0]['pseudo']) && 
			$pseudo == $check[0]["pseudo"])
		{
			$search_pwd =  $this->checked_pass($check[0]['pseudo']);
			if(is_array($search_pwd) && $pass === $search_pwd[0]['password'] && 
				$pseudo == $search_pwd[0]["pseudo"])
			{
					// if ($foo->search_pwd()[0]["active"] == "true")
					// {
				$_SESSION['pseudo'] = $search_pwd[0]['pseudo'];
				$_SESSION['id'] = $search_pwd[0]['id']; 
				$_SESSION['image'] = $search_pwd[0]['profil_image']; 
				header('Location: ../admin/profil');
			}
			else
			{
				return "Mot de passe non-valide";
			}
		}
		else
		{
			return 'Le nom d\'utilisateur ou le mot de passe est incorrect';
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
}
?>