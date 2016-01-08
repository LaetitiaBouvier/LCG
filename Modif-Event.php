<?php

  if(isset($_GET["IDE"]))
  {
    $ID = $_GET["IDE"];
  }
  else
  {
    $ID = -1;
  }



  require 'FonctionsEvent.php';
  update_events($ID);

?>



 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

 	<head>
 		<title> Modification </title>
 		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 		<link rel="stylesheet" href="Style-form.css"/>
 	</head>

 	<body>
 		<h2> Formulaire de modification d'évènement </h2>
      <form name="inscription" method="post" <?php  echo 'action="Page_Modif-Event.php?IDE='.$ID.'"'?> enctype="multiplart/form-data">

      <p>    VEUILLEZ COMPLETER LES CHAMPS CI-APRES : <br/> </p>
      <br/>

      <fieldset>
      <legend>Informations générales </legend>

      Nom de l'évènement : <?php
            if($ID != -1){
                           $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                           $req = $bdd->prepare('SELECT Nom_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                           $req->execute(array($ID));

                           $data = $req->fetch();

                           foreach($data as $cle => $valeur)
                           {
                              if($cle == '[Nom_Evenement]'){ echo $valeur; }
                           }
                         }
           ?>
        <br/>
      <br/>

      Description de l'évènement <em>*</em>: <input type="text" name="description" required="" value="<?php
          if($ID != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT Description_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($ID));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[Description_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"
        /><br/>
      <br/>


      Catégorie de l'événement (1 seule réponse possible)<em>*</em> : <br/> <br/>
      <?php
        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
        $req = $bdd->prepare('SELECT Categorie_Evenement FROM evenement_table WHERE ID_Evenement = ?');
        $req->execute(array($ID));

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
        $req->execute(array($ID));

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
          if($ID != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT NomLieu_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($ID));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[NomLieu_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"/>
      <br/><br/>

      ADRESSE : <br/><br/>
      n°/rue : <input type="text" name="rue" maxlength="3" value="<?php
          if($ID != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT AdresseRue_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($ID));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[AdresseRue_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"/>
      <br/>
      Code postal <em>*</em>: <input type="text" name="CP" maxlength="5" value="<?php
          if($ID != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT AdressePostal_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($ID));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[AdressePostal_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"/><br/>
      Ville : <input type="text" name="ville" value="<?php
          if($ID != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT AdresseVille_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($ID));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[AdresseVille_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"/><br/><br/>
      DEBUT DE L'EVENEMENT : <br/><br/>
      Date <em>*</em>: <input type="date" name="datedeb" value="<?php
          if($ID != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT JourDebut_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($ID));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[JourDebut_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"/>
      Heure : <input type="time" name="heuredeb" value="<?php
          if($ID != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT HeureDebut_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($ID));

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
          if($ID != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT JourFin_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($ID));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[JourFin_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"/>
      Heure : <input type="time" name="heurefin" value="<?php
          if($ID != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT HeureFin_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($ID));

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
          if($ID != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT NbMaxParticipants_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($ID));

                        $data = $req->fetch();

                        foreach($data as $cle => $valeur)
                        {
                          if($cle == '[NbMaxParticipants_Evenement]'){  echo $valeur; }
                        }
                       }
         ?>"/><br/> <br/>

      Evénement payant <em>*</em>:
      <input type="radio" name="payant" value="oui" <?php
          if($ID != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT Payant_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                          $req->execute(array($ID));

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
          if($ID != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT Payant_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                          $req->execute(array($ID));

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
          if($ID != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT LienSiteWeb_Evenement FROM evenement_table WHERE ID_Evenement = ?');
                        $req->execute(array($ID));

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
      <form action="envoi_photo_event.php" method="post" enctype="multipart/form-data">

                      </br>
                      <input type="file" name="photo" id="photo-event"/><br />
                      <input type="submit" value="Envoyer le fichier" />

      </form>
    </body>

  </html>
