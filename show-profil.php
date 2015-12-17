<?php

	session_start() ;
	$_SESSION["idUtilisateur"] = 54;

	if(isset($_SESSION["idUtilisateur"])){
	  $ID = $_SESSION["idUtilisateur"];
	}
	else{
	  $ID = -1;
	}

	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
	$req = $bdd->prepare('SELECT Pseudo_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Pseudo_Utilisateur]'){ $pseudo = $valeur; }
	}

	$req = $bdd->prepare('SELECT Adresse_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Adresse_Utilisateur]'){ $adresse = $valeur; }
	}

	$req = $bdd->prepare('SELECT Nom_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Nom_Utilisateur]'){ $nom = $valeur; }
	}

	$req = $bdd->prepare('SELECT Prenom_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Prenom_Utilisateur]'){ $prenom = $valeur; }
	}

	$req = $bdd->prepare('SELECT Mail_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Mail_Utilisateur]'){ $mail = $valeur; }
	}

	$req = $bdd->prepare('SELECT Description_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Description_Utilisateur]'){ $desc = $valeur; }
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

<img src="show-image.php" title="Mon image"/>

<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');
}
catch(Exception $e){
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query("SELECT avatar_utilisateur FROM utilisateur_table WHERE id_utilisateur =$ID");

while ($donnees = $reponse->fetch())
{
	//header('Content-type: images/png');
  echo '<img src="'.$donnees['avatar_utilisateur'].'">';
}

$reponse->closeCursor();

//$connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise");
//$result = mysqli_query($connect, "SELECT avatar_utilisateur FROM utilisateur_table WHERE id_utilisateur=$ID");
//header("content-type: ".mysql_result($result, 0, 0));
//echo mysql_result($result, 0, 1);

?>



<fieldset>
<legend>Informations personnelles</legend>

</br>
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
</br> <legend>Evenements auxquels <?php echo $pseudo ?> participe :</legend>
</br>
</fieldset>

<fieldset>
</br> <legend>Evenements que <?php echo $pseudo ?> organise :</legend>
</br>
</fieldset>
