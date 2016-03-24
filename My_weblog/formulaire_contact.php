<?php
if(isset($_POST['mailform']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
	{
		$header="MIME-Version: 1.0\r\n";
		$header.='From:"MyWebBlog.com"<support@mywebblog.com>'."\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';

		$message='
		<html>
		<body>
			<div align="center">

				<u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
				<u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
				<br />
				'.nl2br($_POST['message']).'
				<br />

			</div>
		</body>
		</html>
		';

		mail("delrue.cyril@gmail.com", "CONTACT - MyWebBlog", $message, $header);
		$msg="Votre message a bien été envoyé !";
	}
	else
	{
		$msg="Tous les champs doivent être complétés !";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
	<header>
		<div>
			<h1>My_Web_Blog</h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.html">Accueil</a></li>
				<li><a href="connexion.php">Connexion</a></li>
				<li><a href="formulaire_inscription.html">Inscription</a></li>
				<span><li><a href="formulaire_contact.php">Contact</a></li></span>
			</ul>
		</div>
		<div id="connection">
			<p><input type="mail" placeholder="Adresse mail..."></p>
			<p><input type="password" placeholder="Mot de passe..."></p>
			<p><input type="submit" class="submit"></p>
		</div>
	</header>
	<div id="formulaire">
	<h2>Formulaire de contact !</h2>
	<form method="POST" action="">
	<fieldset>
	<legend><h2>Formulaire de contact</h2></legend>
		<input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />
		<input type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br />
		<textarea name="message" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br /><br />
		<input type="submit" value="Envoyer !" name="mailform"/>
		</fieldset>
	</form>

	<?php
	if(isset($msg))
	{
		echo $msg;
	}
	?>
	</div>
	<footer>
		<li><h3>Projet de Enaux_g / Lui_s / Delrue_c</h3></li>
		<li class="droite"><a href="#"><img src="images/icones/facebook.png"></a>
			<a href="#"><img src="images/icones/twitter.png"></a>
		</li>
	</footer>
</body>
</html>