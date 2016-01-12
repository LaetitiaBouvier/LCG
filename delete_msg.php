<?php
	if(isset($_POST["suprmsg"])){
			$IDT = $_POST["suprmsg"];
	}
	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
	$req=$bdd->prepare('DELETE from topic_table WHERE ID_MSG = ?');
	$req->execute(array($IDT));
	header("location:Confirm-Action.php");
?>
