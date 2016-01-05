<?php
$Date = strtotime('2015-01-05');// Une date valide

// Extraction du jour, du mois et de l’annnée
$Jour = Day($Date);
$Mois = Month($Date);
$Annee = Year($Date);

// Date du premier jour du mois (1)
$Date1 = DateSerial($Annee, $Mois, 1);

// Date du premier jour du mois suivant
$Temp = DateAdd("m", 1, $Date1);

// Dernier jour du mois
$Jour2 = Day(DateAdd("d", -1, $Temp));

// Date du dernier jour du mois
$Date2 = DateSerial($Annee, $Mois, $Jour2);




// Jour de la semaine du premier jour
$DateDebut = WeekDay($Date1, vbSunday);

// Jour de la semaine du dernier jour
$DateFin = WeekDay($Date2, vbSunday);

// Nombre total de cases
nbrCase = Day($Date2) + ($DateDebut-1) + (7-$DateFin);





Dim njTemp, $NomJour
$NomJour = 1

// Boucle de 1 au nombre total de cases
For n = 1 to nbrCase
//  Récupérer la date réelle
  njTemp = n - $DateDebut+1

// Nouvelle ligne à chaque semaine
  if $NomJour = 1 then response.write "<tr>" end if

// Nouvelle case
//  SI le jour de la date réelle = le jour de la date courante
//  SINON, autre jour
  if (njTemp) = $Jour then
    response.write "<td align=""center"" valign=""middle"" class=""calJourSel"">"
  else
    response.write "<td align=""center"" valign=""middle"" class=""calJour"">"
  end if

// SI le compteur est plus petit que la première journée
// ou se le compteur est plus grand que le dernier jour
// aucun affichage
//  SINON, affichage du jour réel temporaire
  if n < ($DateDebut) or n > ($Jour2+$DateDebut-1) then
    response.write " "
  else
    // SI le jour de la date réelle = le jour de la date courante
    // affichage du jour réel temporaire
    // SINON, afficher aussi un lien vers le jour temporaire
    if (njTemp) = $Jour then
      response.write (njTemp)
    else
      response.write "<a href="""&$URL&"?date="&DateSerial($Annee, $Mois, njTemp)&""">"
      response.write (njTemp) & "</a>"
    end if
  end if

// Fin de case
  response.write "</td>"

// Ajuster le jour de la semaine
//   SI le jour de la semaine = 7, fin de ligne et remettre à 1
//   SINON, aditionner 1
  if $NomJour = 7 then
    response.write "</tr>"
    $NomJour = 1
  else
    $NomJour = $NomJour + 1
  end if

next // Boucle des jour





$URL = Request.ServerVariables("URL")
?>
