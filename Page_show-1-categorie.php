<?php
	session_start() ;

	if(isset($_GET["Ev"])){
			$Ev = $_GET["Ev"];
	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title> <?php echo("".$Ev."") ?> </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="corps_accueil.css"/>

		<link rel="stylesheet" href="Style-form.css"/>

	</head>

	<body>
		<header>
			<?php include("header.php"); ?>
		</header>

		<nav>
      <?php include("menu_deroulant.php"); ?>
    </nav>

		<centralform>
			<div id="corps_event">
				<h2> <?php echo("".$Ev."") ?>  </h2>

				<?php include("show-1-categorie.php"); ?>
		</centralform>

			</div>
			</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
		<footer>
			<?php include("footer.php"); ?>
		</footer>
	</body>
</html>
