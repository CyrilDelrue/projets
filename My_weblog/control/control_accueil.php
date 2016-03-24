<?php
include_once('model/billet.class.php');
$membre = new billet();
$afficher = "";
$afficher2 = "";
$comm = "";
$formCommentaire = "";
$pagination="";
$pagination2="";
$articleTag = "";
$ttt = "";
$tag = "";
if (isset($_POST['titre']) && isset($_POST['contenu'])) {

	$membre->insertBillet($_POST['titre'], $_POST['contenu']);

}

$article = $membre->search_art();
$IDNews = $article[0]['id_billet'];

if(!empty($_POST['tag']))
{	
	foreach ($_POST['tag'] as $key => $value)
	{
		$membre->insert_tag($value,$IDNews);
		
	}
}

if (!empty($_GET['billet'])) {
	foreach ($membre->AfficherNews() as $key => $value) {
		$afficher .= "<article> <h3>".$value['title']."</h3>";
		$afficher .= "<p>". $value['content'] ." </p>";
		$afficher .= "<p> Dernier mise a jour 	" . $value['updated'] ."</p>";
		$afficher .= "<p> Publié par ". $value['login']." </p>";
		foreach ($membre->tags($value['id_billet']) as $key => $value)
		{
			$afficher .= '<p><a class="blue" href="./accueil?tag='. utf8_encode($value['nom']).'">'.utf8_encode($value['nom']).'</a></p>';
		}
	}
	
	foreach ($membre->AfficherNews() as $key => $value) {
		$formCommentaire .= '<form method="POST" action="accueil">';
		$formCommentaire .= '<textarea id="content" name="commentaires"></textarea> ';
		$formCommentaire .= '<input id="com" type="submit" name="valider" value="Envoyer" />';
		$formCommentaire .= "</form>";
	}
	if (!empty($membre->AfficherCom())) {
		
		foreach ($membre->AfficherCom() as $key => $value) {
			$afficher2 .= "<p> ".$value['login']."</p>";
			$afficher2 .= "<p>" . $value['date'] . "</p>";
			$afficher2 .= "<p>" . $value['content'] . "</p>";
		}
	}

	for($i=1; $i <= $membre->resultCom ;$i++)
	{
		$pagination2 .= "<a href='./accueil?billet=" . $_GET['billet'] . "&pageC=" . $i . "'>" . $i . " </a> /";

	}
}

if (empty($_GET['billet'])) {
	
	$var = "<h2>Les Derniers articles !</h2>";
	foreach ($membre->AfficherNews() as $key => $value) {
		$afficher .= "<article> <h3>".$value['title']."</h3>";
		$afficher .= "<p>". $value['content'] ." </p>";
		$afficher .= "<p> Dernier mise a jour 	" . $value['updated'] ."</p>";
		$afficher .= "<p> Publié par ". $value['login']." </p>";
		foreach ($membre->tags($value['id_billet']) as $key => $value)
		{
			$afficher .= '<p><a class="blue" href="./accueil?tag='. utf8_encode($value['nom']).'">'.utf8_encode($value['nom']).'</a></p>'; 
		}
		$afficher .= '<a href="./accueil?billet='. $value['id_billet']
		.'">Commentaires</a> </article>';
	}
}

if (isset($_POST['valider'])) {
	
	$commentaires = $_POST['commentaires'];
	if (!empty($commentaires)) {

		$membre->insertCom($commentaires);
	}
}

for($i=1; $i<=$membre->result ;$i++)
{

	$pagination .= "<a href=\"./accueil?page=".$i."\">" . $i . " </a> /";

}

foreach ($membre->AfficherTags() as $key => $value) {
	$tag .= '<a class="blue" href="./accueil?tag='. utf8_encode($value['nom']).'">'.utf8_encode($value['nom']).'</a> '; 
	
}

if (isset($_POST['Modifier']))
{
	$membre->modif_art();
}

if (isset($_GET['tag']))
{
	$search = $membre->search_tag();
	$afficher = "";
	$pagination = "";
	foreach ($search as $key => $value)
	{
		$afficher .= "<article> <h3>".$value['title']."</h3>";
		$afficher .= "<p>". $value['content'] ." </p>";
		$afficher .= "<p> Dernier mise a jour 	" . $value['updated'] ."</p>";
		$afficher .= "<p> Publié par ". $value['login']." </p>";
		foreach ($membre->tags($value['id_billet']) as $key => $value)
		{
			$afficher .= '<p><a class="blue" href="./accueil?tag='. utf8_encode($value['nom']).'">'.utf8_encode($value['nom']).'</a></p>'; 
		}
		$afficher .= '<a href="./accueil?billet='. $value['id_billet']
		.'">Commentaires</a> </article>';
	}
}
include_once('view/accueil.php');
?>