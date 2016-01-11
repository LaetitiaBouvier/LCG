<?php

	if(isset($_SESSION["ID_Utilisateur"])){
	  $ID = $_SESSION["ID_Utilisateur"];
	}
	else{
	  $ID = -1;
	}
	if(isset($_GET["Date"])){
			$Date = $_GET["Date"];}
?>


<form name="évènements" method="post" action="" enctype="multiplart/form-data">

<p>    Vous pouvez consulter les évènements en cliquant dessus !<br/> </p>
<br/>



<legend>Liste des évènements correspondant :</legend>

<br>

<?php
  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/

  $req = $bdd->prepare('SELECT ID_Evenement, Nom_Evenement, Categorie_Evenement,JourDebut_Evenement, AdressePostal_Evenement, Image_Evenement,Description_Evenement FROM evenement_table WHERE JourDebut_Evenement=? ORDER BY JourFin_Evenement DESC');
  $req->execute(array($Date));

	$Ev = $_GET["Ev"];
	$compteur=0;

  foreach($req as $row){
    if( strstr($row['Categorie_Evenement'], $Ev)){

			$IDE = $row['ID_Evenement']; ?>

			<div id="cat1">
				<div id="titre1">
					<ul>
						<li> <h3> <?php echo ($row['JourDebut_Evenement']);?> </h3> </li>
						<li> <h5> <a href=<?php echo("Page_show-event.php?IDE=".$IDE."");?> class="typeblanc"> <?php echo ($row['Nom_Evenement']);?> | <?php echo htmlspecialchars($row['AdressePostal_Evenement']);?> </a></h5></li>
					</ul>
				</div>
				<a href=<?php echo("Page_show-event.php?IDE=".$IDE."")?> ><img src="Images_code/IMG_Event_Mini/<?php echo($row['Image_Evenement']);?>.jpg" class="photo1"/></a>
				<div id="ssmenu1">
					<ul>
						<li> <?php echo nl2br(($row['Description_Evenement']));?> </li>
					</ul>
				</div>
			</div>
<?php
$compteur=$compteur+1;
}
  }
	$req->closeCursor();

?>


<br/>

<legend><?php echo ("Il y a ".$compteur." evenements dans la catégorie ".$Ev." le ".$Date."");  ?></legend></br>
<a <?php echo ("href=Page_categories-2.php?Ev=Humanitaires&Date=".$Date."");?>>REVENIR A LA LISTE DES CATEGORIES DES EVENEMENTS DU <?php echo ("".$Date."");?></a>

</form>
