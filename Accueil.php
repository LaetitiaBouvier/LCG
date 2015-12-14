<?php

try
{
  new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');
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
  	$_SESSION['pseudo_utilisateur'] = $data['pseudo_utilisateur'];
  	echo 'Bonjour ' . $data['pseudo_utilisateur'] . " ! Bienvenue sur La Connexion Gauloise !";
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
echo "<div id='bloc_titre_principal'><img src='images/[A1G2E]Logo La Connexion Gauloise2.png' alt='titre principal' /></div>";
if (!isset($_SESSION['pseudo_utilisateur']))
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

	  <li> <a href="http://localhost/github/LCG/Page_map.php"><img src="Images_code\map.png" class="carte" width=120px/></a> </li>
	  <li><a href="http://localhost/github/LCG/calendrier.png"> <img src="Images_code\calendrier.png" class="calendrier" width=110px/> </a></li>
	</ul>
  </div>

		<div id="corps">
		<section id="slideshow">

	<div class="container">
		<div class="c_slider"></div>
		<div class="slider">
			<figure>
				<a href="@"><img src="images/4-albuquerque-international-balloon-festival__large.jpg" alt="" width="1100" height="600" /></a>
				<figcaption>
          <p><h3> Rassemblement - 23 Avril 2016 </h3></p>
          <p> Paris </p>
        </figcaption>

			</figure><!--
			--><figure>
				<a href="@"><img src="images/camping-lac-festival-bordeaux.jpg" alt="" width="1100" height="600"/></a>
        <figcaption>
          <p><h3> Concert - 24 Avril 2016 </h3></p>
          <p> Strasbourg </p>
        </figcaption>

			</figure><!--
			--><figure>
				<a href="@" ><img src="images/concert en plein air.jpg" alt="" width="1100" height="600"/></a>
        <figcaption>
          <p><h3> Festival - 24 Avril 2016 </h3></p>
          <p> Dunkerque </p>
        </figcaption>
		</div>
	</div>

  <div id="cat1">
    <div id="titre1">
      <ul>
        <li> <h3> 17 Octobre 2016 </h3> </li>
        <li> <h5>Course au jardin du Luxembourg </h5></li>
      </ul>
    </div>
    <img src="images/Marathon.jpg" class="photo1"/>
    <div id="ssmenu1">
      <ul>
        <li> La 21 ème édition des 21km du Luxembourg </li>
        <li> N'hésitez pas à vous inscrire ! </li>
      </ul>
    </div>
	</div>
    <div id="cat2">
    <div id="titre2">
      <ul>
        <li> <h3> 23 Octobre 2016 </h3> </li>
        <li> <h5> Soirée Raclette </h5></li>
      </ul>
    </div>
    <img src="Images_code/raclette.jpg" class="photo2"/>
    <div id="ssmenu2">
      <ul>
        <li> Soirée à la salle des fêtes du XVIIIème, Paris</li>
        <li> Venez nombreux !</li>
    </div>
  </div>

  <div id="cat3">
    <div id="titre3">
      <ul>
        <li> <h3> 2 Novembre 2016 </h3> </li>
        <li> <h5> Concert Time Impala </h5></li>
      </ul>
    </div>
    <img src="Images_code/tame-impala-couv.jpg" class="photo3"/>
    <div id="ssmenu3">
      <ul>
        <li> Concert du Groupe de Rock australien </li>
        <li> Nouvel album : Currents </li>
    </div>
  </div>
		</section>
	</div>


	<footer>
	  <div id="logof">
	    <img src="images/facebook.png" class="facebook" />
	    <img src="images/logo-twitter.png" class="twitter"/>
	    <img src="images/instagram-logo-vector-image1.png" class="insta" />
	    <img src="images/google-plus-logo-transparent.png" class="google"/>
	  </div>
	  <div id="site">
	    <a href="#"> <h3> Nous Contactez &nbsp &nbsp &nbsp</h3> </a>
	    <a href="#"> <h3> Aide en ligne &nbsp &nbsp &nbsp</h3> </a>
	    <a href="#"> <h3> Charte &nbsp &nbsp &nbsp</h3> </a>
	  </div>
	  <h3> La Connexion Gauloise  </h3>
	</footer>

	</body>


</html>
