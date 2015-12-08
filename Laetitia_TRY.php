$categorieFavorite = "";
if(isset($_POST['Festivals']) && !empty($_POST['Festivals']))
  { $categorieFavorite 	.= $_POST['Festivals']; $categorieFavorite .= " ";}
else
  { $categorieFavorite .= "";}
if(isset($_POST['Repas/Banquets']) && !empty($_POST['Repas/Banquets']))
  { $categorieFavorite 	.= $_POST['Repas/Banquets']; $categorieFavorite .= " ";}
else
  { $categorieFavorite .= "";}
if(isset($_POST['Concerts']) && !empty($_POST['Concerts']))
  { $categorieFavorite 	.= $_POST['Concerts']; $categorieFavorite .= " ";}
else
  { $categorieFavorite .= "";}
if(isset($_POST['Brocantes/Marchés']) && !empty($_POST['Brocantes/Marchés']))
  { $categorieFavorite 	.= $_POST['Brocantes/Marchés']; $categorieFavorite .= " ";}
else
  { $categorieFavorite .= "";}
if(isset($_POST['Soirées']) && !empty($_POST['Soirées']))
  { $categorieFavorite 	.= $_POST['Soirées']; $categorieFavorite .= " ";}
else
  { $categorieFavorite .= "";}
if(isset($_POST['Conférences']) && !empty($_POST['Conférences']))
  { $categorieFavorite 	.= $_POST['Conférences']; $categorieFavorite .= " ";}
else
  { $categorieFavorite .= "";}
if(isset($_POST['Humanitaires']) && !empty($_POST['Humanitaires']))
  { $categorieFavorite 	.= $_POST['Humanitaires']; $categorieFavorite .= " ";}
else
  { $categorieFavorite .= "";}
if(isset($_POST['Sportifs']) && !empty($_POST['Sportifs']))
  { $categorieFavorite 	.= $_POST['Sportifs']; $categorieFavorite .= " ";}
else
  { $categorieFavorite .= "";}
if(isset($_POST['Manifestations']) && !empty($_POST['Manifestations']))
  { $categorieFavorite 	.= $_POST['Manifestations']; $categorieFavorite .= " ";}
else
  { $categorieFavorite .= "";}


REDIRECTION DE PAGE : 
  <a href="Accueil.php" onclick="window.open('http://localhost/github/Accueil.php', 'exemple', 'height=30%, width=30%, top=90, left=350', );">RETOUR VERS LA PAGE D'ACCUEIL!</a>
