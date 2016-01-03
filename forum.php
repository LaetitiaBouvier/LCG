<?php

session_start();
$_SESSION['pseudo_utilisateur'] = "dimiboydimiboy1";
echo 'Bonjour ' . $_SESSION['pseudo_utilisateur'] . " ! Bienvenue sur La Connexion Gauloise !";

if (isset($_POST['nouveau_titre_topic']))
{
	$bdd1 = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', 'root');
	$req = $bdd1->prepare('INSERT INTO forum_table(Titre_Topic, PseudoAuteur_Topic, NB_MSG, Dernier_MSG) VALUES(?,?,1,NOW())');
	$req->execute(array($_POST['nouveau_titre_topic'], $_SESSION['pseudo_utilisateur']));
}

if (!isset($_GET['f']))
{
	header("Location: forum.php?f=1");
}

if (isset($_POST['leftarrow']))
{
	$_GET['f']--;
	echo "oui";
}
elseif (isset($_POST['rightarrow']))
{
	$_GET['f']++;
	echo "non";
}

$page1 = 0;
$page2 = $page1 + 25;

?>

<!DOCTYPE html>
<html>
	<head>
		<title> FORUM </title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Style-form.css"/>
		<style>

		#forum
		{
			display: inline-block;
			border: 1px solid black;
			width: 800px;
		}

		th
		{
			border: 1px solid black;
			text-transform: uppercase;
			font-size: 1.3em;
			background-color: #DDDDDD;
		}
		td
		{
			border: 1px solid black;
			font-size: 1.2em;
		}

		.impair
		{
			background-color: #EEEEEE;
		}

		.pair
		{
			background-color: white;
		}

		table
		{
			border-collapse: collapse;
		}

		#creation_topic
		{
			display: inline-block;
			position: relative;
		}

		#nouveau_topic
		{
			color: black;
			font-size: 1.3em;
			text-align: left;
		}

		#nouveau_titre_topic
		{
			width: 90%;
		}

		textarea
		{
			height: 90px;
			width: 100%;
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

		<div id="forum">

      <table>

<?php

echo '<tr><th>Sujet</th><th>Auteur</th><th>NB</th><th>Dernier MSG</th>';

$bdd2 = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', 'root');
$req = $bdd2->prepare("SELECT Titre_Topic, PseudoAuteur_Topic, NB_MSG, Dernier_MSG FROM forum_table ORDER BY Dernier_MSG DESC LIMIT $page1, $page2");
$req->execute(array($page1, $page2));

$i = 0;

while ($donnees = $req->fetch())
{
	$i++;

($i%2 == 1)?$classe="impair":$classe="pair";

  echo '<tr class=' . $classe . '><td>' . htmlspecialchars($donnees['Titre_Topic']) . '</td><td>' . htmlspecialchars($donnees['PseudoAuteur_Topic']) . '</td><td>' . htmlspecialchars($donnees['NB_MSG']) . '</td><td>' . htmlspecialchars($donnees['Dernier_MSG']) . '</td></tr>';
}

?>

      </table>

			<br />

			<form action="forum.php" method="POST">

	      <input type="submit" name="leftarrow" value="<" />
				<input type="submit" name="rightarrow" value=">" />

	    </form>

			<br />
			<br />
			<br />

			<div id="creation_topic">

			<h2 id="nouveau_topic">Nouveau Topic</h2>

			<form action="forum.php" method="POST">

	      <p><input type="text" name="nouveau_titre_topic" id="nouveau_titre_topic" maxlength=50 placeholder="Saisir le titre du topic" size="300px" /></p>
	      <p><textarea name="premier_message" id="premier_message" placeholder="Ne postez pas d'insultes, évitez les majuscules, faites une recherche avant de poster pour voir si la question n'a pas déjà été posée... Tout message d'incitation au piratage est strictement interdit et sera puni d'un banissement." /></textarea></p>
	      <p><input type="submit" value="Poster" /></p>

	    </form>

			</div>

		</div>

		<footer>
			<?php include("footer.php"); ?>
		</footer>
	</body>
</html>
