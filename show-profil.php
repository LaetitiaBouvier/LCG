<?php


	if(isset($_SESSION["ID_Utilisateur"])){ $IDU = $_SESSION["ID_Utilisateur"]; } // ATTENTION : Ici $IDU correspond à l'ID de l'utilisateur connecté

	if(isset($_GET['IDU'])){
	  $ID = $_GET['IDU'];																													// ATTENTION : Ici 'IDU' correspond à l'ID de l'utilisateur recherché
	}
	else{
	  $ID = -1;
	}

	?>

	<?php

		if (isset($_POST['valider']) && ($_POST['valider'] == "Suivre/Ne plus suivre cet utilisateur")){

			$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
			$req = $bdd->prepare('SELECT ID_UtilisateurAbonne FROM abonnerutilisateur_table WHERE ID_UtilisateurAbonne = ? AND ID_UtilisateurCible = ?');
			$req->execute(array($IDU, $ID));

			$data = $req->fetch();

			if($data['ID_UtilisateurAbonne'] != $IDU){

					$NbReservations_Participation = 0;

					$connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise"); // mdp = "root", "pass" ou encore "" (A MODIFIER SELON VOTRE ORDI)

					mysqli_query($connect, "insert into abonnerutilisateur_table (ID_UtilisateurAbonne, ID_UtilisateurCible)
																	values ('$IDU', '$ID')")
																	or die('Error: ' . mysqli_error($connect));

					echo "Vous suivez bien cet utilisateur !";

					//header("location:Confirm-Participation-Event.php");
			}else{

				$NbReservations_Participation = 0;

				$connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise"); // mdp = "root", "pass" ou encore "" (A MODIFIER SELON VOTRE ORDI)

				mysqli_query($connect, "DELETE FROM abonnerutilisateur_table WHERE ID_UtilisateurAbonne = $IDU AND ID_UtilisateurCible = $ID")
																or die('Error: ' . mysqli_error($connect));

				echo "Vous ne suivez pas/plus cet utilisateur !";
			}
		}
	?>


	<?php

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

	$req = $bdd->prepare('SELECT Date_Naissance FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Date_Naissance]'){ $datenaissance = $valeur; }
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

	$req = $bdd->prepare('SELECT Avatar_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	foreach($data as $cle => $valeur) {
		if($cle == '[Avatar_Utilisateur]'){ $avatar = $valeur; }
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<title> Profil </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="Style-form.css"/>
	</head>

	<body>
		<centralform>
		<h2> <?php echo $pseudo ?></h2>
		<img src="Images_code/IMG_Profil_Moyen/<?php echo $avatar ?>.jpg" title="Mon image"/>


<!-- photo !-->

<?php if (isset($_SESSION["ID_Utilisateur"])): ?>
	<form name="inscription" method="post" action="Page_show-profil.php?IDU=<?=$ID?>" enctype="multiplart/form-data">
		<?php //echo 'action="Page_show-event.php?IDE='.$IDE.'">"'; ?>
			<br/><div id="valid"><input type="submit" name="valider" value="Suivre/Ne plus suivre cet utilisateur"/></div><br/>
	</form>
<?php else: ?>
<?php endif; ?>

<fieldset>
<legend>Informations personnelles</legend>

</br>
</br> Nom : <?php echo $nom ?>
</br> Prénom : <?php echo $prenom ?>
</br> Date de naissance : <?php echo $datenaissance ?>
</br>
</br> Code postal : <?php echo $adresse ?>
</br>
</br> Adresse e-mail : <?php echo $mail ?>
</br>
</br> Présentation : <?php echo $desc ?>
</fieldset>

<fieldset>
</br> <legend>Evenements auxquels <?php echo $pseudo ?> participe :</legend>
<?php

$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/

$req = $bdd->prepare('SELECT ID_Evenement FROM participation_table WHERE ID_Utilisateur ="'.$IDU.'"');
$req->execute();

foreach($req as $row){

	$reqbis = $bdd->prepare('SELECT Nom_Evenement FROM evenement_table WHERE ID_Evenement ="'.$row['ID_Evenement'].'"');
	$reqbis->execute();

	$data = $reqbis->fetch();

	echo '<a href="Page_show-event.php?IDE='.$row['ID_Evenement'].'">"'.$data['Nom_Evenement'].'"</a>', '<br/>';
}


?>

</fieldset>

<fieldset>
</br> <legend>Evenements que <?php echo $pseudo ?> organise :</legend>
<?php
	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/

	$req = $bdd->prepare('SELECT Pseudo_Utilisateur FROM utilisateur_table WHERE ID_Utilisateur ="'.$IDU.'"');
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
				echo '<a href="Page_Modif-Event.php?IDE='.$IDE.' " target="_blank">"'.$row['Nom_Evenement'].'"</a>', '<br/>';
		}
	}
?>


</fieldset>
</fieldset>
<div id=boutons_admin>
<?php $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
$req=$bdd->prepare('SELECT Admin_Utilisateur FROM utilisateur_table WHERE ID_Utilisateur = ?');
	$req->execute(array($IDU));
	$admin=$req->fetch();

	if ($admin['Admin_Utilisateur']=="oui"){?>
	<form name='delete' method='post' action=<?php echo ("bannir.php?IDU=".$ID."");?> enctype='multipart/form-data'>
		<input type="submit" name="valider" value="BANNIR "/>
	</form><?php } ?>


</div>
