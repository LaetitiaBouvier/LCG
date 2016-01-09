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
    echo $compteur;
    $CHIFFRES[$numero]='Allez'.$compteur.'';
    $req->closeCursor();
  }
for ($numero = 0; $numero < 9; $numero++){
  echo $CHIFFRES[$numero];
  //echo $categories[$numero];
}


?>
