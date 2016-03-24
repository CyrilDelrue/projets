<?php
include_once('model/connect.class.php');
$reponse;
Class ControlConnexion
{
	
	public $act;
	public function verif()
	{
		if (!empty($_POST['verif_login']) && !empty($_POST['verif_pwd'])) 
		{
			$foo = new Connect();
			$pwd = $foo->search_pwd()[0]['pwd'];
			if (is_array($foo->search_login()) && $_POST['verif_login'] == $foo->search_login()[0]["login"])
			{
				if(is_array($foo->search_pwd()) && password_verify($_POST['verif_pwd'], $pwd) && $foo->getLogin() == $foo->search_pwd()[0]["login"])
				{
					$_SESSION['pseudo'] = $foo->search_pwd()[0]['login'];
					$_SESSION['level'] = $foo->search_pwd()[0]['id_level'];
					$_SESSION['id'] = $foo->search_pwd()[0]['id_user']; 
  					header('Location: ./admin');
				}
				else
				{
					 return '<div id="look_connexion">Mot de passe non-valide</div>';
				}
			}
			else
			{
				return '<div id="look_connexion">Le nom d\'utilisateur ou le mot de passe est incorrect</div>';
			}
		}
		else if(!empty($_POST))
		{
			return '<div id="look_connexion">Mot de passe ou login incorrect</div>';
		}
	}

}
try
{
    $new = new ControlConnexion();
    $reponse = $new->verif();

} 
catch (Exception $e)
{
    echo $e->getMessage(), "\n";
}
include_once('view/connecter.php');
?>