<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>INSCRIPTION-OK</title>
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
			<h2> Formulaire de création de profil </h2>

		  <p> Votre inscription a bien été prise en compte ! </p>

			<br/>
		</div>

		</br></br></br>

		<div id='bloc_connexion'>
		    <ul id="se_connecter">
		      <p> Connectez-vous </p>
		  	  <li><label for='pseudo_utilisateur'>Pseudo:</label><input type='text' name='pseudo' id='pseudo' /></li></br>
		  	  <li><label for="mdp_utilisateur">Mot de passe:</label><input type="password" name="mdp" id="mdp" /></li>
		  	  <li><input type="submit" value="Connexion" /></li>
		  	</ul>
				</br>
		</div>
		</br></br></br></br></br></br></br></br></br>

		<footer>
			<?php include("footer.php"); ?>
		</footer>
	</body>
</html>
