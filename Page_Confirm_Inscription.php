<?php
	session_start() ;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>CONFIRMATION INSCRIPTION</title>
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
			<h2> Création de profil - Ajout de l'avatar </h2>

			<fieldset>
			<?php include 'fichier_photo_profil.html';?>
		</fieldset>



</br></br>
		<footer>
			<?php include("footer.php"); ?>
		</footer>
	</body>
</html>
