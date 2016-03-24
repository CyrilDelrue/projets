<?php

namespace MyFramework;

class AdminModel extends Core
{

	public function getUrl()
	{
		return $_SERVER['REQUEST_URI'];
	}

	public function change_info($array)
	{
		$test = "";
		$value = [
		'pseudo' => $array['pseudo'],
		'name' => $array['name'],
		'password' => $array['password'],
		'mail' => $array['mail'],
		'description' => $array['description'],
		'location' => $array['location'],
		];

		$request = 'UPDATE members SET pseudo="'.$value['pseudo'].'", 
		name="'.$value['name'].'", password="'.$value['password'].'",
		 mail="'.$value['mail'].'", description="'.$value['description'].'",
		  location="'.$value['location'].'" WHERE id="'.$_SESSION['id'].'";';
		Connexion::getConnexion()->request($request);
	}

	public function verif_img()
	{
		$request = 'SELECT profil_image FROM members WHERE id="'.$_SESSION['id'].'";';
		$retour = Connexion::getConnexion()->request($request);
		return $retour;
	}

	public function search_info()
	{
		$request = 'SELECT id, pseudo, name, mail, description, location, profil_image
		 FROM members WHERE id="'.$_SESSION['id'].'";';
		$retour = Connexion::getConnexion()->request($request);
		return $retour;
	}

	public function insertImg($img)
	{
		$request = 'UPDATE members SET profil_image="'.$img.'" WHERE
		 id='.$_SESSION['id'].';';
		Connexion::getConnexion()->request($request);
	}
}
?>