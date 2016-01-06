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
		<title> Evènements auxquels je participe </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="Style-form.css"/>
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

    $reqbis = $bdd->prepare('SELECT Nom_Evenement FROM evenement_table WHERE ID_Evenement ="'.$row['ID_Evenement'].'"');
    $reqbis->execute();

    $data = $reqbis->fetch();

    echo '<a href="Page_show-event.php?IDE='.$row['ID_Evenement'].'">"'.$data['Nom_Evenement'].'"</a>', '<br/>';
  }

?>

<br/>

</fieldset>

</form>
