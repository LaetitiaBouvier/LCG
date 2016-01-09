<?php


	if(isset($_SESSION["ID_Utilisateur"])){
	  $ID = $_SESSION["ID_Utilisateur"];
	}
	else{
	  $ID = -1;
	}

?>

<?php
if(isset($_SESSION["ID_Utilisateur"])){

  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
  $req = $bdd->prepare('SELECT Categorie_Favorite FROM utilisateur_table WHERE id_utilisateur = ?');
  $req->execute(array($ID));

  $data = $req->fetch();

  $chaineCat = null;

  foreach($data as $cle => $valeur) {
		if($cle == '[Categorie_Favorite]'){ $chaineCat = $valeur; }
	}

  $OKFestivals = false;
  $OKRespas_Banquets = false;
  $OKConcerts = false;
  $OKBroquante_Marchés = false;
  $OKSoirées = false;
  $OKConférences = false;
  $OKHumanitaires = false;
  $OKSportifs = false;
  $OKManifestations = false;

  if( strstr($chaineCat, "Festivals"          ))  { $OKFestivals = true;          }
  if( strstr($chaineCat, "Repas/Banquets"     ))  { $OKRespas_Banquets = true;    }
  if( strstr($chaineCat, "Concerts"           ))  { $OKConcerts = true;           }
  if( strstr($chaineCat, "Brocantes/Marchés"  ))  { $OKBroquante_Marchés = true;  }
  if( strstr($chaineCat, "Soirées"            ))  { $OKSoirées = true;            }
  if( strstr($chaineCat, "Conférences"        ))  { $OKConférences = true;        }
  if( strstr($chaineCat, "Humanitaires"       ))  { $OKHumanitaires = true;       }
  if( strstr($chaineCat, "Sportifs"           ))  { $OKSportifs = true;           }
  if( strstr($chaineCat, "Manifestations"     ))  { $OKManifestations = true;     }

}
?>

<form name="categories" method="post" action="" enctype="multiplart/form-data">

	<p>    Vous pouvez consulter les évènements liés à un catégorie en cliquant sur la catégorie de votre choix ! <br/> </p>

	<fieldset>
	<legend>Liste des categories :</legend>

	<br>
	<br/>
	<div id="categ_ligne1">
		<div id="categ_Festival"><a  href="Page_show-1-categorie.php?Ev=Festivals"><img src="Images_code/IMG_Categorie/categ_festival.jpg"> </a> </div>
		<div id="categ_Repas"><a  href="Page_show-1-categorie.php?Ev=Repas/Banquets"><img src="Images_code/IMG_Categorie/categ_repas.jpg"> </a> </div>
		<div id="categ_Concert"><a  href="Page_show-1-categorie.php?Ev=Concerts"><img src="Images_code/IMG_Categorie/categ_concerts.jpg"> </a> </div>
	</div><br/>
	<div id="categ_ligne2">
		<div id="categ_Brocante"><a  href="Page_show-1-categorie.php?Ev=Brocantes/Marchés"><img src="Images_code/IMG_Categorie/categ_brocantes.jpg"> </a> </div>
		<div id="categ_Soiree"><a  href="Page_show-1-categorie.php?Ev=Soirées"><img src="Images_code/IMG_Categorie/categ_soirees.jpg"> </a> </div>
		<div id="categ_Conference"><a  href="Page_show-1-categorie.php?Ev=Conférences"><img src="Images_code/IMG_Categorie/categ_conferences.jpg"> </a> </div>
	</div><br/>
	<div id="categ_ligne3">
		<div id="categ_Humanitaire"><a  href="Page_show-1-categorie.php?Ev=Humanitaires"><img src="Images_code/IMG_Categorie/categ_humanitaires.jpg"> </a>  </div>
		<div id="categ_Sportif"><a  href="Page_show-1-categorie.php?Ev=Sportifs"><img src="Images_code/IMG_Categorie/categ_sportifs.jpg"> </a> </div>
		<div id="categ_Manifestation"><a  href="Page_show-1-categorie.php?Ev=Manifestations"><img src="Images_code/IMG_Categorie/categ_manifestations.jpg"> </a> </div>
	</div><br/>

	<br/>

</form>

<?php

  if( ($ID != -1) && (isset($_POST['valider'])) && ($_POST['valider'] == "Valider mes selections") ){

    $categorieFavorite = "";

    if(isset($_POST['categorieFavorite1']) && !empty($_POST['categorieFavorite1']))	{ $categorieFavorite 	.= $_POST['categorieFavorite1']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite2']) && !empty($_POST['categorieFavorite2']))	{ $categorieFavorite 	.= $_POST['categorieFavorite2']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite3']) && !empty($_POST['categorieFavorite3']))	{ $categorieFavorite 	.= $_POST['categorieFavorite3']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite4']) && !empty($_POST['categorieFavorite4']))	{ $categorieFavorite 	.= $_POST['categorieFavorite4']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite5']) && !empty($_POST['categorieFavorite5']))	{ $categorieFavorite 	.= $_POST['categorieFavorite5']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite6']) && !empty($_POST['categorieFavorite6']))	{ $categorieFavorite 	.= $_POST['categorieFavorite6']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite7']) && !empty($_POST['categorieFavorite7']))	{ $categorieFavorite 	.= $_POST['categorieFavorite7']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite8']) && !empty($_POST['categorieFavorite8']))	{ $categorieFavorite 	.= $_POST['categorieFavorite8']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite9']) && !empty($_POST['categorieFavorite9']))	{ $categorieFavorite 	.= $_POST['categorieFavorite9']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}

    $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
    $req = $bdd->prepare('UPDATE utilisateur_table SET Categorie_Favorite="'.$categorieFavorite.'" WHERE ID_Utilisateur ="'.$ID.'"');
    $req->execute();

		header("location:Confirm-Modif-Categories.html");

  }
?>
