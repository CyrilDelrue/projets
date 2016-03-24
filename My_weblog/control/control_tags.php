<?php
if (isset($_SESSION['level']) && $_SESSION['level'] <= 2) 
{

	include_once('model/billet.class.php');
	$aff = "";
	$text = "";
	$title = "";
	$showTag = "";
	$membre = new billet();
		if ($membre->AfficherTags()) 
		{
			 
			foreach ($membre->AfficherTags() as $key => $value) {
				$showTag .= '<input type="checkbox" name="tag[]"';
				$showTag .= ' value="'.$value['id_tag'].'" > ' . utf8_encode($value['nom']);	
			}
		}

	if (isset($_POST['id'])) 
	{
		$aff = '<input id="send" type="submit" name="valid" value="Modifier"/>';
		foreach ($membre->aff_text() as $key => $value)
		{
			$text = $value['content'];	
			$title =  $value['title'];
		}
	}
	else
	{
		$aff = '<input id="send" type="submit" name="valid" value="Envoyer"/>'; 
	}
	include_once('view/membreBillet.php');

}
else
{
	$seconde = time("s");
	echo "Vous n'avez pas les droits requis pour pouvoir accéder a cette page";
}
?>