<?php
	if(isset($_GET["IDU"])){
			$ID = $_GET["IDU"];
	}

	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
	$req2=$bdd->prepare('DELETE from participation_table WHERE ID_Utilisateur = ?');
	$req2->execute(array($ID));

	$req5=$bdd->prepare('DELETE from abonnerutilisateur_table WHERE ID_UtilisateurAbonne = ?');
	$req5->execute(array($ID);

	$req4=$bdd->prepare('SELECT Pseudo_Utilisateur FROM utilisateur_table WHERE ID_Utilisateur = ?');
	$req4->execute(array($ID));
	$data = $req->fetch();
	$req3=$bdd->prepare('DELETE from evenement_table WHERE Organisateur_Evenement = ?');
	$req3->execute(array($data['Pseudo_Utilisateur']));
	
	$req=$bdd->prepare('DELETE from utilisateur_table WHERE ID_Utilisateur = ?');
	$req->execute(array($ID));

	header("location:Confirm-Action.php");
?>
