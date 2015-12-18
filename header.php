<?php

try
{
  new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', 'root');
}

catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}


if (isset($_POST['pseudo']) OR isset($_POST['mdp']))
{
/* $mdp_hache = sha1($_POST['mdp']); pour crypter les mdps */
  $mdp_hache = $_POST['mdp'];

  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');
  $req = $bdd->prepare('SELECT pseudo_utilisateur FROM utilisateur_table WHERE pseudo_utilisateur = ? AND mdp_utilisateur = ?');
  $req->execute(array($_POST['pseudo'], $mdp_hache));

  $data = $req->fetch();

  if (!$data)
  {
  	echo 'Mauvais identifiant ou mot de passe!';
  }
  else
  {
  	session_start();
  	$_SESSION['id_utilisateur'] = $data['id_utilisateur'];
  	$_SESSION['pseudo_utilisateur'] = $data['pseudo_utilisateur'];
  	echo 'Bonjour ' . $data['pseudo_utilisateur'] . "Bienvenue sur La Connexion Gauloise!";
  }
}

?>

<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="header.css" />
	<title>La Connexion Gauloise</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

	<body>
		<header>

<?php
echo "<div id='bloc_titre_principal'><img src='images/[A1G2E]Logo La Connexion Gauloise2.png' alt='titre principal' /></div>";
if (!isset($_SESSION['id_utilisateur']))
{
  include("signinup.html");
}
else
{
  echo "<div id='deconexion'><a href='signout.php' id='se_deconnecter'>Se déconnecter</a></div>";
}

?>

		  <div id="barre_recherche">

        <form method="post" action="page_fictive.php" id="bloc_barre_de_recherche">
          <li id="creer_un_evenement"><a href="Create-Event.php">Créer un événement</a></li>
           <input type="search" name="barre_de_recherche" id="barre_de_recherche" size="50" placeholder=" Rechercher un membre ou un événement" />
					 <input type="submit" id="rechercher" value="Rechercher"/>
					<p id="recherche_avancee">Recherche avancée</p>
				</form>
			</div>
		</header>
</html>
