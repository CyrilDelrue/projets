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
		$msg="<span class='vert'>"."Votre message a bien été envoyé !"."</span>";
	}
	else
	{
		$msg="<span class='rouge'>"."Tous les champs doivent être complétés !"."</span>";
	}
}
?>








<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Contact</title>
</head>
<body>
	<header>
		<div id="menu">
			<nav>
				<ul>
					<li><a href="../index.php/accueil">Accueil</a></li>
					<li><a href="../index.php/connexion">Connexion</a></li>
					<li><a href="../index.php/inscription">Inscription</a></li>
					<li><a href="">Contact</a></li>
					<li><a href="../index.php/article">Ecire</a></li>
					<li><a href="../index.php/admin">Administration</a></li>
				</ul>
			</nav>
		</div>
	</header>
		<div id="top-wrap_3">

			<div id="tagline_3" style="display: block; margin-top: 0px; opacity: 1;">
				<div id="formulaire">
					<form method="POST">
						<h2>Formulaire de contact</h2>
						<input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />
						<input type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br />
						<textarea name="message" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br /><br />
						<input type="submit" value="Envoyer !" name="mailform"/>
						<?php
						if(isset($msg))
						{
							echo $msg;
						}
						?>
					</form>
				</div>
			</div>
		</div>
		<footer>
		</footer>
	</body>
	</html>