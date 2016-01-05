<?php

	session_start() ;

	if(isset($_SESSION["ID_Utilisateur"])){
	  $ID = $_SESSION["ID_Utilisateur"];
	}
	else{
	  $ID = -1;

		echo "Vous ne vous êtes pas connecté !!!";
	}

?>

<?php

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

?>

<form name="categories" method="post" action="" enctype="multiplart/form-data">

<p>    Vous pouvez consulter les évènements liés à un catégorie en cliquant sur la catégorie de votre choix ! <br/> </p>

<fieldset>
<legend>Liste des categories :</legend>

<br>
<br/>
<a href="Page_show-1-categorie.php?Ev=Festivals"> 				Festivals 				</a>	<br/>
<a href="Page_show-1-categorie.php?Ev=Repas/Banquets"> 		Repas/Banquets 		</a>	<br/>
<a href="Page_show-1-categorie.php?Ev=Concerts"> 					Concerts 					</a>	<br/>
<a href="Page_show-1-categorie.php?Ev=Brocantes/Marchés"> Brocantes/Marchés </a>	<br/>
<a href="Page_show-1-categorie.php?Ev=Soirées"> 					Soirées 					</a>	<br/>
<a href="Page_show-1-categorie.php?Ev=Conférences"> 			Conférences 			</a>	<br/>
<a href="Page_show-1-categorie.php?Ev=Humanitaires"> 			Humanitaires 			</a>	<br/>
<a href="Page_show-1-categorie.php?Ev=Sportifs"> 					Sportifs 					</a>	<br/>
<a href="Page_show-1-categorie.php?Ev=Manifestations"> 		Manifestations 		</a>	<br/>

<br/>

</fieldset>

<p>    Vous pouvez vous aussi abonner ou vous désabonner à une ou plusieurs catégories ! <br/> </p>

<br/>
<fieldset>
<legend>Liste des categories :</legend>

<br>
<br/>
<input type="checkbox" name="categorieFavorite1" value="Festivals"          <?php if ($OKFestivals)         { echo 'checked="checked"'; }         ?>/>Festivals<br>
<input type="checkbox" name="categorieFavorite2" value="Repas/Banquets"     <?php if ($OKRespas_Banquets)   { echo 'checked="checked"'; }    ?>/>Repas/Banquets<br>
<input type="checkbox" name="categorieFavorite3" value="Concerts"           <?php if ($OKConcerts)          { echo 'checked="checked"'; }          ?>/>Concerts<br>
<input type="checkbox" name="categorieFavorite4" value="Brocantes/Marchés"  <?php if ($OKBroquante_Marchés) { echo 'checked="checked"'; } ?>/>Brocantes/Marchés<br>
<input type="checkbox" name="categorieFavorite5" value="Soirées"            <?php if ($OKSoirées)           { echo 'checked="checked"'; }           ?>/>Soirées<br>
<input type="checkbox" name="categorieFavorite6" value="Conférences"        <?php if ($OKConférences)       { echo 'checked="checked"'; }       ?>/>Conférences<br>
<input type="checkbox" name="categorieFavorite7" value="Humanitaires"       <?php if ($OKHumanitaires)      { echo 'checked="checked"'; }      ?>/>Humanitaires<br>
<input type="checkbox" name="categorieFavorite8" value="Sportifs"           <?php if ($OKSportifs)          { echo 'checked="checked"'; }          ?>/>Sportifs<br>
<input type="checkbox" name="categorieFavorite9" value="Manifestations"     <?php if ($OKManifestations)    { echo 'checked="checked"'; }    ?>/>Manifestations<br>
<br/>

</fieldset>

<br/><div id="valid"><input type="submit" name="valider" value="Valider mes selections"/></div><br/>

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
