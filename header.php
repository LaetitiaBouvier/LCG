<?php

try
{
  new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');
}

catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}


if (isset($_POST['pseudo']) && isset($_POST['mdp']))
{
/* $mdp_hache = sha1($_POST['mdp']); pour crypter les mdps */
  $mdp_hache = $_POST['mdp'];
  $pseudo_hache = $_POST['pseudo'];

  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');
  $req = $bdd->prepare('SELECT pseudo_utilisateur,id_utilisateur FROM utilisateur_table WHERE pseudo_utilisateur = ? AND mdp_utilisateur = ?');
  $req->execute(array($pseudo_hache, $mdp_hache));

  $dataPseudo = $req->fetch();

  $reqbis = $bdd->prepare('SELECT ID_Utilisateur, Avatar_Utilisateur FROM utilisateur_table WHERE pseudo_utilisateur = ? AND mdp_utilisateur = ?');
  $reqbis->execute(array($pseudo_hache, $mdp_hache));

  $dataID = $reqbis->fetch();

  if(isset($_SESSION['ID_Utilisateur']) && isset($_SESSION['pseudo_utilisateur']))
  {
    echo "<h1> Bonjour ! </h1>";
  }
  else
  {
    if (!$dataPseudo)
    {
    	echo 'Mauvais identifiant ou mot de passe!';
    }
    else
    {

    	//session_start();
    	$_SESSION['ID_Utilisateur'] = $dataID['ID_Utilisateur'];
    	$_SESSION['pseudo_utilisateur'] = $dataPseudo['pseudo_utilisateur'];
      $_SESSION['Avatar_Utilisateur']= $dataID['Avatar_Utilisateur'];

      echo "<h1> Bonjour ! </h1>";
    }
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

<div id='bloc_titre_principal'>

<?php
if (isset($_SESSION['ID_Utilisateur']))
{
  echo '<h1>' . $_SESSION['pseudo_utilisateur'] . " , La Connexion Gauloise est heureuse de vous revoir!</h1>";

  echo "<div id='deconnexion'><a href='signout.php' id='se_deconnecter'>Se déconnecter</a></div>";
}
else
{
  include("signinup.html");
  echo "<h1> Inscrivez-vous pour avoir accès aux fonctionnalités avancées !</h1>";
}
?>

</div>

		  <div id="barre_recherche">
        <div id='bloc_titre_principal'><a href='Accueil.php'><img src='Images_code/[A1G2E]Logo La Connexion Gauloise2.png' alt='titre principal' width="55%";/></a>
          <?php if (isset($_SESSION['ID_Utilisateur']))
          {?>
          <div id="avatar">
            <img src="<?php echo"Images_code/IMG_Profil_Mini/" .$_SESSION['ID_Utilisateur'].".jpg.jpg" ;?>"/> <?php } ;?>
          </div>
        </div>
        <form method="post" action="Page_recherche-simple.php" id="bloc_barre_de_recherche">
          <?php if(isset($_SESSION["ID_Utilisateur"])){?>
            <li id="creer_un_evenement"><a href="Page_Create-Event.php">Créer un événement</a></li>
            <?php  } ?>
           <input type="search" name="barre_de_recherche" id="barre_de_recherche" size="50" placeholder=" Rechercher un membre ou un événement" />
					 <input type="submit" id="rechercher" value="Rechercher"/>
					<!--<p id="recherche_avancee">Recherche avancée</p>!-->
				</form>
			</div>
		</header>
</html>
