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

<p>    Vous pouvez consulter les utilisateurs que vous suivez en cliquant dessus <br/> </p>
<br/>


<fieldset>
<legend>Liste de mes utilisateurs suivis :</legend>

<br>

<?php

  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/

  $req = $bdd->prepare('SELECT ID_UtilisateurCible FROM abonnerutilisateur_table WHERE ID_UtilisateurAbonne ="'.$ID.'"');
  $req->execute();

  foreach($req as $row){

    $reqbis = $bdd->prepare('SELECT Pseudo_Utilisateur FROM utilisateur_table WHERE ID_Utilisateur ="'.$row['ID_UtilisateurCible'].'"');
    $reqbis->execute();

    $data = $reqbis->fetch();

    echo '<a href="Page_show-profil.php?IDU='.$row['ID_UtilisateurCible'].'">"'.$data['Pseudo_Utilisateur'].'"</a>', '<br/>';
  }

?>

<br/>

</fieldset>

</form>
