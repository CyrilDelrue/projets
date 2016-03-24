<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Se Connecter</title>
</head>
<body>
	<header>
		<div id="menu">
			<nav>
				<ul>
					<li><a href="accueil">Accueil</a></li>
					<li><a href="">Connexion</a></li>
					<li><a href="inscription">Inscription</a></li>
					<li><a href="../view/formulaire_contact.php">Contact</a></li>
					<li><a href="article">Ecire</a></li>
					<li><a href="admin">Administration</a></li>
				</ul>
			</nav>
		</div>
	</header>




	<div id="top-wrap_2">

		<div id="tagline_2" style="display: block; margin-top: 0px; opacity: 1;">
			<div id="formulaire">
				<form id="connection" method="post" action="connexion">
					<p class="titre_connection">Connection</p>
					<p><input type="text" name="verif_login" placeholder="Adresse mail..."></p>
					<p><input type="password" name="verif_pwd" placeholder="Mot de passe..."></p>
					<p><input type="submit" class="submit"></p>
				</form>
		</div>
		<?php echo $reponse ?>
	</div>
</div>








<footer>

</footer>
</body>
</html>




