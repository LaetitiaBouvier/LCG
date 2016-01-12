<?php
	if(isset($_GET["IDE"])){
			$ID = $_GET["IDE"];
	}
	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
	$req=$bdd->prepare('DELETE from evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));
	$req2=$bdd->prepare('DELETE from participation_table WHERE ID_Evenement = ?');
	$req2->execute(array($ID));
	$req3=$bdd->prepare('DELETE from noter_table WHERE ID_Evenement = ?');
	$req3->execute(array($ID));


	header("location:Confirm-Action.php");
?>
