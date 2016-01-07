<?php

session_start();

if (!isset($_GET['f']))
{
	header('Location: topic.php?f=1');
	exit;
}

$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', 'root');
$req = $bdd->prepare('SELECT Titre_Topic FROM forum_table WHERE ID_Topic = ?');
$req->execute(array($_GET['t']));
$data = $req->fetch();

$titre = $data[0];

if (isset($_POST['repondre_message']))
{
	if (isset($_SESSION['pseudo_utilisateur']))
	{
		$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', 'root');
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
$page = $_GET['f'] - 1;
$leftarrow = $_GET['f'] - 20;
$rightarrow = $_GET['f'] + 20;

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
			float: right;
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

echo '<h3>Sujet : ' . $titre . '</h3>';

?>

		<div id="topic">

    <ul>
      <li><a href="#repondre_topic">Répondre</a></li>
      <li><a href="forum.php#nouveau_topic">Nouveau sujet</a></li>
      <li><a href="forum.php">Liste des sujets</a></li>
			<li> <?php echo "<a href='topic.php?f=" . $f . "&t=" . $t . "'>Actualiser</a>"; ?> </li>
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
$req = $bdd->prepare("SELECT Pseudo_MSG, Date_MSG, Contenu_MSG FROM topic_table WHERE ID_Topic = ? ORDER BY ID_MSG LIMIT $page, 20");
$req->execute(array($_GET['t']));

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
			<li><a href="forum.php#nouveau_topic">Nouveau sujet</a></li>
      <li><a href="forum.php">Liste des sujets</a></li>
			<li> <?php echo "<a href='topic.php?f=" . $f . "&t=" . $t . "'>Actualiser</a>"; ?> </li>
    </ul>

		<div>

		<h3 id="repondre_topic">Répondre</h3>

		<form <?php echo "action='topic.php?f=1&t=" . $t . "' method='POST'"; ?> >

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
