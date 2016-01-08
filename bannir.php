<?php
	if(isset($_GET["IDU"])){
			$ID = $_GET["IDU"];
	}
	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
	$req=$bdd->prepare('DELETE from utilisateur_table WHERE ID_Utilisateur = ?');
	$req->execute(array($ID));
	header("location:Confirm-Action.php");
?>