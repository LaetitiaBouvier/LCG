<!-- insertion de la fonction permettant d'ajouter des utilisateurs à la base de données !-->
<?php
	require 'FonctionsUtilisateurs.php';
	insert_users();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<title> INSCRIPTION </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="Style-form.css"/>
	</head>

	<body>
		<centralform>
		<h2> Formulaire de création de profil </h2>
		<!-- insertion du formulaire!-->
		<?php include("Form-Profil.php"); ?>
	 </centralform>
	</body>

</html>
