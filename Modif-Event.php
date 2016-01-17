<?php

  if(isset($_GET["IDE"]))
  {
    $IDE = $_GET["IDE"];
  }
  else
  {
    $ID = -1;
  }





?>

 		<h2> Formulaire de modification d'évènement </h2>
      <form name="inscription" method="post" <?php  echo 'action="UpdateEvent.php?IDE='.$IDE.'"'?> enctype="multiplart/form-data">

      <p>    VEUILLEZ COMPLETER LES CHAMPS CI-APRES : <br/> </p>
      <br/>

      <fieldset>
      <legend>Informations générales </legend>

      Nom de l'évènement : <input type="text" name="nom"  value="<?php
            if($IDE != -1){
                           $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                           $req = $bdd->prepare('SELECT Nom_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                           $req->execute(array($IDE));

                           $data = $req->fetch();

                           foreach($data as $cle => $valeur)
                           {
                              if($cle == '[Nom_Evenement]'){ echo $valeur; }
                           }
                         }
           ?>"
        <br/>
      <br/>

      Description de l'évènement <em>*</em>: <textarea id="desc" name="description"><?php
          if($IDE != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT Description_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($IDE));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[Description_Evenement]'){  echo $valeur; }
                        }
                       }
         ?></textarea>
        <br/>
      <br/>


      Catégorie de l'événement (1 seule réponse possible)<em>*</em> : <br/> <br/>
      <?php
        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
        $req = $bdd->prepare('SELECT Categorie_Evenement FROM evenement_table WHERE ID_Evenement = ?');
        $req->execute(array($IDE));

        $data = $req->fetch();

        $chaineCat = null;

        foreach($data as $cle => $valeur) {
          if($cle == '[Categorie_Evenement]'){ $chaineCat = $valeur; }
        }

        $OKFestivals = false;           if( strstr($chaineCat, "Festivals"          ))  { $OKFestivals = true;          }
        $OKRespas_Banquets = false;     if( strstr($chaineCat, "Repas/Banquets"     ))  { $OKRespas_Banquets = true;    }
        $OKConcerts = false;            if( strstr($chaineCat, "Concerts"           ))  { $OKConcerts = true;           }
        $OKBroquante_Marchés = false;   if( strstr($chaineCat, "Brocantes/Marchés"  ))  { $OKBroquante_Marchés = true;  }
        $OKSoirées = false;             if( strstr($chaineCat, "Soirées"            ))  { $OKSoirées = true;            }
        $OKConférences = false;         if( strstr($chaineCat, "Conférences"        ))  { $OKConférences = true;        }
        $OKHumanitaires = false;        if( strstr($chaineCat, "Humanitaires"       ))  { $OKHumanitaires = true;       }
        $OKSportifs = false;            if( strstr($chaineCat, "Sportifs"           ))  { $OKSportifs = true;           }
        $OKManifestations = false;      if( strstr($chaineCat, "Manifestations"     ))  { $OKManifestations = true;     }

      ?>
      <input type="checkbox" name="categorieFavorite1" value="Festivals"          <?php if ($OKFestivals)         { echo 'checked="checked"'; }         ?>/>Festivals<br>
      <input type="checkbox" name="categorieFavorite2" value="Repas/Banquets"     <?php if ($OKRespas_Banquets)   { echo 'checked="checked"'; }    ?>/>Repas/Banquets<br>
      <input type="checkbox" name="categorieFavorite3" value="Concerts"           <?php if ($OKConcerts)          { echo 'checked="checked"'; }          ?>/>Concerts<br>
      <input type="checkbox" name="categorieFavorite4" value="Brocantes/Marchés"  <?php if ($OKBroquante_Marchés) { echo 'checked="checked"'; } ?>/>Brocantes/Marchés<br>
      <input type="checkbox" name="categorieFavorite5" value="Soirées"            <?php if ($OKSoirées)           { echo 'checked="checked"'; }           ?>/>Soirées<br>
      <input type="checkbox" name="categorieFavorite6" value="Conférences"        <?php if ($OKConférences)       { echo 'checked="checked"'; }       ?>/>Conférences<br>
      <input type="checkbox" name="categorieFavorite7" value="Humanitaires"       <?php if ($OKHumanitaires)      { echo 'checked="checked"'; }      ?>/>Humanitaires<br>
      <input type="checkbox" name="categorieFavorite8" value="Sportifs"           <?php if ($OKSportifs)          { echo 'checked="checked"'; }          ?>/>Sportifs<br>
      <input type="checkbox" name="categorieFavorite9" value="Manifestations"     <?php if ($OKManifestations)    { echo 'checked="checked"'; }    ?>/>Manifestations<br>
      <br/>
      <br/>


      Cibles de l'événement (plusieurs réponses possibles) <em>*</em>: <br/> </br>

      <?php
        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
        $req = $bdd->prepare('SELECT Cibles_Evenement FROM evenement_table WHERE ID_Evenement = ?');
        $req->execute(array($IDE));

        $data = $req->fetch();

        $chaineCat = null;

        foreach($data as $cle => $valeur) {
          if($cle == '[Cibles_Evenement]'){ $chaineCat = $valeur; }
        }

        $OKBas_âge = false;             if( strstr($chaineCat, "Bas-âge"            ))  { $OKBas_âge = true;            }
        $OKEnfants = false;             if( strstr($chaineCat, "Enfants"            ))  { $OKEnfants = true;            }
        $OKAdos = false;                if( strstr($chaineCat, "Ados"               ))  { $OKAdos = true;               }
        $OKAdultes = false;             if( strstr($chaineCat, "Adultes"            ))  { $OKAdultes = true;            }
        $OKSeniors = false;             if( strstr($chaineCat, "Seniors"            ))  { $OKSeniors = true;            }
      ?>

      <input type="checkbox" name="age1" value="Bas-âge"  <?php if ($OKBas_âge)         { echo 'checked="checked"'; }         ?>/>Bas-âge</br>
      <input type="checkbox" name="age2" value="Enfants"  <?php if ($OKEnfants)         { echo 'checked="checked"'; }         ?>/>Enfants</br>
      <input type="checkbox" name="age3"value="Ados"      <?php if ($OKAdos)            { echo 'checked="checked"'; }         ?>/>Ados</br>
      <input type="checkbox" name="age4" value="Adultes"  <?php if ($OKAdultes)         { echo 'checked="checked"'; }         ?>/>Adultes</br>
      <input type="checkbox" name="age5" value="Seniors"  <?php if ($OKSeniors)         { echo 'checked="checked"'; }         ?>/>Seniors</br>

      </fieldset>

      <fieldset>
      <legend>Informations sur le lieu et la date de l'événement</legend>

      LIEU DE L'EVENEMENT : <br/> <br/>

      Nom de l'endroit / de la salle <em>*</em>: <input type="text" name="endroit" value="<?php
          if($IDE != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT NomLieu_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($IDE));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[NomLieu_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"/>
      <br/><br/>

      ADRESSE : <br/><br/>
      Numéro et rue : <input type="text" name="rue" maxlength="3" value="<?php
          if($IDE != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT AdresseRue_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($IDE));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[AdresseRue_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"/>
      <br/>
      Code postal <em>*</em>: <input type="text" name="CP" maxlength="5" value="<?php
          if($IDE != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT AdressePostal_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($IDE));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[AdressePostal_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"/><br/>
      Ville : <input type="text" name="ville" value="<?php
          if($IDE != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT AdresseVille_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($IDE));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[AdresseVille_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"/><br/><br/>

         Département : <select name="departement">
         <option selected="selected" value="<?php
             if($IDE != -1){
                           $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                           $req = $bdd->prepare('SELECT AdresseDepartement_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                           $req->execute(array($IDE));

                           $data = $req->fetch();

                           foreach($data as $cle => $valeur)
                           {
                             if($cle == '[AdresseDepartement_Evenement]'){  echo $valeur; }
                           }
                          }
            ?>"><?php echo $valeur?></option>
         <option value="01-Ain">01-Ain</option>
         <option value="02-Aisne">02-Aisne</option>
         <option value="03-Allier">03-Allier</option>
         <option value="04-Alpes-de-Haute-Provence">04-Alpes-de-Haute-Provence</option>
         <option value="05-Hautes-Alpes">05-Hautes-Alpes</option>
         <option value="06-Alpes-Maritimes">06-Alpes-Maritimes</option>
         <option value="07-Ardèche">07-Ardèche</option>
         <option value="08-Ardennes">08-Ardennes</option>
         <option value="09-Ariège">09-Ariège</option>
         <option value="10-Aube">10-Aube</option>
         <option value="11-Aude">11-Aude</option>
         <option value="12-Aveyron">12-Aveyron</option>
         <option value="13-Bouches-du-Rhône">13-Bouches-du-Rhône</option>
         <option value="14-Calvados">14-Calvados</option>
         <option value="15-Cantal">15-Cantal</option>
         <option value="16-Charente">16-Charente</option>
         <option value="17-Charente-Maritime">17-Charente-Maritime</option>
         <option value="18-Cher">18-Cher</option>
         <option value="19-Corrèze">19-Corrèze</option>
         <option value="21-Côte-d'Or">21-Côte-d'Or</option>
         <option value="22-Côtes-d'Armor">22-Côtes-d'Armor</option>
         <option value="23-Creuse">23-Creuse</option>
         <option value="24-Dordogne">24-Dordogne</option>
         <option value="25-Doubs">25-Doubs</option>
         <option value="26-Drôme">26-Drôme</option>
         <option value="27-Eure">27-Eure</option>
         <option value="28-Eure-et-Loir">28-Eure-et-Loir</option>
         <option value="29-Finistère">29-Finistère</option>
         <option value="30-Gard">30-Gard</option>
         <option value="31-Haute-Garonne">31-Haute-Garonne</option>
         <option value="32-Gers">32-Gers</option>
         <option value="33-Gironde">33-Gironde</option>
         <option value="34-Hérault">34-Hérault</option>
         <option value="35-Ille-et-Vilaine">35-Ille-et-Vilaine</option>
         <option value="36-Indre">36-Indre</option>
         <option value="37-Indre-et-Loire">37-Indre-et-Loire</option>
         <option value="38-Isère">38-Isère</option>
         <option value="39-Jura">39-Jura</option>
         <option value="40-Landes">40-Landes</option>
         <option value="41-Loir-et-Cher">41-Loir-et-Cher</option>
         <option value="42-Loire">42-Loire</option>
         <option value="43-Haute-Loire">43-Haute-Loire</option>
         <option value="44-Loire-Atlantique">44-Loire-Atlantique</option>
         <option value="45-Loiret">45-Loiret</option>
         <option value="46-Lot">46-Lot</option>
         <option value="47-Lot-et-Garonne">47-Lot-et-Garonne</option>
         <option value="48-Lozère">48-Lozère</option>
         <option value="49-Maine-et-Loire">49-Maine-et-Loire</option>
         <option value="50-Manche">50-Manche</option>
         <option value="51-Marne">51-Marne</option>
         <option value="52-Haute-Marne">52-Haute-Marne</option>
         <option value="53-Mayenne">53-Mayenne</option>
         <option value="54-Meurthe-et-Moselle">54-Meurthe-et-Moselle</option>
         <option value="55-Meuse">55-Meuse</option>
         <option value="56-Morbihan">56-Morbihan</option>
         <option value="57-Moselle">57-Moselle</option>
         <option value="58-Nièvre">58-Nièvre</option>
         <option value="59-Nord">59-Nord</option>
         <option value="60-Oise">60-Oise</option>
         <option value="61-Orne">61-Orne</option>
         <option value="62-Pas-de-Calais">62-Pas-de-Calais</option>
         <option value="63-Puy-de-Dôme">63-Puy-de-Dôme</option>
         <option value="64-Pyrénées-Atlantiques">64-Pyrénées-Atlantiques</option>
         <option value="65-Hautes-Pyrénées">65-Hautes-Pyrénées</option>
         <option value="66-Pyrénées-Orientales">66-Pyrénées-Orientales</option>
         <option value="67-Bas-Rhin">67-Bas-Rhin</option>
         <option value="68-Haut-Rhin">68-Haut-Rhin</option>
         <option value="69-Rhône">69-Rhône</option>
         <option value="70-Haute-Saône">70-Haute-Saône</option>
         <option value="71-Saône-et-Loire">71-Saône-et-Loire</option>
         <option value="72-Sarthe">72-Sarthe</option>
         <option value="73-Savoie">73-Savoie</option>
         <option value="74-Haute-Savoie">74-Haute-Savoie</option>
         <option value="75-Paris">75-Paris</option>
         <option value="76-Seine-Maritime">76-Seine-Maritime</option>
         <option value="77-Seine-et-Marne">77-Seine-et-Marne</option>
         <option value="78-Yvelines">78-Yvelines</option>
         <option value="79-Deux-Sèvres">79-Deux-Sèvres</option>
         <option value="80-Somme">80-Somme</option>
         <option value="81-Tarn">81-Tarn</option>
         <option value="82-Tarn-et-Garonne">82-Tarn-et-Garonne</option>
         <option value="83-Var">83-Var</option>
         <option value="84-Vaucluse">84-Vaucluse</option>
         <option value="85-Vendée">85-Vendée</option>
         <option value="86-Vienne">86-Vienne</option>
         <option value="87-Haute-Vienne">87-Haute-Vienne</option>
         <option value="88-Vosges">88-Vosges</option>
         <option value="89-Yonne">89-Yonne</option>
         <option value="90-Territoire de Belfort">90-Territoire de Belfort</option>
         <option value="91-Essonne">91-Essonne</option>
         <option value="92-Hauts-de-Seine">92-Hauts-de-Seine</option>
         <option value="93-Seine-Saint-Denis">93-Seine-Saint-Denis</option>
         <option value="94-Val-de-Marne">94-Val-de-Marne</option>
         <option value="95-Val-d'Oise">95-Val-d'Oise</option>
         <option value="971-Guadeloupe">971-Guadeloupe</option>
         <option value="972-Martinique">972-Martinique</option>
         <option value="973-Guyane">973-Guyane</option>
         <option value="974-La Réunion">974-La Réunion</option>
         <option value="975-Mayotte">975-Mayotte</option>
         <option value="2A-Corse-du-Sud">2A-Corse-du-Sud</option>
         <option value="2B-Haute-Corse">2B-Haute-Corse</option>
         </select><br/>

         Région : <select name="region">
         <option selected="selected" value="<?php
             if($IDE != -1){
                           $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                           $req = $bdd->prepare('SELECT AdresseRegion_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                           $req->execute(array($IDE));

                           $data = $req->fetch();

                           foreach($data as $cle => $valeur)
                           {
                             if($cle == '[AdresseRegion_Evenement]'){  echo $valeur; }
                           }
                          }
            ?>"><?php echo $valeur?></option>
         <option value="Alsace">Alsace</option>
         <option value="Aquitaine">Aquitaine</option>
         <option value="Auvergne">Auvergne</option>
         <option value="Basse-Normandie">Basse-Normandie</option>
         <option value="Bourgogne">Bourgogne</option>
         <option value="Bretagne">Bretagne</option>
         <option value="Centre">Centre</option>
         <option value="Champagne-Ardenne">Champagne-Ardenne</option>
         <option value="Corse">Corse</option>
         <option value="Franche-Comté">Franche-Comté</option>
         <option value="Haute-Normandie">Haute-Normandie</option>
         <option value="Ile-de-France">Ile-de-France</option>
         <option value="Languedoc-Roussillon">Languedoc-Roussillon</option>
         <option value="Limousin">Limousin</option>
         <option value="Lorraine">Lorraine</option>
         <option value="Midi-Pyrénées">Midi-Pyrénées</option>
         <option value="Nord-Pas-de-Calais">Nord-Pas-de-Calais</option>
         <option value="Pays de la Loire">Pays de la Loire</option>
         <option value="Picardie">Picardie</option>
         <option value="Poitou-Charentes">Poitou-Charentes</option>
         <option value="Provence-Alpes-Côte-d'Azur">Provence-Alpes-Côte-d'Azur</option>
         <option value="Rhône-Alpes">Rhône-Alpes</option>
         <option value="DOM">DOM</option>
         </select><br/>
         </br>

      DEBUT DE L'EVENEMENT : <br/><br/>
      Date <em>*</em>: <input type="date" name="datedeb" value="<?php
          if($IDE != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT JourDebut_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($IDE));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[JourDebut_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"/>
      Heure : <input type="time" name="heuredeb" value="<?php
          if($IDE != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT HeureDebut_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($IDE));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[HeureDebut_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"/><br/>
      <br/>

      FIN DE L'EVENEMENT : <br/><br/>
      Date <em>*</em>: <input type="date" name="datefin" value="<?php
          if($IDE != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT JourFin_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($IDE));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[JourFin_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"/>
      Heure : <input type="time" name="heurefin" value="<?php
          if($IDE != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT HeureFin_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($IDE));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[HeureFin_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"/><br/>
      <br/>
      </fieldset>

      <fieldset>
        <legend>Informations complémentaires</legend>

      Nombre maximum de participants : <input type="text" name="participants" value="<?php
          if($IDE != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT NbMaxParticipants_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($IDE));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[NbMaxParticipants_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"/><br/> <br/>

      Evénement payant <em>*</em>:
      <input type="radio" name="payant" value="oui" <?php
          if($IDE != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT Payant_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                          $req->execute(array($IDE));

                          $data = $req->fetch();
                          //print_r($data);

                          foreach($data as $cle => $valeur)
                          {
                            // echo $cle ,' : ', $valeur;
                            if($cle == '[Payant_Evenement]'){
                              if($valeur == 'oui'){ echo 'checked="checked"'; }
                            }
                          }
                       }
         ?>/> oui
      <input type="radio" name="payant" value="non" <?php
          if($IDE != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT Payant_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                          $req->execute(array($IDE));

                          $data = $req->fetch();
                          //print_r($data);

                          foreach($data as $cle => $valeur)
                          {
                            // echo $cle ,' : ', $valeur;
                            if($cle == '[Payant_Evenement]'){
                              if($valeur == 'non'){ echo 'checked="checked"'; }
                            }
                          }
                       }
         ?>/> non
      <br/><br/>

      Lien vers le site web de l'événement (facultatif):
      <input type="url" name="website" value="<?php
          if($IDE != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT LienSiteWeb_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($IDE));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[LienSiteWeb_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"> <br />
      </fieldset>

      <p2><em>*</em>signifie que ces champs doivent absolument être remplis.</p2>

      <br/><div><input type="submit" name="valider" value="VALIDER MON EVENEMENT"/></div><br/>

      </form>

      <h2> Modification de la photo </h2>
      <form <?php  echo 'action="envoi_photo_event.php?IDE='.$IDE.'"'?> method="post" enctype="multipart/form-data">

                      </br>
                      <input type="file" name="photo" id="photo-event"/><br />
                      <input type="submit" value="Envoyer le fichier" />

      </form>
    </body>

  </html>
