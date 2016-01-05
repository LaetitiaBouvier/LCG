<?php

session_start();
$_SESSION['pseudo_utilisateur'] = "dimiboydimiboy1";
echo 'Bonjour ' . $_SESSION['pseudo_utilisateur'] . " ! Bienvenue sur La Connexion Gauloise !";

if (isset($_POST['repondre_message']))
{
	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', 'root');
	$req = $bdd->prepare('INSERT INTO topic_table(Pseudo_MSG, Date_MSG, Contenu_MSG) VALUES(?,NOW(),?)');
	$req->execute(array($_SESSION['pseudo_utilisateur'], $_POST['repondre_message']));
}

$page = $_GET['f'] - 1;
$leftarrow = $_GET['f'] - 20;
$rightarrow = $_GET['f'] + 20;

?>

<!DOCTYPE html>
<html>

	<head>
		<title> TOPIC </title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Style-form.css"/>

		<style>

		#topic
		{
			display: inline-block;
			border: 1px black solid;
			width: 800px;
		}

		#block_all_msg
		{
			display: inline-block;
			width: inherit;
		}

		.block_msg
		{
			border: 1px black solid;
			margin-bottom: 5px;
		}

		.block_pseudo
		{
			border: 1px black solid;
			display: inline-block;
		}

		.block_date
		{
			border: 1px black solid;
			display: inline-block;
			float: right;
		}

		.block_contenu
		{
			border: 1px black solid;
			word-wrap: break-word;
		}

		textarea
		{
			height: 90px;
			width: 100%;
		}

		#leftarrow
		{
			display: inline-block;
			margin-left: 20px;
			margin-bottom: 30px;
		}

		#rightarrow
		{
			display: inline-block;
			float: right;
			margin-right: 20px;
		}

		</style>

  </head>

  <body>

  	<header>
  		<?php include("header.php"); ?>
  	</header>

  	<nav>
      <?php include("menu_deroulant.php"); ?>
    </nav>

<?php

echo '<h3>Sujet : ' . $_GET['t'] . '</h3>';

?>

		<div id="topic">

    <ul>
      <li><a href="#repondre_topic">Répondre</a></li>
      <li>Nouveau sujet</li>
      <li>Liste des sujets</li>
			<li><a href="topic.php?f=1">Actualiser</a></li>
    </ul>

<?php

$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', 'root');
$req = $bdd->query("SELECT COUNT(*) FROM topic_table");
$nbmsg = $req->fetch();
$limitemsg = $nbmsg[0] - 20;

if ($page != 0)
{
	echo '<form action="topic.php?f=' . $leftarrow . '" method="POST" id="leftarrow"><input type="submit" value="<" /></form>';
}

if ($page < $limitemsg)
{
	echo '<form action="topic.php?f=' . $rightarrow . '" method="POST" id="rightarrow"><input type="submit" value=">" /></form>';
}

?>

		<div id="block_all_msg">
		<table>

<?php

$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', 'root');
$req = $bdd->query("SELECT Pseudo_MSG, Date_MSG, Contenu_MSG FROM topic_table ORDER BY ID_MSG LIMIT $page, 20");
$req->execute(array($page));

while ($data = $req->fetch())
{
echo "<div class='block_msg'><div class='header_msg'><div class='block_pseudo'>" . htmlspecialchars($data['Pseudo_MSG']) . "</div><div class='block_date'>" . htmlspecialchars($data['Date_MSG']) . "</div></div><div class='block_contenu'>" . htmlspecialchars($data['Contenu_MSG']) . '</div></div>';
}

?>

		</table>
		</div>




<?php

if ($page != 0)
{
	echo '<form action="topic.php?f=' . $leftarrow . '" method="POST" id="leftarrow"><input type="submit" value="<" /></form>';
}

if ($page < $limitemsg)
{
	echo '<form action="topic.php?f=' . $rightarrow . '" method="POST" id="rightarrow"><input type="submit" value=">" /></form>';
}

?>

		<ul>
			<li>Nouveau sujet</li>
			<li>Liste des sujets</li>
			<li>Actualiser</li>
		</ul>

		<div>

		<h3 id="repondre_topic">Répondre</h3>

		<form action="topic.php?f=1" method="POST">

			<p><textarea name="repondre_message" id="repondre_message" placeholder="Ne postez pas d'insultes, évitez les majuscules, faites une recherche avant de poster pour voir si la question n'a pas déjà été posée... Tout message d'incitation au piratage est strictement interdit et sera puni d'un banissement." /></textarea></p>
			<p><input type="submit" value="Poster" /></p>

		</form>

		</div>

		</div>

    <footer>
      <?php include("footer.php"); ?>
    </footer>

  </body>

</html>
