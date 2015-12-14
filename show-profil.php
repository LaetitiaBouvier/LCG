<?php

	session_start() ;
	$_SESSION["idUtilisateur"] = 52;

	if(isset($_SESSION["idUtilisateur"])){
	  $ID = $_SESSION["idUtilisateur"];
	}
	else{
	  $ID = -1;
	}

	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
	$req = $bdd->prepare('SELECT Adresse_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Adresse_Utilisateur]'){ $adresse = $valeur; echo $adresse;}
	}

	$req = $bdd->prepare('SELECT Nom_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Nom_Utilisateur]'){ $nom = $valeur; echo $nom;}
	}

	$req = $bdd->prepare('SELECT Prenom_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Prenom_Utilisateur]'){ $prenom = $valeur; echo $prenom; }
	}

	$req = $bdd->prepare('SELECT Mail_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Mail_Utilisateur]'){ $mail = $valeur; echo $mail; }
	}

	$req = $bdd->prepare('SELECT Description_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Description_Utilisateur]'){ $desc = $valeur; echo $desc; }
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<title> INSCRIPTION </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="Style-form.css"/>
	</head>

	<body>
		<centralform>
		<h2> <!-- Pseudo !--> </h2>


<!-- photo !-->

<fieldset>
<legend>Informations personnelles</legend>
</br> Nom : <?php echo $nom ?>
</br> Prénom : <?php echo $prenom ?>
</br>
</br> Code postal : <?php echo $adresse ?>
</br>
</br> Adresse e-mail : <?php echo $mail ?>
</br>
</br> Présentation : <?php echo $desc ?>
</fieldset>

<fieldset>
</br> <legend>Evenements auxquels <!-- pseudo !--> participe :</legend>
</br>
</fieldset>

<fieldset>
</br> <legend>Evenements que <!-- pseudo !--> organise :</legend>
</br>
</fieldset>
