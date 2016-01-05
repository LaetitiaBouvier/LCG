<!DOCTYPE html>
<html>
	<head>
	<link href="calendrier.css" rel="stylesheet" type="text/css" />
	<title>Calendrier</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

	<body>

<?php
$mois = date("m");  // prend par défaut la valeur du mois actuelle
$anne = date("Y"); // prend par défaut la valeur de l'anné actuelle
?>

<!-- on insère les images -->
<div style="margin-bottom:5%" >
    <img id="pre" src="Images_code/calendrier_fleche_precedent.png" height="40px" width="40px" style="float:left">
    <img id="post" src="Images_code/calendrier_fleche_suivant.png" height="40px" width="40px" style="float:right">
 </div>

<!-- on créez une div qui contiendra notre calendrier -->
<div id="cont" >

</div>



<script src="http://code.jquery.com/jquery.min.js"></script>


var mois = <?php echo $mois;?>; // prend initialement la valeur des variable php

var anne = <?php echo $anne;?>;

$(document).ready(function(){

$("#cont").load("calendrier_vue.php?mois="+mois+"&anne="+anne,function(){});
// chargement initiale

  // on déclenche le code quand on clique sur la flèche gauche
  $("#pre").click(function(){

  mois--; // on décrémente la variable

  if(mois < 1) // Si mois est inférieur a 1
  {
  anne--; // On décrémente anne
  mois = 12; // On affecte 12 a mois
  }

  // On charge notre calendrier
  $("#cont").load("calendrier_vue.php?mois="+mois+"&anne="+anne,function(){});

  });

  // On déclenche notre code quand on clique sur la flèche droite
 $("#post").click(function(){

 mois++; // On incrémente mois

 if(mois > 12) // Si mois est supérieur a 12
 {
 anne++; // On incrémente anne
 mois = 1; // On affecte 1 a mois
 }

 // On charge notre calendrier
 $("#cont").load("calendrier_vue.php?mois="+mois+"&anne="+anne,function(){});

 });
});
