<?php
include_once('connexion.class.php');

class billet
{
	public $id_user;
	public $login;
	public $titre;
	public $contenu;
	public $tag;
	public $id_billet;
	public $nbrPage = 4;
	public $courantPage = 1;
	public $result;
	

	public function search_art()
	{

		$request = "SELECT billet.id_billet FROM billet ORDER BY updated DESC LIMIT 1;";
		$data = Connexion::getConnexion()->request($request);
		return $data;
	}

	

	public function AfficherNews() 
	{
		if (!empty($_GET['billet'])) {
			$request = "SELECT * FROM billet INNER JOIN users ON 
		users.id_user = billet.id_user WHERE billet.id_billet = ".$_GET['billet']."";
		$data = Connexion::getConnexion()->request($request);
		return $data;
		}
		else {

			if (isset($_GET['page'])){
			$this->courantPage = $_GET['page'];	
			}
			$request = "SELECT id_billet, title, content, updated, users.login, billet.id_billet FROM billet INNER JOIN
			 users ON users.id_user = billet.id_user ORDER BY updated DESC LIMIT ".
			(($this->courantPage-1)*$this->nbrPage)."," . $this->nbrPage . ";";
			$data = Connexion::getConnexion()->request($request);
			$pagination = "SELECT count(*) AS 'nbrArticle' FROM billet";
			$dataPage = Connexion::getConnexion()->request($pagination);
			$nbrArticle = $dataPage[0]['nbrArticle'];
			$this->result = ceil($nbrArticle/$this->nbrPage);
			return $data;
		}
	}

	public function tags($id)
	{
		if (!is_array($id)) 
		{
		
		$request = 'SELECT title, content, updated, users.login, billet.id_billet, tags.nom FROM billet INNER JOIN users
		 ON users.id_user = billet.id_user INNER JOIN tags_billet ON tags_billet.id_billet = billet.id_billet
		  INNER JOIN tags ON tags.id_tag = tags_billet.id_tag WHERE billet.id_billet=' . $id . ' ORDER BY updated DESC;';
		$data = Connexion::getConnexion()->request($request);
		return $data;
		}
	}

	public function AfficherCom()
	{
		if (isset($_GET['pageC']))
		{
			$this->courantPage = $_GET['pageC'];
		}
		$request = "SELECT * FROM commentaire INNER JOIN users 
		ON users.id_user = commentaire.id_user WHERE commentaire.id_billet = ".
		$_GET['billet']." ORDER BY date DESC LIMIT "
		.(($this->courantPage-1)*$this->nbrPage)."," . $this->nbrPage . "; ";
		$data = Connexion::getConnexion()->request($request);

		$pagination = "SELECT count(id) AS 'nbrArticle' FROM commentaire INNER JOIN billet 
		ON billet.id_billet = commentaire.id_billet WHERE commentaire.id_billet = ".
		$_GET['billet'];
		$dataPage = Connexion::getConnexion()->request($pagination);
		$nbrArticle = $dataPage[0]['nbrArticle'];
		
		$this->resultCom = ceil($nbrArticle/$this->nbrPage);

		return $data;
	}

	public function insertCom($contenu)
	{
		$this->contenu = $this->security_bdd($contenu);		
		$request = "INSERT INTO commentaire (id_billet, id_user,content) 
		VALUES (".$_GET['billet'].",'2','" . $this->contenu . "');";
		$data = Connexion::getConnexion()->request($request);
	}
	

	public function insertBillet($titre, $contenu)
	{
		$this->titre = $this->security_bdd($titre);
		$this->contenu = $this->security_bdd($contenu);

		$request = 'INSERT INTO billet (id_user, created, 
		updated, title, content) VALUES ("'. $_SESSION['id'] .'", CURRENT_TIMESTAMP,
		CURRENT_TIMESTAMP, "' . $this->titre . '", "' . $this->contenu . '");';
		
		$data = Connexion::getConnexion()->request($request);

	}

	public function insert_tag($tags, $id_news)
	{
		$request = "INSERT INTO tags_billet (id_tag, id_billet) 
		VALUES ('" . $tags . "' , '" . $id_news . "');";
		
		$data = Connexion::getConnexion()->request($request);
	}

	public function AfficherTags()
	{
		$request = "SELECT * FROM tags";
		$data = Connexion::getConnexion()->request($request);
		return $data;
	}

	public function ShowSelectTag($id_tag)
	{

		$this->id_tag = $id_tag;
		$request = "SELECT * from billet INNER JOIN tags_billet 
		ON tags_billet.id_billet INNER JOIN tags ON tags.id_tag = tags_billet.id_tag 
		WHERE tags_billet.id_tag = " . $this->id_tag ." ORDER BY updated DESC LIMIT ".
			(($this->courantPage-1)*$this->nbrPage)."," . $this->nbrPage . ";";
		$data = Connexion::getConnexion()->request($request);
		$pagination = "SELECT count(id) AS 'nbrArticle' FROM billet INNER JOIN tags_billet 
		ON tags_billet.id_billet INNER JOIN tags ON tags.id_tag = tags_billet.id_tag 
		WHERE tags_billet.id_tag = " . $this->id_tag;
		$dataPage = Connexion::getConnexion()->request($pagination);
		$nbrArticle = $dataPage[0]['nbrArticle'];
		
		$this->result = ceil($nbrArticle/$this->nbrPage);
		return $data;
	}

	public function aff_text()
	{
		$id = $this->security_bdd($_POST['id']);
		$request = 'SELECT title, content FROM billet WHERE id_billet="' . $id . '";';
		$data = Connexion::getConnexion()->request($request);
		return $data; 
	}

	public function modif_art()
	{
		$titre = $this->security_bdd($_POST['titre']);
		$content = $this->security_bdd($_POST['contenu']);
		$request = 'UPDATE billet SET titre="'.$titre.'", content="'.$content.'" WHERE id_billet="'.$_POST['id'].'";';
		$data = Connexion::getConnexion()->request($request);
		return $data;
	}

	public function search_tag()
	{
		$request = 'SELECT * FROM billet INNER JOIN tags_billet ON tags_billet.id_billet = billet.id_billet INNER JOIN tags ON 
		tags_billet.id_tag = tags.id_tag INNER JOIN users WHERE tags.nom="'.$_GET['tag'].'" GROUP BY tags_billet.id_billet ;';
		$data = Connexion::getConnexion()->request($request);
		var_dump($request);
		return $data;
	}

	public function security_bdd($str)
	{
		 if(ctype_digit($str))
        {
            $string = intval($str);
        }
        else
		{
            $str = htmlspecialchars($str);
            $str = addcslashes($str, '%_');
        }
        return $str;
	}
}
?>