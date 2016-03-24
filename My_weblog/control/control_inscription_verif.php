<?php
include_once('model/inscription.class_verif.php');
$foo = new Inscription();
$reponse = "";
if (isset($_POST['email']))
{
	$reponse = $foo->subscribe();
}

include_once('view/formulauire_inscription_verif.php');
?>