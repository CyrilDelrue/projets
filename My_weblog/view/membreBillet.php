<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Billet des membres</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="../script/jquery.my_wysiwyg-min.js"></script>
	<script src="../script/send_art.js"></script>
	<link rel="stylesheet" href="../images/font-awesome-4.3.0/css/font-awesome.css/">
	<link rel="stylesheet" href="../images/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../style/style.css">

</head>

<body>
	<header>
		<div id="menu">
			<nav>
				<ul>
					<li><a href="accueil">Accueil</a></li>
					<li><a href="connexion">Connexion</a></li>
					<li><a href="inscription">Inscription</a></li>
					<li><a href="../view/formulaire_contact.php">Contact</a></li>
					<li><a href="">Ecire</a></li>
					<li><a href="admin">Administration</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="post_article">
		<form method="post" action="accueil">  
			<h2>Titre de l'article</h2>
			<input id="title" name="titre" value="<?php echo $title ?>"/><br/>  
			<div>
				<p><label>TAGS:</label></p>

				<?php  echo $showTag; 	?>

				<p>Contenu:</p>  
				<textarea name="contenu" rows="10" cols="45"><?php  echo $text; ?></textarea> <br/> 
				<p>&#160;</p>
				<script>
					$('textarea').my_wysiwyg();
				</script>
			</div>
			<?php echo $aff; ?>
		</form> 
	</div>
</body>
</html>