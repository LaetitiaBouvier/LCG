<?php
if(isset($_GET["Date"])){
    $Date = $_GET["Date"]; }
?>


<a href=<?php echo("Page_show-2-categorie.php?Ev=Festivals&Date=".$Date."")?>><img source="Images_code/IMG_Categorie/calendrier_festival.png"/> </a>
<a href=<?php echo("Page_show-2-categorie.php?Ev=Repas/Banquets&Date=".$Date."")?>><img source="Images_code/IMG_Categorie/calendrier_repas.png"/> </a>
<a href=<?php echo("Page_show-2-categorie.php?Ev=Concerts&Date=".$Date."")?>><img source="Images_code/IMG_Categorie/calendrier_concerts.png"/> </a>
<a href=<?php echo("Page_show-2-categorie.php?Ev=Brocantes/Marchés&Date=".$Date."")?>><img source="Images_code/IMG_Categorie/calendrier_brocantes.png"/> </a>
<a href=<?php echo("Page_show-2-categorie.php?Ev=Soirées&Date=".$Date."")?>><img source="Images_code/IMG_Categorie/calendrier_soiree.png"/> </a>
<a href=<?php echo("Page_show-2-categorie.php?Ev=Conférences&Date=".$Date."")?>><img source="Images_code/IMG_Categorie/calendrier_conferences.png"/> </a>
<a href=<?php echo("Page_show-2-categorie.php?Ev=Humanitaires&Date=".$Date."")?>><img source="Images_code/IMG_Categorie/calendrier_humanitaires.png"/> </a>
<a href=<?php echo("Page_show-2-categorie.php?Ev=Manifestations&Date=".$Date."")?>><img source="Images_code/IMG_Categorie/calendrier_manifestations.png"/> </a>


<a href="comptage.php?Date=2015-12-05"> COMPTAGE </a>;
<a href="Page_Categories-2.php?Date=2015-12-05"> CATEGORIES </a>;
