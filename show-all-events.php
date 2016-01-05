<?php

	session_start() ;

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
		<title> Mes évènements </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="Style-form.css"/>
	</head>

<form name="évènements" method="post" action="" enctype="multiplart/form-data">

<p>    Vous pouvez consulter et modifier vos évènements en cliquant dessus <br/> </p>
<br/>


<fieldset>
<legend>Liste de mes évènements :</legend>

<br>

<?php

//  $connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise");

  //$reponses = mysqli_query($connect, "SELECT Nom_Evenement FROM evenement_table WHERE Organisateur_Evenement ='.test.'");

  //echo $reponses;

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

    $reqbis = $bdd->prepare('SELECT ID_Evenement FROM evenement_table WHERE Organisateur_Evenement ="'.$pseudo.'" AND Nom_Evenement ="'.$row['Nom_Evenement'].'"');
    $reqbis->execute();

    foreach($reqbis as $rowbis){

        $IDE = $rowbis['ID_Evenement'];
        echo '<a href="show-event.php?IDE='.$IDE.' " target="_blank">"'.$row['Nom_Evenement'].'"</a>', '<br/>';
    }
  }

?>

<br/>

</fieldset>

</form>
