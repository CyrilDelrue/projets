  <!DOCTYPE html>
  <html>
  <head>
  	<meta charset="utf-8">
  	<link rel="stylesheet" type="text/css" href="../style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="../script/script_panel.js"></script>
    <title>Administration</title>
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
              <li><a href="article">Ecire</a></li>
              <li><a href="">Administration</a></li>
  				</ul>
  			</nav>
  		</div>
  	</header>



  	<div id="top-wrap_5">
    <form method="post" action="modif">
       <table class="tableau" >
        <thead>
        </thead>
        <?php echo $panel_membre; ?>
        <tbody>
          <?php echo $aff; ?>    
        </tbody>
      </table>
    </form>


      <form method="post" action="article_modif">
       <table class="tableau" >
        <thead>
        <?php echo $panel_article; ?>
        </thead>

        <tbody>
          <?php echo $aff_billet; ?>    
        </tbody>
      </table>
    </form>


        <form method="post" action="modif">
       <table class="tableau" >
        <thead>
        <?php echo $panel_com; ?>
        </thead>
          
        <tbody>
          <?php echo $aff_com; ?>    
        </tbody>
      </table>
    </form>

    <form method="post" action="deco">
    <input type="submit" value="Se deconnecter">
    </form>

  </div>
  <footer>

  </footer>
  </body>
  </html>