<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<title>Inscription</title>
</head>
<body>
	<header>
		<div id="menu">
			<nav>
				<ul>
					<li><a href="accueil">Accueil</a></li>
					<li><a href="connexion">Connexion</a></li>
					<li><a href="">Inscription</a></li>
					<li><a href="../view/formulaire_contact.php">Contact</a></li>
					<li><a href="article">Ecire</a></li>
					<li><a href="admin">Administration</a></li>
				</ul>
			</nav>
		</div>
	</header>

	
	<div id="top-wrap_1">

		<div id="tagline_1" style="display: block; margin-top: 0px; opacity: 1;">
			<div id="formulaire">
				<form method="post" action="inscription_verif">
					<p>Inscription</p>
					<input id="pseudo" placeholder="Entez un login..." autofocus="" required="" name="login"><br><br>
					<input id="pwd" type="password" placeholder="Entrez un mot de passe..." name="pwd"><br><br>
					<input id="pwd_confirm" type="password" placeholder="Comfirmez votre mot de passe..." name="pwd_confirm"><br><br>
					<input id="email" type="email" placeholder="Entrez votre email..." name="email"><br><br>
					<select id="sexe" name="f_or_m">
						<option>Selectionnez votre sexe...</option>
						<option value="F">Femme</option>
						<option value="H">Homme</option>
					</select><br><br>
					<input id="date" placeholder="Entrez votre date de naissance..." name="date_naissance"><br><br>
					<script>
						$(function() {
							$( "#date" ).datepicker({ dateFormat: 'yy-mm-dd',
							changeYear: true,
							changeMonth: true,
							yearRange: '1900:2014'  }).val();
						});
					</script>
					<p><input type="submit" value="Soummettre"></p>
				</form>
			</div>
			<?php echo $reponse ?>
		</div>
	</div>
</body>
</html>