<?php
include_once('model/inscription.class.php');
$foo = new Inscription();
$reponse = "";
if (isset($_POST['email']))
{
	$reponse = $foo->subscribe();
}

include_once('view/formulaire_inscription.php');
?>