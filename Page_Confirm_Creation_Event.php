<?php
	session_start() ;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>CONFIRMATION CREATION EVENEMENT</title>
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

		<div id="confirm_inscription">
			<h2> CREATION D'EVENEMENT </h2>

		  <p> Votre événement a bien été créé ! </p>



			<?php include 'fichier_photo_event.html';?>


			<br/><div>
				<a href="http://localhost/github/LCG/Index.php" onclick="window.open('http://localhost/github/LCG/Index.php', 'exemple', 'height=30%, width=30%, top=90, left=350', )">RETOUR VERS LA PAGE D'ACCUEIL!</a>
			</div><br/>
		</div>
		</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>

		<footer>
			<?php include("footer.php"); ?>
		</footer>
	</body>
</html>
