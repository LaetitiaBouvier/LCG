<!DOCTYPE html>
<html>
  <link rel="stylesheet" href="header.css" />

  <header>
    <?php
        if (!isset($_SESSION['id_utilisateur']))
    {
      include("signinup.html");
    }
    else
    {
      echo "<div id='bloc_titre_principal'><img src='images/[A1G2E]Logo La Connexion Gauloise2.png' alt='titre principal' /><a href='signout.php' id='se_deconnecter'>Se déconnecter</a></div>";
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
