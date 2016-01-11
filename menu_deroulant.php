<!DOCTYPE html>
<html>
<link rel="stylesheet" href="menu.css" />
  <body>
    <nav>
      <div id="menu">
        <ul id="menu-demo2">
          <li><a href='Accueil.php'><img src="Images_code/[A1G2E]Logo LaCG.png" alt="logo" width=200px /></a></li>
          <li><a href="Accueil.php"> Accueil </a></li>

          <li><a href="Page_Categories.php"> Catégories </a></li>

          <?php if(isset($_SESSION["ID_Utilisateur"])){?>
          <li><a> Mes Abonnements </a>
            <ul>
              <li><a href="Page_CategoriesAbo.php"> Catégories </a></li>
              <li><a href="Page_show-all-profilsAbo.php"> Profils </a></li>

            </ul>
          </li>

          <li><a> Mes Evenements </a>
            <ul>
              <li><a href="Page_Create-Event.php"> Créer un évènement </a></li>
              <li><a href="Page_show-all-events.php"> Modifier mes évènemements </a></li>
              <li><a href="Page_show-all-eventsAbo.php"> Evènements auxquels je participe </a></li>
            </ul>
          </li>

          <li><a href="Page_Forum.php"> Forum </a></li>

          <li> <a>Profil </a>
            <ul>
              <li><a href="Page_Modif-Profil.php"> Modifier mon profil </a></li>
              <li><a href="Page_ConsulterProfil.php"> Consulter mon profil </a></li>
            </ul>
          </li>
          <?php } ?>
          <li> <a href="Page_Map.php"><img src="Images_code/map.png" class="carte" width=120px/></a> </li>
          <li><a href="Page_Calendrier.php"> <img src="Images_code/calendrier.png" class="calendrier" width=110px/> </a></li>
        </ul>
      </div>
    </nav>

  </body>
</html>
