<?php
namespace MyFramework;

class TweetController extends TweetModel
{

	public $showActualite;
	public $showAll;
	public $img;
	public $result="";

	public function ShowAction()
	{
		$this->render(['url' => $this->getUrl(), 'tweet' => $this->showActualite(), 
		'login' => $_SESSION['pseudo'], 'image' => $_SESSION['image']]);
	}

	public function RetweetAction()
	{
		$tab = [];
		foreach ($_POST as $key => $value)
		{
			if (is_array($value))
			{
				$count = count($value) -1;
				unset($value[$count]);
				$implo = implode("",$value);
				$tab['text'] = $this->LinkHastag($this->security_bdd($implo));
			}
			else
			{
				$tab[$key] = $this->security_bdd($value);
			}
		}
		if($this->retweet_insert($tab) == true)
		{
			echo json_encode($tab);
		}
	}

	public function InserthashtagAction()
	{
		$img = "";
		$date = new \DateTime();
		$dataDate = $date->format('Y-m-d H:i:s');

		if (!empty($_SESSION['id']) && !empty($_POST['message']) || !empty($_POST['file'])) {

			echo json_encode($this->hashtag($dataDate));
		}
		if (empty(parent::showTweet()) && !is_array(parent::showTweet())) {

			echo "Pas de publication ! ";
		}
	}

	public function hashtag($date, $img = "")
	{
		$message = htmlspecialchars($_POST['message']);
		$param = [
		'id_member' => $_SESSION['id'],
		'date' => $date,
		'content' => $message
		];
		$data = parent::InsertTweet($param);
		$position = parent::checkTag($_SESSION['id']);
		preg_match_all("/(#\w+)/", $message, $matches);	
		foreach ($matches[0] as $key => $value)	{
			parent::InsertHashtag($value, $position[0]['id_tweet']);
		}
		parent::InsertIdentification($_SESSION['id'],$position[0]['id_tweet']);
		if (isset($_POST['file']) && $_POST['file'] !== "") {
			parent::InsertPicture($_POST['file'],$position[0]['id_tweet']);
			$img = $_POST['file'];
		}
		$first = $this->LinkHastag($message);
		$two = $this->LinkFollow($first);
		$array = [
		'message' => $two, 
		'date' => $date, 
		'pseudo' => $_SESSION['pseudo'],
		'img' => $img
		];
		return $array;
	}

	public function UploadAction()
	{
		if($_FILES) {

			$folder = realpath(dirname(dirname(dirname(__FILE__)))).'/static/uploadTweet/';
			foreach ($_FILES as $key => $value) {
				
				if (is_uploaded_file($_FILES[$key]['tmp_name'])) {
					$substr = substr(uniqid(), 6);
					
					$finfo = finfo_open(FILEINFO_MIME_TYPE);
					$finfoo = finfo_file($finfo, $_FILES[$key]['tmp_name']);

					$explode = explode('/', $finfoo);
					$result = $folder.$substr.'.'.$explode[1];
					move_uploaded_file($_FILES[$key]['tmp_name'], $folder.$substr.'.'.$explode[1]);				
				}	
			}
		}
		echo json_encode($substr.'.'.$explode[1]);
	}

	public function showActualite()
	{
		$count = 0;
		foreach (parent::showTweet() as $key => $value) {
			$count++;
			$t = '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3">';
			$z = '<div class="info"><h4 class="text-center">'. $value['pseudo'] . '</h4>';
			$this->showActualite .= '<div class="cont' . $count . ' row">';
			$this->showActualite .= $t;
			$this->showActualite .= '<div class="box"><div class="box-icon">';
			$this->showActualite .= '<span class="fa fa-4x fa-html5"></span></div>';
			$this->showActualite .= $z;
			if (!empty($value['content'])) {
				$first = $this->LinkHastag($value['content']);
				$two = $this->LinkFollow($first);
				$this->showActualite .= ' <p>' . $two . '</p>';

			}
			$img = parent::searchImg($value['id_tweet']);
			if(isset($img[0]['image']) && is_array($img))
			{
				$b = '<img class="img" src="'.$img[0]['image'].'" alt="'.$img[0]['image'].'">';
				$this->showActualite .= $b;		
			}
			$this->showActualite .= ' <p><i>Publié le ' . $value['date'] . '</i></p>';
			$this->showActualite .= '<a href="#" class="btn retweet">ReTweete</a>';
			$this->showActualite .= '</div></div></div></div>';

		}
		return $this->showActualite;
	}

