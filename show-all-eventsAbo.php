<?php



	if(isset($_SESSION["ID_Utilisateur"])){
	  $ID = $_SESSION["ID_Utilisateur"];
	}
	else{
	  $ID = -1;
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<title> Evènements auxquels je participe </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="corps_accueil.css"/>
	</head>

<form name="évènements" method="post" action="" enctype="multiplart/form-data">

<p>    Vous pouvez consulter les évènements auxquels vous participez en cliquant dessus <br/> </p>
<br/>


<fieldset>
<legend>Liste des évènements suivis :</legend>

<br>

<?php

  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/

  $req = $bdd->prepare('SELECT ID_Evenement FROM participation_table WHERE ID_Utilisateur ="'.$ID.'"');
  $req->execute();

  foreach($req as $row){

    $reqbis = $bdd->prepare('SELECT ID_Evenement, Nom_Evenement, Categorie_Evenement, JourDebut_Evenement, AdressePostal_Evenement, Image_Evenement, Description_Evenement
														 FROM evenement_table WHERE ID_Evenement ="'.$row['ID_Evenement'].'"');
    $reqbis->execute();

    $rowbis = $reqbis->fetch();

		$IDE = $rowbis['ID_Evenement'];

		?>
		<!-- echo '<a href="Page_Modif-Event.php?IDE='.$IDE.' ">"'.$row['Nom_Evenement'].'"</a>', '<br/>'; -->

		<div id="cat1">
			<div id="titre1">
				<ul>
					<li> <h3> <?php echo ($rowbis['JourDebut_Evenement']);?> </h3> </li>
					<li> <h5> <a href=<?php echo("Page_show-event.php?IDE=".$IDE."");?> class="typeblanc"> <?php echo ($rowbis['Nom_Evenement']);?> | <?php echo htmlspecialchars($rowbis['AdressePostal_Evenement']);?> </a></h5></li>
				</ul>
			</div>
			<a href=<?php echo("Page_show-event.php?IDE=".$IDE."")?> ><img src="Images_code/IMG_Event_Mini/<?php echo($rowbis['Image_Evenement']);?>.jpg" class="photo1"/></a>
			<div id="ssmenu1">
				<ul>
					<li> <?php echo nl2br(($rowbis['Description_Evenement']));?> </li>
				</ul>
			</div>
		</div>
		<?php
  }

?>

<br/>

</fieldset>

</form>
