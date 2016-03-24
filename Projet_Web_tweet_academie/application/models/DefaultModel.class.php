<?php

namespace MyFramework;

class DefaultModel extends Core
{
	public function getLogin()
	{
		return "Moi Ahaha";
	}

	public function getUrl()
	{
		return $_SERVER['REQUEST_URI'];
	}

	public function subscribe($tab)
	{
		$value = [
		'pseudo' => $tab['pseudo'],
		'name' => $tab['name'],
		'password' => $tab['password'],
		'mail' => $tab['mail'],
		'profil_image' => '/Projet_Web_tweet_academie/static/upload/55b90c0a05420.png',
		];
		$param = implode(",", array_keys($value));
		$values = implode('","', $value);
		$request = 'INSERT INTO members ('.$param.') VALUES ("'. $values .'");';
		Connexion::getConnexion()->request($request);
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
		$request = 'SELECT id, pseudo, password, profil_image FROM members WHERE
		 pseudo="'.$id.'";';
		$retour = Connexion::getConnexion()->request($request);
		return $retour;
	}
}
?>