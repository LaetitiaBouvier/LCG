<?php



	if(isset($_SESSION["ID_Utilisateur"])){
	  $ID = $_SESSION["ID_Utilisateur"];
	}
	else{
	  $ID = -1;
	}

?>


<form name="évènements" method="post" action="" enctype="multiplart/form-data">

<p>    Vous pouvez consulter et modifier vos évènements en cliquant dessus <br/> </p>
<br/>


<fieldset>
<legend>Liste des événements que j'organise :</legend>

<br>

<?php

  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/

  $req = $bdd->prepare('SELECT Pseudo_Utilisateur FROM utilisateur_table WHERE ID_Utilisateur ="'.$ID.'"');
  $req->execute();

  foreach($req as $row)
  {
    $pseudo = $row['Pseudo_Utilisateur'];
  }

  $req = $bdd->prepare('SELECT Nom_Evenement FROM evenement_table WHERE Organisateur_Evenement ="'.$pseudo.'"');
  $req->execute();

  foreach($req as $row){

    $reqbis = $bdd->prepare('SELECT ID_Evenement, Nom_Evenement, Categorie_Evenement, JourDebut_Evenement, AdressePostal_Evenement, Image_Evenement, Description_Evenement
														 FROM evenement_table WHERE Organisateur_Evenement ="'.$pseudo.'" AND Nom_Evenement ="'.$row['Nom_Evenement'].'"');
    $reqbis->execute();

    foreach($reqbis as $rowbis){

        $IDE = $rowbis['ID_Evenement'];
				?>
        <!-- echo '<a href="Page_Modif-Event.php?IDE='.$IDE.' ">"'.$row['Nom_Evenement'].'"</a>', '<br/>'; -->

				<div id="cat1">
					<div id="titre1">
						<ul>
							<li> <h3> <?php echo ($rowbis['JourDebut_Evenement']);?> </h3> </li>
							<li> <h5> <a href=<?php echo("Page_Modif-Event.php?IDE=".$IDE."");?> class="typeblanc"> <?php echo ($rowbis['Nom_Evenement']);?> | <?php echo htmlspecialchars($rowbis['AdressePostal_Evenement']);?> </a></h5></li>
						</ul>
					</div>
					<a href=<?php echo("Page_Modif-Event.php?IDE='.$IDE.' ")?> ><img src="Images_code/IMG_Event_Mini/<?php echo($rowbis['Image_Evenement']);?>.jpg" class="photo1"/></a>
					<div id="ssmenu1">
						<ul>
							<li> <?php echo nl2br(($rowbis['Description_Evenement']));?> </li>
						</ul>
					</div>
				</div>
				<?php
    }
  }

?>

<br/>

</fieldset>

</form>
