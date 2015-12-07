<!DOCTYPE html>
<html>
  <link rel="stylesheet" href="header.css" />

  <header>
    <div id="bloc_titre_principal">
      <img src="Images_code/nomsiteentier.png" alt="titre principal" />
      <ul>
        <li id="se_connecter"><a href="Log-In.php">Se Connecter</a></li>
        <li id="s_inscrire"><a href="Create-Profil.php">S'inscrire</a></li>
        <li id="creer_un_evenement"><a href="Create-Event.php">Créer un événement</a></li>
      </ul>
    </div>
    <div id="barre_recherche">
      <form method="post" action="page_fictive.php" id="bloc_barre_de_recherche">
         <input type="search" name="barre_de_recherche" id="barre_de_recherche" size="50" placeholder=" Rechercher un membre ou un événement" />
         <input type="submit" id="rechercher" value="Rechercher"/>
        <p id="recherche_avancee">Recherche avancée</p>
      </form>
    </div>
  </header>
</html>
