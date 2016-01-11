<?php
	if(isset($_GET["IDE"])){
			$ID = $_GET["IDE"];
	}
	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
	$req=$bdd->prepare('DELETE from evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($ID));
	$reqbis=$bdd->prepare('DELETE from participation_table WHERE ID_Evenement = ?');
	$reqbis->execute(array($ID));

	header("location:Confirm-Action.php");
?>
