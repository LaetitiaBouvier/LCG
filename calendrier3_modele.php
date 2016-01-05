<?php
  function calendrier($mois,$anne)
    {
      $nbjour = cal_days_in_month( CAL_GREGORIAN, $mois, $anne);  // nombre de jour dans le mois
      echo "<table class='p' >";
      for($i = 1; $nbjour >= $i; $i++)
      {
        $p = cal_to_jd(CAL_GREGORIAN, $mois, $i, $anne); // formater jour

        $jourweek = jddayofweek($p); // jour de la semaine

        if($i == $nbjour) // Si c'est le dernier jour du mois
        {

          if($jourweek == 1) // Si c'est un lundi on ouvre la ligne
            {
              echo "<tr>";
            }

          echo "<td class='plein'>".$i."</td></tr>"; // On créez la case et on ferme la ligne
        }
        else if($i == 1) // Si c'est le premier jour du mois
        {
          echo "<tr>"; // On ouvre la ligne

          if($jourweek == 0) // Si c'est un dimanche on affecte 7 a la variable $jourweek
          {
            $jourweek = 7;
          }

          // Ici on ajoute des cases vide devant notre premier jour pour des raisons d'affichage
          for($b = 1 ;$b != $jourweek; $b++)
          {
            echo "<td></td>";
          }


          echo "<td class='plein'>".$i."</td>"; // On ajoute notre case

          if($jourweek == 7) // Si notre jour est un dimanche on ferme la ligne
          {
            echo "</tr>";
          }
        }

        else
        {
          if($jourweek == 1) // Si c'est un lundi on ouvre la ligne
          {
            echo "<tr>";
          }

          echo "<td class='plein'>".$i."</td>"; // On ajoute notre case

          if($jourweek == 0) // Si c'est un dimanche on ferme la ligne
          {
            echo "</tr>";
          }
        }

        echo "</table>";

      }
    }

  function mois($nb)
  {
    $key = $nb - 1;

    $ap = array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");

    return $ap[$key];
  }
?>
