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
	$req = $bdd->prepare('SELECT Pseudo_Utilisateur, Adresse_Utilisateur, Nom_Utilisateur, Prenom_Utilisateur, Avatar_Utilisateur, Date_Naissance, Mail_Utilisateur, Description_Utilisateur,
															 OKadresse_Utilisateur, OKmail_Utilisateur, OKNomPrenom_Utilisateur, OKplanning_Utilisateur
												FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($ID));

	$data = $req->fetch();

	$pseudo=$data['Pseudo_Utilisateur'];
	$nom=$data['Nom_Utilisateur'];
	$prenom=$data['Prenom_Utilisateur'];
	$datenaissance=$data['Date_Naissance'];
	$adresse=$data['Adresse_Utilisateur'];
	$mail=$data['Mail_Utilisateur'];
	$desc=$data['Description_Utilisateur'];
	$avatar=$data['Avatar_Utilisateur'];
	$OKadresse_Utilisateur=$data['OKadresse_Utilisateur'];
	$OKmail_Utilisateur=$data['OKmail_Utilisateur'];
	$OKNomPrenom_Utilisateur=$data['OKNomPrenom_Utilisateur'];
	$OKplanning_Utilisateur=$data['OKplanning_Utilisateur'];
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
</br> Nom : <?php if($OKNomPrenom_Utilisateur == "oui") { echo $nom; } else { echo "Non divulgué";}  ?>
</br> Prénom : <?php if($OKNomPrenom_Utilisateur == "oui") { echo $prenom; } else { echo "Non divulgué";} ?>
</br> Date de naissance : <?php if($OKNomPrenom_Utilisateur == "oui") { echo $datenaissance; } else { echo "Non divulgué";}  ?>
</br>
</br> Code postal : <?php if($OKadresse_Utilisateur == "oui") { echo $adresse; } else { echo "Non divulgué";} ?>
</br>
</br> Adresse e-mail : <?php if($OKmail_Utilisateur == "oui") { echo $mail; } else { echo "Non divulgué";} ?>
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

	if($OKplanning_Utilisateur == "oui") { echo '<a href="Page_show-event.php?IDE='.$row['ID_Evenement'].'">'.$data['Nom_Evenement'].'</a>', '<br/>'; }
}
if($OKplanning_Utilisateur == "non") { echo "Non divulgué"; }


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
				echo '<a href="Page_show-event.php?IDE='.$IDE.' " target="_blank">'.$row['Nom_Evenement'].'</a>', '<br/>';
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

$req2=$bdd->prepare('SELECT Admin_Utilisateur FROM utilisateur_table WHERE ID_Utilisateur = ?');
	$req2->execute(array($ID));
	$admin2=$req2->fetch();

	if ($admin['Admin_Utilisateur']=="oui"){?>
		<form name='delete' method='post' action=<?php echo ("bannir.php?IDU=".$ID."");?> enctype='multipart/form-data'>
			<input type="submit" name="valider" value="BANNIR ":>
		</form>
	</br>
		<h3><?php if ($admin2['Admin_Utilisateur']=="oui"){ echo "Ce membre est administrateur";}
		else {echo "Ce membre n'est pas administrateur";} ?><h3>
		<form name='droit' method='post' action=<?php echo ("droit_admin.php?IDU=".$ID."");?> enctype='multipart/form-data'>
			<input type="submit" name="valider" value="DONNER / RETIRER LES DROITS D'ADMINISTRATEUR "/>
		</form><?php } ?>


</div>
