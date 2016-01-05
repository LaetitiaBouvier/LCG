<?php
include("modele_calendrier3.php"); // on inclue le fichier contenant les fonctions

// On déclare nos variable

$mois = $_GET['mois'];
$anne = $_GET['anne'];

?>

<!--  On pose notre titre -->
<h1 style="text-align:center"><?php echo mois($mois)."  ".$anne;?></h1>

<?php
calendrier($mois,$anne); // On génère notre calendrier

?>
