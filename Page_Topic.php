<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');
$req = $bdd->prepare("SELECT COUNT(*) FROM topic_table WHERE ID_Topic = ?");
$req->execute(array($_GET['t']));
$nbmsg = $req->fetch();

$nbpages = ($nbmsg[0] - 1 - (($nbmsg[0] - 1) % 20)) / 20 + 1;

$t = $_GET['t'];

if (!isset($_GET['f']) OR ($_GET['f'] > $nbpages))
{
	header("Location: Page_Topic.php?f=1&t=$t");
	exit;
}

$req = $bdd->prepare('SELECT Titre_Topic FROM forum_table WHERE ID_Topic = ?');
$req->execute(array($_GET['t']));
$data = $req->fetch();

$titre = $data[0];

$req1 = $bdd->prepare('SELECT Admin_Utilisateur FROM utilisateur_table WHERE ID_Utilisateur = ?');
$req1->execute(array($_SESSION['ID_Utilisateur']));
$pseudo_admin_array = $req1->fetch();
$pseudo_admin = $pseudo_admin_array[0];

if (isset($_POST['repondre_message']))
{
	if (isset($_SESSION['pseudo_utilisateur']))
	{

		$req2 = $bdd->prepare('INSERT INTO topic_table(ID_Topic, Pseudo_MSG, Admin_Utilisateur, Date_MSG, Contenu_MSG) VALUES(?,?,?,NOW(),?)');
		$req2->execute(array($_GET['t'], $_SESSION['pseudo_utilisateur'], $pseudo_admin, $_POST['repondre_message']));

		$req3 = $bdd->prepare('UPDATE forum_table SET NB_MSG = NB_MSG + 1, Dernier_MSG = NOW() WHERE ID_Topic = ?');
		$req3->execute(array($_GET['t']));

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
			color: white;
			text-decoration: none;
			font-size: 0.9em;
		}

		.page_actuelle
		{
			background-color: orange;
			color: black;
			text-decoration: none;
			font-size: 0.9em;
		}

		#topic ul
		{
			list-style-type: none;
			display: flex;
			justify-content: space-between;
		}

		#topic ul li
		{
			border: 1px solid black;
			border-radius: 10px;
			padding: 3px;
		}

		.bouton
		{
			background-color: #000099;
		}

		.repondre
		{
			background-color: #990000;
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
			background-color: white;
			margin-left: 10px;
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
			border: 1px rgba(0, 0, 0, .4) solid;
			margin-bottom: 5px;
			background-color: rgba(0, 0, 200, 0.07);
			padding-left: 5px;
			padding-right: 5px;
			margin-left: 5px;
			margin-right: 5px;
		}

		.block_pseudo
		{
			display: inline-block;
			font-size: 1.3em;
			font-weight: bold;
			margin-bottom: 1px;
		}

		.block_admin
		{
			display: inline-block;
			height: inherit;
			margin-top: 10px;
		}

		.block_admin form
		{
			display: inline-block;
		}


		.admin_msg
		{
			color: red;
		}

		.block_date
		{
			display: inline-block;
			float: right;
			color: blue;
			margin-top: 4px;
		}

		.block_contenu
		{
			border-top: 1px rgba(0, 0, 0, .3) solid;
			word-wrap: break-word;
		}

		li
		{
			border: 1px block solid;
			display: inline-block;
			font-weight: 2em;
		}

		#block_repondre
		{
			display: inline-block;
			width: 100%;
			border: 1px black solid;
		}

		#form_repondre
		{
			margin-top: 0px;
		}

		textarea
		{
			height: 90px;
			width: 98%;
			margin-left: 5px;
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

echo '<h3> &nbsp &nbsp &nbsp Sujet : ' . $titre . '</h3>';

?>

		<div id="topic">

	    <ul>
	      <li class="repondre"><a href="#repondre_topic">Répondre</a></li>
	      <li class="bouton"><a href="Page_Forum.php#nouveau_topic">Nouveau sujet</a></li>
	      <li class="bouton"><a href="Page_Forum.php">Liste des sujets</a></li>
				<li class="bouton"> <?php echo "<a href='Page_Topic.php?f=" . $f . "&t=" . $t . "'>Actualiser</a>"; ?> </li>
	    </ul>

<p class="numero_page">

<?php
		for ($i = 1; $i <= $nbpages; $i++)
		{
			if ($f == $i)
			{
				echo " <span class='page_actuelle'>" . $i . '</span>';
			}
			else
			{
				echo " <a href='Page_Topic.php?f=" . $i  . "&t=" . $t . "'>" . $i . '</a>';
			}
		}
?>

</p>

<?php

if ($f != 1)
{
	echo '<form action="Page_Topic.php?f=' . $leftarrow . '&t=' . $t . '" method="POST" id="leftarrow"><input type="submit" value="<" /></form>';
}

if ($f < $nbpages)
{
	echo '<form action="Page_Topic.php?f=' . $rightarrow . '&t=' . $t . '" method="POST" id="rightarrow"><input type="submit" value=">" /></form>';
}

?>

		<div id="block_all_msg">
		<table>

<?php

$nmsg = 20 * ($f - 1);

$mois = array("01" => 'janvier', "02" => 'février', "03" => 'mars', "04" => 'avril', "05" => 'mai', "06" => 'juin', "07" => 'juillet', "08" => 'août', "09" => 'septembre', "10" => 'octobre', "11" => 'novembre', "12" => 'décembre');

$req = $bdd->prepare("SELECT Pseudo_MSG, Admin_Utilisateur, Date_MSG, Contenu_MSG, ID_MSG FROM topic_table WHERE ID_Topic = ? ORDER BY ID_MSG LIMIT $nmsg, 20");
$req->execute(array($_GET['t']));

while ($data = $req->fetch())
{

$date_mois = date_format(date_create($data['Date_MSG']), "m");
$date_mois = "$date_mois";

	if ($pseudo_admin == 'oui')
	{
		if ($data['Admin_Utilisateur'] == 'oui')
		{
			echo "<div class='block_msg'><div class='header_msg'><div class='block_pseudo'><span class='admin_msg'>" . htmlspecialchars($data['Pseudo_MSG']) . "</span></div><div class='block_admin'><form method='POST' action='delete_msg.php' ><input type='image' name='suprmsg' src='Images_code/Supprimer3.png' id='delmsg' value=" . $data['ID_MSG'] . " ></form></div><div class='block_date'>" . date_format(date_create($data['Date_MSG']), "d") . ' ' . $mois[$date_mois] . ' ' . date_format(date_create($data['Date_MSG']), "Y à H:i:s") . "</div></div><div class='block_contenu'>" . htmlspecialchars($data['Contenu_MSG']) . "</div></div>";
		}
		else
		{
			echo "<div class='block_msg'><div class='header_msg'><div class='block_pseudo'>" . htmlspecialchars($data['Pseudo_MSG']) . "</div><div class='block_admin'><form method='POST' action='delete_msg.php' ><input type='image' name='suprmsg' src='Images_code/Supprimer3.png' id='delmsg' value=" . $data['ID_MSG'] . " ></form></div><div class='block_date'>" . date_format(date_create($data['Date_MSG']), "d") . ' ' . $mois[$date_mois] . ' ' . date_format(date_create($data['Date_MSG']), "Y à H:i:s") . "</div></div><div class='block_contenu'>" . htmlspecialchars($data['Contenu_MSG']) . "</div></div>";
		}
	}
	else
	{
		if ($data['Admin_Utilisateur'] == 'oui')
		{
			echo "<div class='block_msg'><div class='header_msg'><div class='block_pseudo'><span class='admin_msg'>" . htmlspecialchars($data['Pseudo_MSG']) . "</span></div><div class='block_date'>" . date_format(date_create($data['Date_MSG']), "d") . ' ' . $mois[$date_mois] . ' ' . date_format(date_create($data['Date_MSG']), "Y à H:i:s") . "</div></div><div class='block_contenu'>" . htmlspecialchars($data['Contenu_MSG']) . "</div></div>";
		}
		else
		{
			echo "<div class='block_msg'><div class='header_msg'><div class='block_pseudo'>" . htmlspecialchars($data['Pseudo_MSG']) . "</div><div class='block_date'>" . date_format(date_create($data['Date_MSG']), "d") . ' ' . $mois[$date_mois] . ' ' . date_format(date_create($data['Date_MSG']), "Y à H:i:s") . "</div></div><div class='block_contenu'>" . htmlspecialchars($data['Contenu_MSG']) . "</div></div>";
		}
	}
}


?>


		</table>
		</div>

<?php

if ($f != 1)
{
	echo '<form action="Page_Topic.php?f=' . $leftarrow . '&t=' . $t . '" method="POST" id="leftarrow"><input type="submit" value="<" /></form>';
}

if ($f < $nbpages)
{
	echo '<form action="Page_Topic.php?f=' . $rightarrow . '&t=' . $t . '" method="POST" id="rightarrow"><input type="submit" value=">" /></form>';
}

?>

<p class="numero_page">

<?php

for ($i = 1; $i <= $nbpages; $i++)
{
	if ($f == $i)
	{
		echo " <span class='page_actuelle'>" . $i . '</span>';
	}
else
	{
		echo " <a href='Page_Topic.php?f=" . $i  . "&t=" . $t . "'>" . $i . '</a>';
	}
}
?>

</p>

			<ul>
				<li class="bouton"><a href="Page_Forum.php#nouveau_topic">Nouveau sujet</a></li>
	      <li class="bouton"><a href="Page_Forum.php">Liste des sujets</a></li>
				<li class="bouton"> <?php echo "<a href='Page_Topic.php?f=" . $f . "&t=" . $t . "'>Actualiser</a>"; ?> </li>
	    </ul>

		<br />
		<br />

		<div id='block_repondre'>

		<form id='form_repondre' <?php echo "action='Page_Topic.php?f=" . $nbpages . "&t=" . $t . "' method='POST'"; ?> >

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
