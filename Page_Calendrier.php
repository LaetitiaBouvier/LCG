<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title> CALENDRIER </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="Style-form.css"/>

	</head>

	<body>
    <header>
			<?php include("header.php"); ?>
    </header>

    <nav>
			<?php include("menu_deroulant.php"); ?>
    </nav>

		<div id="calendrier">
			</br>

			<form name="recherche_date" method="post" action="Page_Categories-2.php" enctype="multiplart/form-data">
			<p>Rechercher les evenements ayant lieu le :</p>
			<input type="date" name="Date"/>
			<input type="submit" name="CHERCHER DATE" />
		</br></br>
			<?php // include("calendrier.html"); ?>
		</br></br>
			<?php include("pseudo_calendrier.php"); ?>
		</br></br></br>
		</div>

		<footer>
			<?php include("footer.php"); ?>
		</footer>
	 </body>
</html>
