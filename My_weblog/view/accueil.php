<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Accueil</title>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
  	<script type="text/javascript" src="../script/script_com.js"></script>
</head>
<body>
	<header>
		<div id="menu">
			<nav>
				<ul>
					<li><a href="">Accueil</a></li>
					<li><a href="connexion">Connexion</a></li>
					<li><a href="inscription">Inscription</a></li>
					<li><a href="../view/formulaire_contact.php">Contact</a></li>
					<li><a href="article">Ecire</a></li>
					<li><a href="admin">Administration</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="top-wrap">

		<div id="tagline" style="display: block; margin-top: 0px; opacity: 1;">
			<p>My Web Blog</p>
			<h1>Guillaume • Giang <span>•</span> Cyril</h1>
		</div>
	</div>
	<div class="intro">
	<h2>BIENVENUE</h2>
		</div>

		<div id="dernier_article">
			<div class="section-title" style="color:#fff;">ARTICLES<br>•</div>
			<?php echo $afficher; ?>
			<?php echo $formCommentaire ?>
			<?php echo $comm 			?>
			<?php echo $afficher2 		?>
			<?php echo $pagination 		?>

			<?php echo $articleTag  ?>
		</div>
			<?php echo $pagination2		?>
			<?php echo $ttt ?>

		<div class="intro"></div>


		<div id="tags">

			<h2>Tags</h2>

			<?php  echo $tag ?>
		</div>



		<div id="newsletter">
			<form>
				<div class="section-title" style="color:#fff;">NEWSLETTER<br>•</div>
				<input type="text" id="email-contact" placeholder="E-MAIL *" name="email" class="">
				<p><input type="submit" value="S'inscrire"></p>
			</form>
		</div>
		<footer>
			<div id="suivre">
				<a href="#"><img src="../images/facebook.jpg" alt="facebook"></a>
				<a href="#"><img src="../images/twitter.jpg" alt="twitter"></a>
				<a href="#"><img src="../images/google.jpg" alt="google"></a>
			</div>


		</footer>
	</body>
	</html>