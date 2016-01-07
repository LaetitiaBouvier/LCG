
<?php
try
{ $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');}
catch (Exception $e)
{die('Erreur : '.$e->getMessage());} //en cas d'erreur on affiche un message
// récupération de 10 événements aléatoires
$req = $bdd->query('SELECT Nom_Evenement, JourDebut_Evenement, Image_Evenement, AdressePostal_Evenement FROM evenement_table ORDER BY RAND() LIMIT 3');

while ($donnees = $req->fetch())
{
  ?>

  <figure>
    <a href="@" ><img src="Images_code/IMG_Event_Large/<?php echo($donnees['Image_Evenement']);?>.jpg" class="photo1"/></a>
    <figcaption>
      <p><h3> <?php echo ($donnees['Nom_Evenement']);?> | <?php echo ($donnees['JourDebut_Evenement']);?> </h3></p>
      <p> <?php echo htmlspecialchars($donnees['AdressePostal_Evenement']);?> </p>
    </figcaption>

  </figure>

  <?php
} // Fin de la boucle
$req->closeCursor();
?>



<?php
try
{ $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');}
catch (Exception $e)
{die('Erreur : '.$e->getMessage());} //en cas d'erreur on affiche un message
// récupération des 3 derniers événements postés
$req = $bdd->query('SELECT Nom_Evenement, JourDebut_Evenement, Description_Evenement, Image_Evenement, AdressePostal_Evenement FROM evenement_table ORDER BY ID_Evenement DESC LIMIT 0,3');

while ($donnees = $req->fetch())
{
?>
<div id="cat1">
<div id="titre1">
<ul>
  <li> <h3> <?php echo ($donnees['JourDebut_Evenement']);?> </h3> </li>
  <li> <h5> <a href="@"><?php echo ($donnees['Nom_Evenement']);?> | <?php echo htmlspecialchars($donnees['AdressePostal_Evenement']);?> </a></h5></li>
</ul>
</div>
<a href="@" ><img src="Images_code/IMG_Event_Mini/<?php echo($donnees['Image_Evenement']);?>.jpg" class="photo1"/></a>
<div id="ssmenu1">
<ul>
  <li> <?php echo nl2br(($donnees['Description_Evenement']));?> </li>
</ul>
</div>
</div>

<?php
} // Fin de la boucle
$req->closeCursor();
?>
