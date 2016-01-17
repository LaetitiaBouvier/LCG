<?php

if (isset($_POST['pseudo']) OR isset($_POST['mdp']))
{
  $mdp_hache = sha1($_POST['mdp']);
  $mdp_hache = $_POST['mdp'];

  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
  $req = $bdd->prepare('SELECT id_utilisateur, pseudo_utilisateur FROM utilisateur_table WHERE pseudo_utilisateur = ? AND mdp_utilisateur = ?');
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
  	echo 'Bonjour ' . $data['pseudo_utilisateur'] . "! Bienvenue sur La Connexion Gauloise!";
  }
}

?>

<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="Accueil.css" />
	<title>La Connexion Gauloise</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

	<body>
		<header>

<?php

if (!isset($_SESSION['id_utilisateur']))
{
  include("signinup.html");
}
else
{
  echo "<div id='bloc_titre_principal'><img src='images/[A1G2E]Logo La Connexion Gauloise2.png' alt='titre principal' /><a href='signout.php'>Deconnexion</a></div>";
}

?>

			<div id="barre_recherche">
				<form method="post" action="page_fictive.php" id="bloc_barre_de_recherche">
					 <input type="search" name="barre_de_recherche" id="barre_de_recherche" size="50" placeholder=" Rechercher un membre ou un événement" />
					 <input type="submit" id="rechercher" value="Rechercher"/>
					<p id="recherche_avancee">Recherche avancée</p>
				</form>
			</div>
		</header>

	<div id="menu">
  	<ul id="menu-demo2">
  	  <li><img src="images/[A1G2E]Logo LaCG.png" alt="logo" width=233px /></li>
  	  <li><a href="@">Accueil </a></li>

  	  <li><a href="@"> Catégories </a></li>

  	  <li><a href="@"> Mes Abonnements </a>
  	    <ul>
  	      <li><a href="@"> Catégories </a></li>
  	      <li><a href="@"> Profils </a></li>
  	    </ul>
  	  </li>

  	  <li><a href="@"> Mes Evenements </a>
  	    <ul>
  	      <li><a href="@"> Créer un évènement </a></li>
  	      <li><a href="@"> Modifier mes évènemements </a></li>
  	    </ul>
  	  </li>

  	  <li><a href="@"> Forum </a></li>

  	  <li><a href="@"> Profil </a>
  	    <ul>
  	      <li><a href="@"> Modifier mon profil </a></li>
  	      <li><a href="@"> Mes participations </a></li>
  	    </ul>
  	  </li>

  	  <li> <a href="map.png"><img src="Images_code\map.png" class="carte" width=120px/></a> </li>
  	  <li><a href="calendrier.png"> <img src="Images_code\calendrier.png" class="calendrier" width=110px/> </a></li>
  	</ul>
  </div>


    <h2> Formulaire de création/modification de profil </h2>

    <p> Votre modification de profil a bien été prise en compte ! </p><br/>
    <div>
     <a href="http://localhost/github/LCG/Accueil.php" onclick="window.open('http://localhost/github/LCG/Accueil.php', 'exemple', 'height=30%, width=30%, top=90, left=350', );">RETOUR VERS LA PAGE D'ACCUEIL!</a>
    </div><br/>


	<footer>
	  <div id="logof">
	    <img src="images/facebook.png" class="facebook" />
	    <img src="images/logo-twitter.png" class="twitter"/>
	    <img src="images/instagram-logo-vector-image1.png" class="insta" />
	    <img src="images/google-plus-logo-transparent.png" class="google"/>
	  </div>
	  <div id="site">
	    <a href="#"> <h3> Nous Contactez </h3> </a>
	    <a href="#"> <h3> Aide en ligne </h3> </a>
	    <a href="#"> <h3> Charte </h3> </a>
	  </div>
	  <h3> La Connexion Gauloise  </h3>
	</footer>

	</body>


</html>
