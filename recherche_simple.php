<?php

  if(isset($_POST['barre_de_recherche'])){  $recherche = $_POST['barre_de_recherche']; }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<title> Mes évènements </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="Style-form.css"/>
	</head>

<form name="recherche" method="post" action="" enctype="multiplart/form-data">

<p>    Vous pouvez consulter les profils correspondant en cliquant dessus <br/> </p>
<br/>


<fieldset>
<legend>Liste des profils correspondant :</legend>

<br>
<?php
  if(isset($_POST['barre_de_recherche'])){
    $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/

    $req = $bdd->prepare('SELECT Pseudo_Utilisateur, ID_Utilisateur FROM utilisateur_table WHERE Pseudo_Utilisateur LIKE "%'.$recherche.'%"');
    $req->execute();

    foreach($req as $row)
    {
      echo '<a href="Page_show-profil.php?IDU='.$row['ID_Utilisateur'].' " >"'.$row['Pseudo_Utilisateur'].'"</a>', '<br/>';
    }
  }
?>
<br/>

</fieldset>

<fieldset>
<legend>Liste des évènements correspondant :</legend>

<br>
<?php
  if(isset($_POST['barre_de_recherche'])){
    $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/

    $req = $bdd->prepare('SELECT Nom_Evenement, ID_Evenement FROM evenement_table WHERE Nom_Evenement LIKE "%'.$recherche.'%"');
    $req->execute();

    foreach($req as $row)
    {
      echo '<a href="Page_show-event.php?IDE='.$row['ID_Evenement'].' " >"'.$row['Nom_Evenement'].'"</a>', '<br/>';
    }
  }
?>
<br/>

</fieldset>

</form>
