<?php
include_once('model/billet.class.php');
$membre = new billet();
if (isset($_POST['titre']) && isset($_POST['contenu'])) {

	$membre->insertBillet($_POST['titre'], $_POST['contenu']);

}

include_once('view/accueil.php');
?>