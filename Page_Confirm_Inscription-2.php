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
			<h2> Création de profil </h2>
			<h6> Votre inscription a bien été prise en compte ! </h6>

			<h6>Connectez-vous :</h6>
			<div id='bloc_connexion'>
					<ul id="se_connecter">
						<form method=POST action='Accueil.php' >
						<li><label for='pseudo_utilisateur'>Pseudo:</label><input type='text' name='pseudo' id='pseudo' /></li>
						<li><label for="mdp_utilisateur">Mot de passe:</label><input type="password" name="mdp" id="mdp" /></li>
						<li><input type="submit" value="Connexion" /></li>
					</form>
					</ul>
			</div>

</br></br></br></br>
<div>
				<a href="Accueil.php" onclick="window.open('http://localhost/github/Accueil.php', 'exemple', 'height=30%, width=30%, top=90, left=350', );">Retour vers la PAGE D'ACCUEIL.</a>
			</div><br/>
		</div>

		</br></br></br>



</br></br></br></br></br></br></br></br></br>
		<footer>
			<?php include("footer.php"); ?>
		</footer>
	</body>
</html>
