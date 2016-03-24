<?php

namespace MyFramework;

class TweetModel extends Core
{
	public $nameTagLike;
	public $nameIdLike;

	public function getUrl()
	{
		return $_SERVER['REQUEST_URI'];
	}

	public function InsertTweet($param)
	{
		$value = '"' . implode('","', $param) . '"';
		$key = implode(',', array_keys($param));
		$request = 'INSERT INTO tweets ('. $key .') VALUES (' . $value . ')';
		$data = Connexion::getConnexion()->request($request);
	}

	public function checkTag($id)
	{
		$request = "SELECT * FROM tweets WHERE id_member = ".$id." ORDER BY date 
		DESC LIMIT 1 ";
		$data = Connexion::getConnexion()->request($request);
	
		return $data;
	}
	

	public function InsertHashtag($hashtag,$id)
	{
		$request = "INSERT INTO tags (id_tweet,tag) VALUES 
		('" . $id . "','" . $hashtag . "')";
		$data = Connexion::getConnexion()->request($request);
	}

	public function InsertPicture($image,$id)
	{
		$request = "INSERT INTO pictures (id_tweet, image) VALUES 
		('" . $id . "','" . $image . "')";
		$data = Connexion::getConnexion()->request($request);
	}
	public function InsertIdentification($id_member, $id_tweet)
	{
		$request = "INSERT INTO identification (id_member, id_tweet) VALUES
		 ('" . $id_member . "','" . $id_tweet . "')";
		$data = Connexion::getConnexion()->request($request);
	}
	public function showTweet()
	{
		$request = "SELECT tweets.id_tweet, tweets.date, tweets.content, 
		members.id, members.pseudo, members.date_registration, members.location,
		members.profil_image FROM tweets INNER JOIN members ON members.id 
		= tweets.id_member ORDER BY date DESC";
		$data = Connexion::getConnexion()->request($request);
		return $data;		
	}

	public function searchHashtag($nameTag)
	{
		// $request = "SELECT * FROM tags INNER JOIN tweets ON tweets.id_tweet = 
		// tags.id_tweet INNER JOIN identification ON identification.id_tweet = 
		// tweets.id_tweet INNER JOIN members ON members.id = tweets.id_member
		//  WHERE tags.tag ='#". $nameTag ."' ORDER BY date DESC";	

		 $request = "SELECT tweets.id_tweet, tweets.date, tweets.content, 
		members.id, members.pseudo, members.date_registration, members.location,
		members.profil_image, pictures.image FROM tweets INNER JOIN members 
		ON members.id = tweets.id_member INNER JOIN pictures ON pictures.id_tweet 
		= tweets.id_tweet INNER JOIN tags ON tags.id_tweet = tweets.id_tweet WHERE
		tags.tag ='#" . $nameTag . "' ORDER BY date DESC";
		$data = Connexion::getConnexion()->request($request);
		return $data;		
	}

	public function searchAllLike($nameTagLike)
	{
		$this->nameTagLike = $nameTagLike;
		$request = "SELECT tweets.id_tweet, tweets.date, tweets.content, 
		members.id, members.pseudo, members.date_registration, members.location,
		members.profil_image FROM tweets INNER JOIN members 
		ON members.id = tweets.id_member INNER JOIN tags ON tags.id_tweet = 
		tweets.id_tweet WHERE tags.tag LIKE '#%" . $this->nameTagLike . "%'
		 OR members.pseudo LIKE '@%" . $this->nameTagLike . "%' ORDER BY date DESC";
		echo $request;
		$data = Connexion::getConnexion()->request($request);
		return $data;
	}

	public function searchImg($id)
	{
		$request = 'SELECT * FROM pictures WHERE id_tweet='.$id.';';
		$data = Connexion::getConnexion()->request($request);
		return $data;
	}

	public function retweet($id_tweet,$_id_member,$date)
	{
		$request = 'INSERT INTO retweets (id_tweet, id_member, date) 
		VALUES ("' . $id_tweet . '","' . $_id_member . '","' . $date . '")';
		$data = Connexion::getConnexion()->request($request);
	}

	public function check_follow($pseudo)
	{
		$implo = implode('","',$pseudo);
		$request = 'SELECT pseudo FROM members WHERE pseudo ="'.$implo.'";';
		//var_dump($request);
		$retour = Connexion::getConnexion()->request($request);
		return $retour;
	}

	public function retweet_insert($array)
	{
		$tab = [
		'id_member' => $_SESSION['id'],
		'date' => 'CURRENT_TIMESTAMP',
		'content' => '"'.$array['pseudo']."   @".$array['pseudo'].$array['text'].'"',
		];
		$param = implode(",", array_keys($tab));
		$values = implode(',', $tab);
		$request = 'INSERT INTO tweets ('.$param.') VALUES ('. $values .');';
		Connexion::getConnexion()->request($request);
		return true;
	}

}
?>