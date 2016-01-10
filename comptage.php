<?php
if(isset($_GET["Date"])){
    $Date = $_GET["Date"];}

$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/

$categories=array('Festivals','Repas/Banquets','Concerts','Brocantes/Marchés','Soirées','Conférences','Humanitaires','Sportifs','Manifestations');
$CHIFFRES=array();
for ($numero = 0; $numero < 9; $numero++)
{
    $req = $bdd->prepare('SELECT COUNT(*) AS nb FROM evenement_table WHERE JourDebut_Evenement=? AND Categorie_Evenement=?');
    $req->execute(array($Date,$categories[$numero]));

    $data = $req->fetch();


    $compteur=$data['nb'];
    $CHIFFRES[$numero]=''.$compteur.'';
    $req->closeCursor();
  }

$nb_Festivals=$CHIFFRES[0];
$nb_Repas=$CHIFFRES[1];
$nb_Concerts=$CHIFFRES[2];
$nb_Brocantes=$CHIFFRES[3];
$nb_Soirees=$CHIFFRES[4];
$nb_Conferences=$CHIFFRES[5];
$nb_Humanitaire=$CHIFFRES[6];
$nb_Sportif=$CHIFFRES[7];
$nb_Manifestation=$CHIFFRES[8];

?>
