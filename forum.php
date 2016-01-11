<?php

session_start();

if (!isset($_GET['f']))
{
	header('Location: forum.php?f=1');
	exit;
}

$f = $_GET['f'];
$page = $_GET['f'] - 1;
$leftarrow = $_GET['f'] - 25;
$rightarrow = $_GET['f'] + 25;

if (($_GET['f'] % 25) != 1)
{
	$f2 = $f - (($f - 1) % 25);
	header("Location: forum.php?f=$f2");
	exit;
}

if (isset($_POST['nouveau_titre_topic']))
{
	if (isset($_SESSION['pseudo_utilisateur']))
	{
		if (($_POST['nouveau_titre_topic'] != "") AND ($_POST['premier_message'] != ""))
		{
			$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');
			$req = $bdd->prepare('INSERT INTO forum_table(Titre_Topic, PseudoAuteur_Topic, NB_MSG, Dernier_MSG) VALUES(?,?,0,NOW())');
			$req->execute(array($_POST['nouveau_titre_topic'], $_SESSION['pseudo_utilisateur']));

			$req = $bdd->query('SELECT ID_Topic FROM forum_table ORDER BY ID_Topic DESC');
			$data = $req->fetch();

			$t = $data[0];

			$req = $bdd->prepare('INSERT INTO topic_table(ID_Topic, Pseudo_MSG, Date_MSG, Contenu_MSG) VALUES(?,?,NOW(),?)');
			$req->execute(array($t, $_SESSION['pseudo_utilisateur'], $_POST['premier_message']));

			header("Location: topic.php?f=1&t=$t");
			exit;
		}
		else
		{
			if ($_POST['nouveau_titre_topic'] == "")
			{
				echo "<p class='warning'>Vous n'avez pas écrit le titre de votre topic!</p>";
			}
			if ($_POST['premier_message'] == "")
			{
				echo "<p class='warning'>Vous n'avez pas écrit le premier message de votre topic!</p>";
			}
		}
	}
	else
	{
		echo "<div id='block_top'><p class='warning'>Vous tentez d'accéder à un contenu qui nécessite que vous soyez connecté(e).</p></div>";
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title> Forum </title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Style-form.css"/>
		<style>

		a
		{
			text-decoration: none;
		}

		.warning
		{
			color: red;
			font-size: 2em;
			text-decoration: none;
			text-transform: uppercase;
		}

		#forum ul
		{
			list-style-type: none;
			display: flex;
			justify-content: space-between;
		}

		.heure
		{
			color: blue;
			font-size: 1.27em;
		}

		#block_top
		{
			margin-bottom: 100px;
		}

		#arrow
		{
			float: right;
			margin-right: 175px;
		}

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
			font-size: 1.25em;
			background-color: #DDDDDD;
		}

		td
		{
			border: 1px solid black;
			font-size: 1.1em;
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

		#taillesujet
		{
			width: 480px;
		}

		#taillepseudo
		{
			width: 130px;
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

		<div id="forum">

		<ul>
	    <li><a href="#nouveau_topic">Nouveau sujet</a></li>
	    <li>Barre de recherche</li>
			<li> <?php echo "<a href='forum.php?f=" . $f . "'>Actualiser</a>"; ?> </li>
	  </ul>

      <table>

<?php

echo "<tr><th id='taillesujet'>Sujet</th><th id='taillepseudo'>Auteur</th><th>NB</th><th>Dernier MSG</th>";

$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');
$req = $bdd->query("SELECT ID_Topic, Titre_Topic, PseudoAuteur_Topic, NB_MSG, Dernier_MSG FROM forum_table ORDER BY Dernier_MSG DESC LIMIT $page, 25");

$i = 0;

$datedujour = date("d-m-y");

while ($data = $req->fetch())
{
	$i++;

	($i%2 == 1)?$classe="impair":$classe="pair";

	if (date_create($data['Dernier_MSG']) >= date_create(date("y-m-d")))
	{
		echo '<tr class=' . $classe . "><td><a href='topic.php?f=1&t=" . $data['ID_Topic'] ."'>" . htmlspecialchars($data['Titre_Topic']) . '</a></td><td>' . htmlspecialchars($data['PseudoAuteur_Topic']) . '</td><td>' . $data['NB_MSG'] . '</td><td class="heure">' . date_format(date_create($data['Dernier_MSG']), 'H:i:s') . '</td></tr>';
	}
	else
	{
		echo '<tr class=' . $classe . "><td><a href='topic.php?f=1&t=" . $data['ID_Topic'] ."'>" . htmlspecialchars($data['Titre_Topic']) . '</a></td><td>' . htmlspecialchars($data['PseudoAuteur_Topic']) . '</td><td>' . $data['NB_MSG'] . '</td><td class="heure">' . date_format(date_create($data['Dernier_MSG']), 'd/m/Y') . '</td></tr>';
	}

}

?>

      </table>

<?php

$req = $bdd->query("SELECT COUNT(*) FROM forum_table");
$nbtopic = $req->fetch();
$limitetopic = $nbtopic[0] - 25;

if ($page != 0)
{
	echo '<form action="forum.php?f=' . $leftarrow . '" method="POST" id="leftarrow"><input type="submit" value="<" /></form>';
}

if ($page < $limitetopic)
{
	echo '<form action="forum.php?f=' . $rightarrow . '" method="POST" id="rightarrow"><input type="submit" value=">" /></form>';
}


?>

			<br />
			<br />
			<br />

			<div id="creation_topic">

			<h2 id="nouveau_topic">Nouveau Topic</h2>

			<form action="forum.php?f=1" method="POST">

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
