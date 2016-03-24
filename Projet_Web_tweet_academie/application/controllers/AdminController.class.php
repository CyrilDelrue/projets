<?php
namespace MyFramework;

class AdminController extends AdminModel
{
	public function ProfilAction()
	{
		if (isset($_SESSION['pseudo']))
		{
			$info = $this->search_info();
			$this->render(['url' => $this->getUrl(), 'rep' => '', 'name' => $info[0]['name'],
			 'mail' => $info[0]['mail'], 'pseudo' => $info[0]['pseudo'], 'description' =>
			  $info[0]['description'], 'location' => $info[0]['location'],
			 'img' => $info[0]['profil_image'], 'id' => $info[0]['id']]);
			if (isset($_POST['save']))
			{
				$this->render(['url' => $this->getUrl(), 'rep' => '', 'name' => $info[0]['name'],
				'mail' => $info[0]['mail'], 'pseudo' => $info[0]['pseudo'], 'description' => 
				$info[0]['description'], 'location' => $info[0]['location'],
			 'img' => $info[0]['profil_image'], 'id' => $info[0]['id'], 'rep' => $this->modif()]);
			}
			if (isset($_POST['deco']))
			{
				$this->render(['' => $this->deco()]);
			}
		}
		else
		{
			header('Location: /Projet_Web_tweet_academie/default/connexion');
		}
	}

	public function UploadAction()
	{
		if($_FILES){

			$my_rep = $this->verif_img();
			if (isset($my_rep[0]['profil_image']) && $my_rep[0]['profil_image'] !== ""
				&& file_exists($_SERVER['DOCUMENT_ROOT'].$my_rep[0]['profil_image']) && 
				$my_rep[0]['profil_image'] !== 
				"/Projet_Web_tweet_academie/static/upload/55b90c0a05420.png") 
			{
				unlink($_SERVER['DOCUMENT_ROOT'].$my_rep[0]['profil_image']);
			}
			$folder = realpath(dirname(dirname(dirname(__FILE__)))).'/static/upload/';
			foreach ($_FILES as $key => $value) {
				$info = new \SplFileInfo($_FILES[$key]['name']);
				$extension = $info->getExtension();
				$_FILES[$key]['name'] = uniqid().".".$extension;
				$folder_two = '/Projet_Web_tweet_academie/static/upload/';	
				$this->insertImg($folder_two.$_FILES[$key]['name']);
				if (is_uploaded_file($_FILES[$key]['tmp_name'])) {
					
					move_uploaded_file($_FILES[$key]['tmp_name'], $folder.$_FILES[$key]['name']);			
				}	
			}
		}
		echo json_encode($_FILES);

	}

	public function modif()
	{
		$tab = [];
		$errorMessage = [
		'pseudo' => 'Le champ pseudo est vide, Merci de le completer.',
		'name' => 'Le champ nom est vide, Merci de le completer.',
		'password' => 'Vous ne pouvez changer votre mot de passe pas un champ vide.',
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
			elseif(empty($value) && !isset($errorMessage[$key]))
			{
				$tab[$key] = $value;
			}
		}
		// $reponse = $this->checked_iden($tab);
		$this->change_info($tab);
		return "Vos modification on été effectuer";
	}

	public function verif_pwd(&$tab, $key, $value, &$errorMessage)
	{
		$salt = "si tu aimes la wac tape dans tes mains";
		if ($key == "password")
		{
			if ($value === $_POST['password_conf'])
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

	public function checked($id)
	{
		$request = 'SELECT pseudo, mail FROM members WHERE pseudo="'.$id.'";';
		$retour = Connexion::getConnexion()->request($request);
		return $retour;
	}

	public function checked_pseudo($id)
	{
		$request = 'SELECT pseudo FROM members WHERE pseudo="'.$id.'";';
		$retour = Connexion::getConnexion()->request($request);
		return $retour;
	}

	public function checked_pass($id)
	{
		$request = 'SELECT id, pseudo, password FROM members WHERE pseudo="'.$id.'";';
		$retour = Connexion::getConnexion()->request($request);
		return $retour;
	}

	public function DecoAction()
	{
		session_destroy();
		header('Location: /Projet_Web_tweet_academie/default/connexion');
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