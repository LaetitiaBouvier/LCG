<?php

session_start();

if (!isset($_GET['f']))
{
	header('Location: Page_Forum.php?f=1');
	exit;
}

$f = $_GET['f'];
$page = $_GET['f'] - 1;
$leftarrow = $_GET['f'] - 25;
$rightarrow = $_GET['f'] + 25;

if (($_GET['f'] % 25) != 1)
{
	$f2 = $f - (($f - 1) % 25);
	header("Location: Page_Forum.php?f=$f2");
	exit;
}

$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');

$req1 = $bdd->prepare('SELECT Admin_Utilisateur FROM utilisateur_table WHERE ID_Utilisateur = ?');
$req1->execute(array($_SESSION['ID_Utilisateur']));
$pseudo_admin_array = $req1->fetch();
$pseudo_admin = $pseudo_admin_array[0];

if (isset($_POST['nouveau_titre_topic']))
{
	if (isset($_SESSION['pseudo_utilisateur']))
	{
		if (($_POST['nouveau_titre_topic'] != "") AND ($_POST['premier_message'] != ""))
		{

			$req2 = $bdd->prepare('INSERT INTO forum_table(ID_Utilisateur, Admin_Utilisateur, Titre_Topic, PseudoAuteur_Topic, NB_MSG, Dernier_MSG) VALUES(?,?,?,?,0,NOW())');
			$req2->execute(array($_SESSION['ID_Utilisateur'],$pseudo_admin , $_POST['nouveau_titre_topic'], $_SESSION['pseudo_utilisateur']));

			$req = $bdd->query('SELECT ID_Topic FROM forum_table ORDER BY ID_Topic DESC');
			$data = $req->fetch();

			$t = $data[0];

			$req = $bdd->prepare('INSERT INTO topic_table(ID_Topic, Pseudo_MSG, Admin_Utilisateur, Date_MSG, Contenu_MSG) VALUES(?,?,?,NOW(),?)');
			$req->execute(array($t, $_SESSION['pseudo_utilisateur'], $pseudo_admin, $_POST['premier_message']));

			header("Location: Page_Topic.php?f=1&t=$t");
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

		#forum
		{
			margin-left: 20px;
			margin-top: 20px;
			padding-left: 5px;
			background-color: #F5F5F5;
			display: inline-block;
			border: 1px solid black;
			width: 800px;

		}

		#block_boutons
		{
			display: inline-block;
			width: 800px;
			height: 100px;
		}

		#nv_topic, #actualiser
		{
			border: 2px solid black;
			border-radius: 10px;
			padding-left: 3px;
			padding-right: 3px;
			background-color: #000099;
			display: inline-block;
		}

		#nv_topic
		{
			margin-top: 10px;
			margin-left: 15px;
		}

		#actualiser
		{
			float: right;
			margin-top: 10px;
			margin-right: 30px;
		}

		#nv_topic:hover, #actualiser:hover
		{
			background-color: #539ef9;
		}

		#nv_topic a, #actualiser a
		{
			color: white;
			text-decoration: none;
			font-size: 1.3em;
		}

		.heure
		{
			color: blue;
			font-size: 1.27em;
		}

		#arrow
		{
			float: right;
			margin-right: 175px;
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

		.admin_topic
		{
			color: red;
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
			font-size: 0.7em;
		}

		#premier_message
		{
			width: 98%;
			height: 200px;
			font-size: 0.6em;
		}

		#bouton_poster
		{
			font-size: 0.7em;
			border: 2px solid black;
			border-radius: 30px;
			padding: 3px;
			background-color: #1200505;
			padding-left: 20px;
			padding-right: 20px;
		}

		#bouton_poster:hover
		{
			background-color: #e8222b;
		}

		#taillesujet
		{
			width: 480px;
		}

		#taillesujet_admin
		{
			width: 455px;
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
		</br>

		<div id = "block_boutons" >

	    <div id="nv_topic"><a href="#nouveau_topic">Nouveau sujet</a></div>
			<div id="actualiser"> <?php echo "<a href='Page_Forum.php?f=" . $f . "'>Actualiser</a>"; ?> </div>

		</div>

		<form method="POST" action="Page_Forum.php"><input type="text" name="barre_forum" id="barre_forum" placeholder="Rechercher un sujet" ><input type="submit" value="Rechercher" ></form> </br>

      <table>

<tr>

<?php

if ($pseudo_admin == 'oui')
{
	echo '<th id="taillesujet_admin">Sujet</th>';
}
else
{
	echo '<th id="taillesujet">Sujet</th>';
}

?>

<th id='taillepseudo'>Auteur</th><th>NB</th><th>Dernier MSG</th>
</tr>

<?php

$req = $bdd->query("SELECT ID_Topic, Titre_Topic, PseudoAuteur_Topic, Admin_Utilisateur, NB_MSG, Dernier_MSG FROM forum_table ORDER BY Dernier_MSG DESC LIMIT $page, 25");

$i = 0;

$datedujour = date("d-m-y");

while ($data = $req->fetch())
{
	($i%2 == 1)?$classe="impair":$classe="pair";

	if ($pseudo_admin == 'oui')
	{
		if ($data['Admin_Utilisateur'] == 'oui')
		{
			if (date_create($data['Dernier_MSG']) >= date_create(date("y-m-d")))
			{
				echo '<tr class=' . $classe . "><td><a href='Page_Topic.php?f=1&t=" . $data['ID_Topic'] . "'>" . htmlspecialchars($data['Titre_Topic']) . '</a></td><td class="admin_topic">' . htmlspecialchars($data['PseudoAuteur_Topic']) . '</td><td>' . $data['NB_MSG'] . '</td><td class="heure">' . date_format(date_create($data['Dernier_MSG']), 'H:i:s') . '</td><td><form method="POST" action="delete_topic.php" ><input type="image" name="supprtopic" src="Images_code/Supprimer3.png" id="deltopic" value=' . $data['ID_Topic'] . ' ></form></td></tr>';
			}
			else
			{
				echo '<tr class=' . $classe . "><td><a href='Page_Topic.php?f=1&t=" . $data['ID_Topic'] . "'>" . htmlspecialchars($data['Titre_Topic']) . '</a></td><td class="admin_topic">' . htmlspecialchars($data['PseudoAuteur_Topic']) . '</td><td>' . $data['NB_MSG'] . '</td><td class="heure">' . date_format(date_create($data['Dernier_MSG']), 'd/m/Y') . '</td><td><form method="POST" action="delete_topic.php" ><input type="image" name="supprtopic" src="Images_code/Supprimer3.png" id="deltopic" value=' . $data['ID_Topic'] . ' ></form></td></tr>';
			}
		}
		else
		{
			if (date_create($data['Dernier_MSG']) >= date_create(date("y-m-d")))
			{
				echo '<tr class=' . $classe . "><td><a href='Page_Topic.php?f=1&t=" . $data['ID_Topic'] . "'>" . htmlspecialchars($data['Titre_Topic']) . '</a></td><td>' . htmlspecialchars($data['PseudoAuteur_Topic']) . '</td><td>' . $data['NB_MSG'] . '</td><td class="heure">' . date_format(date_create($data['Dernier_MSG']), 'H:i:s') . '</td><td><form method="POST" action="delete_topic.php" ><input type="image" name="supprtopic" src="Images_code/Supprimer3.png" id="deltopic" value=' . $data['ID_Topic'] . ' ></form></td></tr>';
			}
			else
			{
				echo '<tr class=' . $classe . "><td><a href='Page_Topic.php?f=1&t=" . $data['ID_Topic'] . "'>" . htmlspecialchars($data['Titre_Topic']) . '</a></td><td>' . htmlspecialchars($data['PseudoAuteur_Topic']) . '</td><td>' . $data['NB_MSG'] . '</td><td class="heure">' . date_format(date_create($data['Dernier_MSG']), 'd/m/Y') . '</td><td><form method="POST" action="delete_topic.php" ><input type="image" name="supprtopic" src="Images_code/Supprimer3.png" id="deltopic" value=' . $data['ID_Topic'] . ' ></form></td></tr>';
			}
		}
	}

	else
	{
		if ($data['Admin_Utilisateur'] == 'oui')
		{
			if (date_create($data['Dernier_MSG']) >= date_create(date("y-m-d")))
			{
				echo '<tr class=' . $classe . "><td><a href='Page_Topic.php?f=1&t=" . $data['ID_Topic'] . "'>" . htmlspecialchars($data['Titre_Topic']) . '</a></td><td class="admin_topic">' . htmlspecialchars($data['PseudoAuteur_Topic']) . '</td><td>' . $data['NB_MSG'] . '</td><td class="heure">' . date_format(date_create($data['Dernier_MSG']), 'H:i:s') . '</td></tr>';
			}
			else
			{
				echo '<tr class=' . $classe . "><td><a href='Page_Topic.php?f=1&t=" . $data['ID_Topic'] . "'>" . htmlspecialchars($data['Titre_Topic']) . '</a></td><td class="admin_topic">' . htmlspecialchars($data['PseudoAuteur_Topic']) . '</td><td>' . $data['NB_MSG'] . '</td><td class="heure">' . date_format(date_create($data['Dernier_MSG']), 'd/m/Y') . '</td></tr>';
			}
		}
		else
		{
			if (date_create($data['Dernier_MSG']) >= date_create(date("y-m-d")))
			{
				echo '<tr class=' . $classe . "><td><a href='Page_Topic.php?f=1&t=" . $data['ID_Topic'] . "'>" . htmlspecialchars($data['Titre_Topic']) . '</a></td><td>' . htmlspecialchars($data['PseudoAuteur_Topic']) . '</td><td>' . $data['NB_MSG'] . '</td><td class="heure">' . date_format(date_create($data['Dernier_MSG']), 'H:i:s') . '</td></tr>';
			}
			else
			{
				echo '<tr class=' . $classe . "><td><a href='Page_Topic.php?f=1&t=" . $data['ID_Topic'] . "'>" . htmlspecialchars($data['Titre_Topic']) . '</a></td><td>' . htmlspecialchars($data['PseudoAuteur_Topic']) . '</td><td>' . $data['NB_MSG'] . '</td><td class="heure">' . date_format(date_create($data['Dernier_MSG']), 'd/m/Y') . '</td></tr>';
			}
		}
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
	echo '<form action="Page_Forum.php?f=' . $leftarrow . '" method="POST" id="leftarrow"><input type="submit" value="<" /></form>';
}

if ($page < $limitetopic)
{
	echo '<form action="Page_Forum.php?f=' . $rightarrow . '" method="POST" id="rightarrow"><input type="submit" value=">" /></form>';
}


?>

			<br />
			<br />
			<br />

			<div id="creation_topic">

			<h3 id="nouveau_topic">Nouveau Topic</h3>

			<form action="Page_Forum.php?f=1" method="POST">

	      <p><input type="text" name="nouveau_titre_topic" id="nouveau_titre_topic" maxlength=50 placeholder="Saisir le titre du topic" size="300px" /></p>
	      <p><textarea name="premier_message" id="premier_message" placeholder="Ne postez pas d'insultes, évitez les majuscules, faites une recherche avant de poster pour voir si la question n'a pas déjà été posée... Tout message d'incitation au piratage est strictement interdit et sera puni d'un banissement." /></textarea></p>
	      <p><input type="submit" value="Poster" id="bouton_poster" /></p>

	    </form>
			</br>

			</div>
			</br>

		</div>
		</br>

		<footer>
			<?php include("footer.php"); ?>
		</footer>
	</body>
</html>
