<?php
namespace MyFramework;

class ProfilController extends ProfilModel
{
	public function UserAction()
	{
		$user = $this->show_user();
		$count = $this->count_follow($user[0]['id']);
		$this->render(['name' => $user[0]['name'], 'mail' => $user[0]['mail'],
		 'pseudo' => $user[0]['pseudo'], 'description' => $user[0]['description'],
		  'location' => $user[0]['location'],'img' => $user[0]['profil_image'],
		   'id' => $user[0]['id'], 'following' => $count['following'], 
		'followers' => $count['followers'], 'nbr_tweet' => $count['nbr_tweet']]);
	}

	public function FollowingAction()
	{
		$tab = [];
		foreach ($_POST as $key => $value)
		{
			$tab[$key] = $this->security_bdd($value);
		}
		$following = $this->verif_following();
		if ($following[0]['id_follower'] !== $tab['id'])
		{
			$this->new_following($tab['id']);
			header('Location: ../profil/user/');
		}
		elseif($following[0]['id_follower'] === $tab['id'])
		{
			echo "Vous ne pouvez pas suivre une personne que vous suivez déja";
		}
	}

	public function ShowfollowingAction()
	{
		$id = $this->security_bdd($_POST['id']);
		$rep = $this->show_following($id);
		echo json_encode($rep);
	}

	public function ShowfollowerAction()
	{
		$id = $this->security_bdd($_POST['id']);
		$rep = $this->show_follower($id);
		echo json_encode($rep);
	}

	public function show_user()
	{
		if (isset(self::$url_params[0]) && self::$url_params[0] !== "") 
		{
			$check = $this->check_pseudo_exists(self::$url_params[0]);
			if (is_array($check) && $check[0]['pseudo'] !== "") {
				# code...
			}
			return $this->getMembers(self::$url_params[0]);
		}
		else
		{
			return $this->getMembers($_SESSION['pseudo']);
		}
	}

	public function follow()
	{

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