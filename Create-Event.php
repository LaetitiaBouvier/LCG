<!-- insertion de la fonction permettant d'ajouter des utilisateurs à la base de données !-->
<?php

	session_start() ;

	require 'FonctionsEvent.php';
	insert_events();

?>


		<h2> Formulaire de création d'événements : </h2>
		<!-- insertion du formulaire!-->
		<?php include("Form-Event.html"); ?>
