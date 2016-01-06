<?php
	session_start() ;
	$IDU = $_SESSION["ID_Utilisateur"];

	if(isset($_GET["IDE"])){
			$ID = $_GET["IDE"];
	}
	else{
		$ID = -1;
	}

?>

<?php

	if (isset($_POST['valider']) && ($_POST['valider'] == "Participer à cet évènement")){

		$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
		$req = $bdd->prepare('SELECT ID_Utilisateur FROM participation_table WHERE ID_Utilisateur = ? AND ID_Evenement = ?');
		$req->execute(array($IDU, $ID));

		$data = $req->fetch();


		if($data['ID_Utilisateur'] != $IDU){

				$NbReservations_Participation = 0;

				$connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise"); // mdp = "root", "pass" ou encore "" (A MODIFIER SELON VOTRE ORDI)

				mysqli_query($connect, "insert into participation_table (ID_Utilisateur, ID_Evenement, NbReservations_Participation)
																values ('$IDU', '$ID', '$NbReservations_Participation')")
																or die('Error: ' . mysqli_error($connect));

				echo "Votre participation est confirmée !";

				//header("location:Confirm-Participation-Event.php");
		}else{
			echo "Vous participez déjà à cet évènement !";
		}
	}
?>

<?php

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

	$req = $bdd->prepare('SELECT 	Payant_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Payant_Evenement]'){ $payant = $valeur; }
	}

	$req = $bdd->prepare('SELECT 	LienSiteWeb_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[LienSiteWeb_Evenement]'){ $web = $valeur; }
	}

	$req = $bdd->prepare('SELECT 	JourDebut_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[JourDebut_Evenement]'){ $jourDebut = $valeur; }
	}

	$req = $bdd->prepare('SELECT 	JourFin_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[JourFin_Evenement]'){ $jourFin = $valeur; }
	}

	$req = $bdd->prepare('SELECT 	HeureDebut_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[HeureDebut_Evenement]'){ $heureDebut = $valeur; }
	}

	$req = $bdd->prepare('SELECT 	HeureFin_Evenement FROM evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[HeureFin_Evenement]'){ $heureFin = $valeur; }
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<title> Mon Evènement </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="Style-form.css"/>
	</head>

	<body>
		<centralform>
		<h2> <?php echo $nom ?></h2>


<!-- photo !-->
<form name="inscription" method="post" action="Page_show-event.php?IDE=<?=$ID?>" enctype="multiplart/form-data">
	<?php //echo 'action="Page_show-event.php?IDE='.$IDE.'">"'; ?>
		<br/><div id="valid"><input type="submit" name="valider" value="Participer à cet évènement"/></div><br/>
</form>


<fieldset>
<legend>Informations sur l'Evenement </legend>

</br>
</br> Nom de l'Evenement : <?php echo $nom ?>
</br> Description de l'Evenement : <?php echo $description ?>
</br>
</br> Categorie : <?php echo $categorie ?>
</br>
</br> Publique ciblé : <?php echo $cibles ?>
</br>
</br> Lieu de l'endroit / la salle : <?php echo $lieu ?>
</br> N° de rue : <?php echo $rue ?>
</br> Code postal : <?php echo $postal ?>
</br> Ville : <?php echo $ville ?>
</br> Département : <?php echo $departement ?>
</br>	Region : <?php echo $region ?>
</br>
</br> Début de l'Evement : <?php echo $jourDebut ?> à : <?php echo $heureDebut ?>
</br> Fin de l'Evement : <?php echo $jourFin ?> à : <?php  echo $heureFin ?>
</br>
</br> Nombre maximum de participants : <?php echo $max ?>
</br> Evénement payant : <?php echo $payant ?>
</br>
</br> Lien vers le site web de l'événement : <?php echo $max ?>
</br>
</br>

</fieldset>
