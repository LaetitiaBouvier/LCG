<?php
	session_start() ;
	if(isset($_GET["Date"])){
			$Date = $_GET["Date"]; }

if(isset($_POST['Date'])){
	$Date = $_POST['Date'];}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title> CATEGORIES PAR DATE </title>
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

		<centralform>
			<div id="corps_inscription">
				<h2> Categories des evenements du <?php echo ("".$Date."");?> </h2>

				<?php include("Categories-2.php"); ?>
			</div>
		</centralform>

		<footer>
			<?php include("footer.php"); ?>
		</footer>
	</body>
</html>
