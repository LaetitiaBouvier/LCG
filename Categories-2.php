<?php


	if(isset($_SESSION["ID_Utilisateur"])){
	  $ID = $_SESSION["ID_Utilisateur"];
	}
	else{
	  $ID = -1;
	}

	if(isset($_GET["Date"])){
			$Date = $_GET["Date"];}
	if(isset($_POST["Date"])){
			$Date = $_POST["Date"];}
?>



<p>    Vous pouvez consulter les évènements liés à un catégorie en cliquant sur la catégorie de votre choix ! <br/> </p>

<fieldset>
<legend>Liste des categories :</legend>

<style type="text/css">
	#categ_ligne1 div p, #categ_ligne2 div p, #categ_ligne3 div p {color: black; text-decoration: none;}
</style>

<br>
<br/>
<div id="categ_ligne1">
	<div id="categ_Festival">
		<div> <a  <?php echo ("href=Page_show-2-categorie.php?Ev=Festivals&Date=".$Date."");?>><img src="Images_code/IMG_Categorie/categ_festival.jpg"> </a> </div>
		<div> <p> <?php include('comptage.php'); echo ($nb_Festivals." évènement(s)")?> </p> </div>
	</div>
	<div id="categ_Repas">
		<div>	<a  <?php echo ("href=Page_show-2-categorie.php?Ev=Repas/Banquets&Date=".$Date."");?>><img src="Images_code/IMG_Categorie/categ_repas.jpg"> </a> </div>
		<div> <p> <?php include('comptage.php'); echo ($nb_Repas." évènement(s)")?> </p> </div>
	</div>
	<div id="categ_Concert">
		<div> <a  <?php echo ("href=Page_show-2-categorie.php?Ev=Concerts&Date=".$Date."");?>><img src="Images_code/IMG_Categorie/categ_concerts.jpg"> </a> </div>
		<div> <p> <?php include('comptage.php'); echo ($nb_Concerts." évènement(s)")?> </p> </div>
	</div>
</div><br/>

<div id="categ_ligne2">
	<div id="categ_Brocante">
		<div> <a  <?php echo ("href=Page_show-2-categorie.php?Ev=Brocantes/Marchés&Date=".$Date."");?>><img src="Images_code/IMG_Categorie/categ_brocantes.jpg"> </a> </div>
		<div> <p> <?php include('comptage.php'); echo ($nb_Brocantes." évènement(s)")?> </p> </div>
	</div>
	<div id="categ_Soiree">
		<div> <a  <?php echo ("href=Page_show-2-categorie.php?Ev=Soirées&Date=".$Date."");?>><img src="Images_code/IMG_Categorie/categ_soirees.jpg"> </a> </div>
		<div> <p> <?php include('comptage.php'); echo ($nb_Soirees." évènement(s)")?> </p> </div>
	</div>
	<div id="categ_Conference">
		<div> <a  <?php echo ("href=Page_show-2-categorie.php?Ev=Conférences&Date=".$Date."");?>><img src="Images_code/IMG_Categorie/categ_conferences.jpg"> </a> </div>
		<div> <p> <?php include('comptage.php'); echo ($nb_Conferences." évènement(s)")?> </p> </div>
	</div>
</div><br/>

<div id="categ_ligne3">
	<div id="categ_Humanitaire">
		<div> <a  <?php echo ("href=Page_show-2-categorie.php?Ev=Humanitaires&Date=".$Date."");?>><img src="Images_code/IMG_Categorie/categ_humanitaires.jpg"> </a>  </div>
		<div> <p> <?php include('comptage.php'); echo ($nb_Humanitaire." évènement(s)")?> </p> </div>
	</div>
	<div id="categ_Sportif">
		<div> <a  <?php echo ("href=Page_show-2-categorie.php?Ev=Sportifs&Date=".$Date."");?>><img src="Images_code/IMG_Categorie/categ_sportifs.jpg"> </a> </div>
		<div> <p> <?php include('comptage.php'); echo ($nb_Sportif." évènement(s)")?> </p> </div>
	</div>
	<div id="categ_Manifestation">
		<div> <a  <?php echo ("href=Page_show-2-categorie.php?Ev=Manifestations&Date=".$Date."");?>><img src="Images_code/IMG_Categorie/categ_manifestations.jpg"> </a> </div>
		<div> <p> <?php include('comptage.php'); echo ($nb_Manifestation." évènement(s)")?> </p> </div>
	</div>
</div>

<br/>
