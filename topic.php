<?php

session_start();
if(isset($_SESSION["ID_Utilisateur"])){ $IDU = $_SESSION["ID_Utilisateur"]; }

	if(isset($_GET["IDE"])){
			$ID = $_GET["IDE"];
	}
	else{
		$ID = -1;
	}
$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');
$req = $bdd->prepare("SELECT COUNT(*) FROM topic_table WHERE ID_Topic = ?");
$req->execute(array($_GET['t']));
$nbmsg = $req->fetch();

$nbpages = ($nbmsg[0] - 1 - (($nbmsg[0] - 1) % 20)) / 20 + 1;

$t = $_GET['t'];

if (!isset($_GET['f']) OR ($_GET['f'] > $nbpages))
{
	header("Location: topic.php?f=1&t=$t");
	exit;
}

$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');
$req = $bdd->prepare('SELECT Titre_Topic FROM forum_table WHERE ID_Topic = ?');
$req->execute(array($_GET['t']));
$data = $req->fetch();

$titre = $data[0];

if (isset($_POST['repondre_message']))
{
	if (isset($_SESSION['pseudo_utilisateur']))
	{
		$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');
		$req = $bdd->prepare('INSERT INTO topic_table(ID_Topic,Pseudo_MSG, Date_MSG, Contenu_MSG) VALUES(?,?,NOW(),?)');
		$req->execute(array($_GET['t'], $_SESSION['pseudo_utilisateur'], $_POST['repondre_message']));

		$req = $bdd->prepare('UPDATE forum_table SET NB_MSG = NB_MSG + 1, Dernier_MSG = NOW() WHERE ID_Topic = ?');
		$req->execute(array($_GET['t']));

	}
	else
	{
		echo "<div id='block_top'><p>Vous tentez d'accéder à un contenu qui nécessite que vous soyez connecté(e).<p><div id='arrow'><img src=images/arrow.gif alt='flèche'></div></div>";
	}

}

$t = $_GET['t'];
$f = $_GET['f'];
$leftarrow = $_GET['f'] - 1;
$rightarrow = $_GET['f'] + 1;

?>

<!DOCTYPE html>
<html>

	<head>
		<title> <?php echo $titre; ?> </title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Style-form.css"/>

		<style>

		a
		{
			color: black;
			text-decoration: none;
		}

		#page_actuelle
		{
			background-color: orange;
		}

		#topic ul
		{
			list-style-type: none;
			display: flex;
			justify-content: space-between;
		}

		#block_top
		{
			margin-bottom: 100px;
		}

		#arrow
		{
			margin-right: 175px;
		}

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

		.numero_page
		{
			text-align: center;
			text-decoration: none;
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
		}

		#rightarrow
		{
			display: inline-block;
			float: right;
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

echo '<h3>Sujet : ' . $titre . '</h3>';

?>

		<div id="topic">

	    <ul>
	      <li><a href="#repondre_topic">Répondre</a></li>
	      <li><a href="forum.php#nouveau_topic">Nouveau sujet</a></li>
	      <li><a href="forum.php">Liste des sujets</a></li>
				<li> <?php echo "<a href='topic.php?f=" . $f . "&t=" . $t . "'>Actualiser</a>"; ?> </li>
	    </ul>

<p class="numero_page">

<?php
		for ($i = 1; $i <= $nbpages; $i++)
		{
			if ($f == $i)
			{
				echo " <a id='page_actuelle' href='topic.php?f=" . $i  . "&t=" . $t . "'>" . $i . '</a>';
			}
			else
			{
				echo " <a href='topic.php?f=" . $i  . "&t=" . $t . "'>" . $i . '</a>';
			}
		}
?>

</p>

<?php

if ($f != 1)
{
	echo '<form action="topic.php?f=' . $leftarrow . '&t=' . $t . '" method="POST" id="leftarrow"><input type="submit" value="<" /></form>';
}

if ($f < $nbpages)
{
	echo '<form action="topic.php?f=' . $rightarrow . '&t=' . $t . '" method="POST" id="rightarrow"><input type="submit" value=">" /></form>';
}

?>

		<div id="block_all_msg">
		<table>

<?php

$nmsg = 20 * ($f - 1);

$mois = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');

$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');
$req = $bdd->prepare("SELECT Pseudo_MSG, Date_MSG, Contenu_MSG, ID_MSG FROM topic_table WHERE ID_Topic = ? ORDER BY ID_MSG LIMIT $nmsg, 20");
$req->execute(array($_GET['t']));

while ($data = $req->fetch())
{
echo "<div class='block_msg'><div class='header_msg'><div class='block_pseudo'>" . htmlspecialchars($data['Pseudo_MSG']) . "</div><div class='block_date'>" . date_format(date_create($data['Dernier_MSG']), "d") . ' ' . $mois[date_format($data['Dernier_MSG'], "m")] . ' ' . date_format(date_create($data['Dernier_MSG']), "Y à H:i:s") . "</div></div><div class='block_contenu'>" . htmlspecialchars($data['Contenu_MSG']) . '</div>';

$req3=$bdd->prepare('SELECT Admin_Utilisateur FROM utilisateur_table WHERE ID_Utilisateur = ?');
	$req3->execute(array($IDU));
	$admin=$req3->fetch();
if ($admin['Admin_Utilisateur']=="oui"){?>
		<form method='post' action="delete_msg.php" >
			<input type="image" name='suprmsg' src='Images_code/Supprimer3.png' id="delmsg" value= <?php echo($data['ID_MSG']);?> ><?php
}
echo "</div>";
}

?>

		</table>
		</div>

<?php

if ($f != 1)
{
	echo '<form action="topic.php?f=' . $leftarrow . '&t=' . $t . '" method="POST" id="leftarrow"><input type="submit" value="<" /></form>';
}

if ($f < $nbpages)
{
	echo '<form action="topic.php?f=' . $rightarrow . '&t=' . $t . '" method="POST" id="rightarrow"><input type="submit" value=">" /></form>';
}

?>

<p class="numero_page">

<?php

for ($i = 1; $i <= $nbpages; $i++)
{
	if ($f == $i)
	{
		echo " <a id='page_actuelle' href='topic.php?f=" . $i  . "&t=" . $t . "'>" . $i . '</a>';
	}
else
	{
		echo " <a href='topic.php?f=" . $i  . "&t=" . $t . "'>" . $i . '</a>';
	}
}
?>

</p>

			<ul>
				<li><a href="forum.php#nouveau_topic">Nouveau sujet</a></li>
	      <li><a href="forum.php">Liste des sujets</a></li>
				<li> <?php echo "<a href='topic.php?f=" . $f . "&t=" . $t . "'>Actualiser</a>"; ?> </li>
	    </ul>

		<div>

		<h3 id="repondre_topic">Répondre</h3>

		<form <?php echo "action='topic.php?f=" . $nbpages . "&t=" . $t . "' method='POST'"; ?> >

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
