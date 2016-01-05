<!-- insertion de la fonction permettant d'ajouter des utilisateurs à la base de données !-->
<?php
	require 'FonctionsEvent.php';
	insert_events();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title> CREER UN EVENEMENT</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="style-form.css"/>
	</head>
	<body>

		<h2> Formulaire de création d'événements : </h2>
		<!-- insertion du formulaire!-->
		<?php include("Form-Event.html"); ?>
	</body>
</html>
