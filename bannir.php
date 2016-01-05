<?php
	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
	$req=$bdd->prepare('DELETE from utilisateur_table WHERE Pseudo_Utilisateur = ?');
	$req->execute(array($_POST['pseudo']));
	header("location:Confirm-Action.php");
?>