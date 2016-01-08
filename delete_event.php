<?php
	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
	$req=$bdd->prepare('DELETE from evenement_table WHERE ID_Evenement = ?');
	$req->execute(array($_POST['event']));
	header("location:Confirm-Action.php");
?>