	public function verifsearchhashtagAction()
	{
		$searchTag ="";
		if (!empty($_GET['hashtag'])) {
			$data = parent::searchHashtag($_GET['hashtag']);
			foreach ($data as $key => $value) {
				$count++;
				$t = '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3">';
				$z = '<div class="info"><h4 class="text-center">'. $value['pseudo'] . '</h4>';
				$searchTag .= '<div class="cont' . $count . ' row">';
				$searchTag .= $t;
				$searchTag .= '<div class="box"><div class="box-icon">';
				$searchTag .= '<span class="fa fa-4x fa-html5"></span></div>';
				$searchTag .= $z;
				if (!empty($value['content'])) {
					$first = $this->LinkHastag($value['content']);
					$two = $this->LinkFollow($first);
					$searchTag .= ' <p>' . $two . '</p>';
				}
				$img = parent::searchImg($value['id_tweet']);
				if(isset($img[0]['image']) && is_array($img)){
					$b = '<img class="img" src="'.$img[0]['image'].'" alt="'.$img[0]['image'].'">';
					$searchTag .= $b;		
				}
				$searchTag .= ' <p><i>Publié le ' . $value['date'] . '</i></p>';
				$searchTag .= '<a href="#" class="btn retweet">ReTweete</a>';
				$searchTag .= '</div></div></div></div>';		
			}
			$_SESSION['showTag'] = $searchTag;	
		}
	}

	public function searchAll()
	{
		if (isset($_GET['search'])) {
			$motcle = $_GET['search'];
			$data = parent::searchAllLike($motcle);

			if (is_array($data)) {
				$this->search_show($data);
			}
			else
			{
				echo "aucun resultat pour " . $motcle . " =( "; 
			}
		}	
	}

	public function search_show($data)
	{
		foreach ($data as $key => $value) 
		{
				$count++;
				$t = '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3">';
				$z = '<div class="info"><h4 class="text-center">'. $value['pseudo'] . '</h4>';
				$this->showAll .= '<div class="cont' . $count . ' row">';
				$this->showAll .= $t;
				$this->showAll .= '<div class="box"><div class="box-icon">';
				$this->showAll .= '<span class="fa fa-4x fa-html5"></span></div>';
				$this->showAll .= $z;
				if (!empty($value['content'])) {
					$first = $this->LinkHastag($value['content']);
					$two = $this->LinkFollow($first);
					$this->showAll .= ' <p>' . $two . '</p>';
				}
				$img = parent::searchImg($value['id_tweet']);
				if(isset($img[0]['image']) && is_array($img)){
					$b = '<img class="img" src="'.$img[0]['image'].'" alt="'.$img[0]['image'].'">';
					$this->showAll .= $b;		
				}
				$this->showAll .= ' <p><i>Publié le ' . $value['date'] . '</i></p>';
				$this->showAll .= '<a href="#" class="btn retweet">ReTweete</a>';
				$this->showAll .= '</div></div></div></div>';	
		}
		$_SESSION['showAll'] = $this->showAll;
	}

	public function LinkHastag($content)
	{
		$link_pattern = '<a href="$1"';
		$link_pattern .= ' title="rechercher $1 sur Twitter">#$1</a>'; 
		$result = preg_replace("/#([a-zA-Z0-9_]*)/",$link_pattern,$content);
		return $result;
	}

	public function LinkFollow($content)
	{
		$result = preg_replace_callback("/@([a-zA-Z0-9_]*)/",
		 array('MyFramework\TweetController', 'replace_link'), $content);
		return $result;
	}

	public function replace_link($matches)
	{
		$tab = [];
		$check = "";
		$link_pattern = "";
		$count = count($matches[1]);
		for ($i = 0; $i < $count; $i++)
		{ 
			array_push($tab, $matches[1]);
		}
		$check = $this->check_follow($tab);
		if (isset($tab[0]) && isset($check[0]['pseudo']) && $tab[0] === $check[0]['pseudo']) 
		{
			$pseudo = $check[0]['pseudo'];
			$link_pattern = '<a href="/Projet_Web_tweet_academie/profil/user/'.$pseudo.'"';
			$link_pattern .= ' title="rechercher '.$pseudo.' sur Twitter">@';
			$link_pattern .= $pseudo.'</a>';
		}
		else
		{
			$link_pattern = $matches[0];
		}
		return $link_pattern;
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