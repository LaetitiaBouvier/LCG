<?php
	if(isset($_GET["IDU"])){
			$ID = $_GET["IDU"];
	}
	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
	if ($admin2['Admin_Utilisateur']=="oui"){
		$req=$bdd->prepare('UPDATE utilisateur_table SET Admin_Utilisateur = "non" WHERE ID_Utilisateur = ?');
		$req->execute(array($ID));
	}
	else {
		$req=$bdd->prepare('UPDATE utilisateur_table SET Admin_Utilisateur = "oui" WHERE ID_Utilisateur = ?');
		$req->execute(array($ID));
	}
	header("location:Confirm-Action.php");
?>
