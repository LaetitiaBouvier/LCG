<?php

  if(isset($_POST['barre_de_recherche'])){  $recherche = $_POST['barre_de_recherche']; }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<title> Mes évènements </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="corps_accueil.css"/>
	</head>

<form name="recherche" method="post" action="" enctype="multiplart/form-data">

<p>    Vous pouvez consulter les profils et les evenements correspondant à votre recherche <br/> </p>
<br/>



<legend>Liste des évènements correspondants :</legend>

<br>
<?php
  if(isset($_POST['barre_de_recherche'])){
    $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/

    $req = $bdd->prepare('SELECT Nom_Evenement, ID_Evenement, HeureDebut_Evenement, JourDebut_Evenement, HeureFin_Evenement, JourFin_Evenement, Description_Evenement, AdressePostal_Evenement, Image_Evenement FROM evenement_table WHERE Nom_Evenement LIKE "%'.$recherche.'%"');
    $req->execute();

    foreach($req as $row)
    {
?>
<div id="cat1">

  <?php

    $dateFin = $row['JourFin_Evenement']."  ".$row['HeureFin_Evenement'];
    $dateDeb = $row['JourDebut_Evenement']." ".$row['HeureDebut_Evenement'];

    $dateAujd =  date("Y-m-d H:i:s", time());

    $aujd = DateTime::createFromFormat('Y-m-d H:i:s', $dateAujd);
    $fin  = DateTime::createFromFormat('Y-m-d H:i:s', $dateFin);
    $deb  = DateTime::createFromFormat('Y-m-d H:i:s', $dateDeb);
    //echo var_dump($fin < $deb);
    //echo var_dump($fin > $deb);

    if(($deb < $aujd) && ($fin > $aujd)){
      echo "Cet évènement est en cours !";
    }

    if(($deb > $aujd) && ($fin > $aujd)){
      echo "Cet évènement n'a pas commencé !";
    }

    if(($deb < $aujd) && ($fin < $aujd)){
      echo "Cet évènement est terminé !";
    }


  ?><br/><br/>

  <div id="titre1">
    <ul>
      <li> <h3> <?php echo ($row['JourDebut_Evenement']);?> </h3> </li>
      <li> <h3> <a href=<?php echo("Page_show-event.php?IDE=".$row['ID_Evenement']."");?> class="typeblanc"><?php echo ($row['Nom_Evenement']);?> | <?php echo htmlspecialchars($row['AdressePostal_Evenement']);?> </a></h3></li>
    </ul>
  </div>
  <a href=<?php echo("Page_show-event.php?IDE=".$row['ID_Evenement']."");?> ><img src="Images_code/IMG_Event_Mini/<?php echo($row['Image_Evenement']);?>.jpg" class="photo1"/></a>
  <div id="ssmenu1">
    <ul>
      <li> <?php echo nl2br(($row['Description_Evenement']));?> </li>
    </ul>
  </div>
</div>
    <?php
    }

    //
  }
?>
<br/>





<legend>Liste des profils correspondants :</legend>

<br>
<?php
  if(isset($_POST['barre_de_recherche'])){
    $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/

    $req = $bdd->prepare('SELECT Pseudo_Utilisateur, ID_Utilisateur, Description_Utilisateur, Avatar_Utilisateur, Date_Naissance FROM utilisateur_table WHERE Pseudo_Utilisateur LIKE "%'.$recherche.'%"');
    $req->execute();

    foreach($req as $row)
    {
?>
<div id="cat1">
  <a href=<?php echo("Page_show-profil.php?IDU=".$row['ID_Utilisateur']."");?> ><img src="Images_code/IMG_Profil_Mini/<?php echo($row['Avatar_Utilisateur']);?>.jpg" class="photo1"/></a>
  <div id="titre2">
    <ul>
      <li> <h3> <a href=<?php echo("Page_show-profil.php?IDU=".$row['ID_Utilisateur']."");?> class="typeblanc"><?php echo ($row['Pseudo_Utilisateur']);?> </a></h3></li>
    </br></ul>
  </div>
  <div id="ssmenu1">
    <ul>
      <li> <?php echo nl2br(($row['Description_Utilisateur']));?> </li>
    </ul>
  </div>
</div>
    <?php
    }
  }
?>

<br/>




</form>
