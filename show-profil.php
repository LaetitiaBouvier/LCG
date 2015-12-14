<?php

	session_start() ;
	$_SESSION["idUtilisateur"] = 52;

	if(isset($_SESSION["idUtilisateur"])){
	  $ID = $_SESSION["idUtilisateur"];
	}
	else{
	  $ID = -1;
	}

	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');
	$req = $bdd->prepare('SELECT * FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($ID));

	$data = $req->fetch();
	//print_r($data);

	foreach($data as $cle => $valeur)
	{
		 //echo $cle ,' : ', $valeur;
		 if($cle == '[nom_utilisateur]'){ $nom = $valeur; echo $nom;}
		 if($cle == '[prenom_utilisateur]'){ $prenom = $valeur; echo " ".$prenom;}
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
</br> Nom :
</br> Prénom :
</br>
</br> Code postal :
</br>
</br> Adresse e-mail :
</br>
</br> Présentation :
</fieldset>

<fieldset>
</br> <legend>Evenements auxquels <!-- pseudo !--> participe :</legend>
</br>
</fieldset>

<fieldset>
</br> <legend>Evenements que <!-- pseudo !--> organise :</legend>
</br>
</fieldset>
