<?php

namespace MyFramework;

class ProfilModel extends Core
{
	public function getUser()
	{
		return $_SERVER['PATH_INFO'];
	}

	public function getMembers($pseudo)
	{
		$request = 'SELECT id, pseudo, name, description, date_registration, location, 
		profil_image, mail FROM members WHERE pseudo="'.$pseudo.'";';
		$retour = Connexion::getConnexion()->request($request);
		return $retour;
	}

	public function new_following($id)
	{
		$value = [
		'id_member' => '"'.$_SESSION['id'].'"',
		'id_follower' => '"'.$id.'"',
		'date' => 'CURRENT_TIMESTAMP'
		];
		$param = implode(",", array_keys($value));
		$values = implode(',', $value);
		$request = 'INSERT INTO followers ('.$param.') VALUES ('.$values.');';
		Connexion::getConnexion()->request($request);
	}

	public function verif_following()
	{
		$request = 'SELECT id_member, id_follower FROM followers WHERE
		 id_member='.$_SESSION['id'].';';
		$retour = Connexion::getConnexion()->request($request);
		return $retour;
	}

	public function count_follow($id)
	{
		$retour = [];
		$request = 'SELECT COUNT(id) AS count_following FROM members INNER JOIN followers
		 ON members.id = followers.id_follower WHERE id_member='.$id.';';
		$request_two = 'SELECT COUNT(followers.id_follower) AS count_follower FROM
		 members INNER JOIN followers ON members.id = followers.id_member WHERE
		  id_follower='.$id.';';
		$request_three = 'SELECT COUNT(id_tweet) AS count_tweet FROM tweets 
		WHERE id_member='.$id.';';
		$retour_one = Connexion::getConnexion()->request($request);
		$retour_two = Connexion::getConnexion()->request($request_two);
		$retour_three = Connexion::getConnexion()->request($request_three);
		$retour['following'] = $retour_one[0]['count_following'];
		$retour['followers'] = $retour_two[0]['count_follower'];
		$retour['nbr_tweet'] = $retour_three[0]['count_tweet'];
		return $retour;
	}

	public function show_following($id)
	{
		$request = 'SELECT members.pseudo, members.description, members.profil_image FROM
		 members INNER JOIN followers ON members.id = followers.id_follower
		  WHERE id_member='.$id.';';
		$retour = Connexion::getConnexion()->request($request);
		return $retour;
	}

	public function show_follower($id)
	{
		$request = 'SELECT * FROM members INNER JOIN followers ON members.id = 
		followers.id_member WHERE id_follower='.$id.';';
		$retour = Connexion::getConnexion()->request($request);
		return $retour;
	}

	public function check_pseudo_exists($pseudo)
	{
		$request = 'SELECT pseudo FROM members WHERE pseudo="'.$pseudo.'"';
		$retour = Connexion::getConnexion()->request($request);
		return $retour;
	}

}
?>