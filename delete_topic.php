<?php
	if(isset($_POST["supprtopic"]))
	{
			$IDF = $_POST["supprtopic"];
	}
	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
	$req = $bdd->prepare('DELETE from forum_table WHERE ID_Topic = ?');
	$req->execute(array($IDF));
	header("location:Confirm-Action.php");
?>
