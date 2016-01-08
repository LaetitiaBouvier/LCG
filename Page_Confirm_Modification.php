<?php
	session_start() ;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title> CONFIRMATION MODIFICATION </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="Style-form.css"/>
	</head>

	<body>
		<header>
			<?php include("header.php"); ?>
		</header>

		<nav>
			<?php include("menu_deroulant.php"); ?>
		</nav>

		<div id="modifOK">
		  <h2> Formulaire de modification de profil </h2>

		  <p> Votre modification de profil a bien été prise en compte ! </p>


			<br/><div>
				<a href="http://localhost/github/LCG/Accueil.php" onclick="window.open('http://localhost/github/LCG/Accueil.php', 'exemple', 'height=30%, width=30%, top=90, left=350', );">RETOUR VERS LA PAGE D'ACCUEIL!</a>
			</div><br/>
		</div>
		</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>

		<footer>
			<?php include("footer.php"); ?>
		</footer>
  </body>
</html>
