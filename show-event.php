<?php

	session_start() ;
	$_SESSION["idEvenement"] = 35;

	if(isset($_SESSION["idEvenement"])){
	  $ID = $_SESSION["idEvenement"];
	}
	else{
	  $ID = -1;
	}

	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
	$req = $bdd->prepare('SELECT Nom_Evenement FROM evenement_table WHERE 	ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Nom_Evenement]'){ $nom = $valeur; }
	}

	$req = $bdd->prepare('SELECT Description_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Description_Evenement]'){ $description = $valeur; }
	}

	$req = $bdd->prepare('SELECT Categorie_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Categorie_Evenement]'){ $categorie= $valeur; }
	}

	$req = $bdd->prepare('SELECT Cibles_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Cibles_Evenement]'){ $cibles = $valeur; }
	}

	$req = $bdd->prepare('SELECT NomLieu_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[NomLieu_Evenement]'){ $lieu = $valeur; }
	}

	$req = $bdd->prepare('SELECT 	AdresseRue_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[AdresseRue_Evenement]'){ $rue= $valeur; }
	}

	$req = $bdd->prepare('SELECT 	AdressePostal_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[AdressePostal_Evenement]'){ $postal = $valeur; }
	}

	$req = $bdd->prepare('SELECT 	AdresseDepartement_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[AdresseDepartement_Evenement]'){ $departement = $valeur; }
	}

	$req = $bdd->prepare('SELECT 	AdresseRegion_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[AdresseRegion_Evenement]'){ $region = $valeur; }
	}

	$req = $bdd->prepare('SELECT 	AdresseVille_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[AdresseVille_Evenement]'){ $ville = $valeur; }
	}

	$req = $bdd->prepare('SELECT 	NbMaxParticipants_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[NbMaxParticipants_Evenement]'){ $max = $valeur; }
	}

	$req = $bdd->prepare('SELECT 	NbMaxParticipants_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[NbMaxParticipants_Evenement]'){ $max = $valeur; }
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
		<h2> <?php echo $pseudo ?></h2>


<!-- photo !-->

<fieldset>
<legend>Informations sur l'Evenement </legend>

</br>
</br> Nom de l'Evenement : <?php echo $nom ?>
</br> Description de l'Evenement : <?php echo $prenom ?>
</br>
</br> Categorie : <?php echo $adresse ?>
</br>
</br> Publique ciblé : <?php echo $mail ?>
</br>
</br> Lieu de l'endroit / la salle : <?php echo $desc ?>
</br> N° de rue :
</br> Code postal :
</br> Ville :
</br> Département :
</br>	Region :
</br>
</br> Début de l'Evement : à :
</br> Fin de l'Evement : à :
</br>
</br> Nombre maximum de participants :
</br> Evénement payant :
</br>
</br> Lien vers le site web de l'événement :
</br>
</br>

</fieldset>
