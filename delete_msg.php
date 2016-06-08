<?php
	if(isset($_POST["supprmsg"])){
			$IDT = $_POST["supprmsg"];
	}
	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
	$req=$bdd->prepare('DELETE from topic_table WHERE ID_MSG = ?');
	$req->execute(array($IDT));
	header("location:Confirm-Action.php");
?>
