<?php
	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
	$req = $bdd->prepare('SELECT * from evenement_table WHERE Nom_Evenement=?');
	$req->execute(array($_POST['event']));
	$donnees = $req->fetch();
	echo $donnees['Nom_Evenement'];
	
?>