
<?php



  require 'FonctionsUtilisateurs.php';
  update_users();

?>

<?php

if(isset($_SESSION["ID_Utilisateur"])){
  $IDU = $_SESSION["ID_Utilisateur"];

/*
  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');
	$req = $bdd->prepare('SELECT * FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($IDU));

	$data = $req->fetch();

  var_dump($data);

	foreach($data as $cle => $valeur)
	{
		 //echo $cle ,' : ', $valeur;
		 if($cle == '[nom_utilisateur]'){ $nom = $valeur; echo $nom;}
		 if($cle == '[prenom_utilisateur]'){ $prenom = $valeur; echo $prenom;}
     if($cle == '[Adresse_Utilisateur]'){ $adresse = $valeur; echo $adresse;}
     if($cle == '[genre]'){ if($valeur == 'H'){ $genre = 'checked="checked"'; } }


	}
  */
}
else{
  $IDU = -1;
}

 ?>


 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

 	<head>
 		<title> Modification </title>
 		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 		<link rel="stylesheet" href="Style-form.css"/>
 	</head>

 	<body>
 		<h2> Formulaire de modification de profil </h2>
      <form name="inscription" method="post" action="Page_Modif-Profil.php" enctype="multiplart/form-data">

      <p>    VEUILLEZ COMPLETER LES CHAMPS CI-APRES : <br/> </p>
      <br/>

      <fieldset>
      <legend>Informations personnelles</legend>

      Nom <em>*</em>: <input type="text" name="nom" required="" value="<?php
            if($IDU != -1){
                           $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                           $req = $bdd->prepare('SELECT nom_utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                           $req->execute(array($IDU));

                           $data = $req->fetch();

                           foreach($data as $cle => $valeur)
                           {
                              if($cle == '[nom_utilisateur]'){ echo $valeur; }
                           }
                         }
           ?>"
        /><br/>
      <br/>

      Prénom <em>*</em>: <input type="text" name="prenom" required="" value="<?php
          if($IDU != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT prenom_utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                        $req->execute(array($IDU));

                        $data = $req->fetch();
                        //print_r($data);

                        foreach($data as $cle => $valeur)
                        {
                          // echo $cle ,' : ', $valeur;
                          if($cle == '[prenom_utilisateur]'){ $valeur=str_replace(' ','',$valeur); echo $valeur; }
                        }
                       }
         ?>"
        /><br/>
      <br/>

      Sexe :
      <input type="radio" name="genre" value="H"<?php
          if($IDU != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT genre_utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                          $req->execute(array($IDU));

                          $data = $req->fetch();
                          //print_r($data);

                          foreach($data as $cle => $valeur)
                          {
                            // echo $cle ,' : ', $valeur;
                            if($cle == '[genre]'){
                              if($valeur == 'H'){ echo 'checked="checked"'; }
                            }
                          }
                       }
         ?>/> Homme
      <input type="radio" name="genre" value="F"<?php
          if($IDU != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT genre_utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                          $req->execute(array($IDU));

                          $data = $req->fetch();
                          //print_r($data);

                          foreach($data as $cle => $valeur)
                          {
                            // echo $cle ,' : ', $valeur;
                            if($cle == '[genre]'){
                              if($valeur == 'F'){ echo 'checked="checked"'; }
                            }
                          }
                       }
        ?>/> Femme
      <br/><br/>

      Date de naissance <em>*</em> : <input type="date" name="dateNaissance" required="" value="<?php
          if($IDU != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT Date_Naissance FROM utilisateur_table WHERE id_utilisateur = ?');
                          $req->execute(array($IDU));

                          $data = $req->fetch();
                          //print_r($data);

                          foreach($data as $cle => $valeur)
                          {
                            // echo $cle ,' : ', $valeur;
                            if($cle == '[Date_Naissance]'){  echo $valeur; }
                          }
                       }
        ?>"
        /><br/>
      <br/>

      </fieldset>

      <fieldset>
      <legend>Informations de connexion</legend>

      Pseudo <em>*</em>: <?php
          if($IDU != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT Pseudo_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                          $req->execute(array($IDU));

                          $data = $req->fetch();
                          //print_r($data);

                          foreach($data as $cle => $valeur)
                          {
                            // echo $cle ,' : ', $valeur;
                            if($cle == '[Pseudo_Utilisateur]'){  echo $valeur; }
                          }
                       }
      ?>
      <br/>
      <br/>

      Avatar/Photo de profil :  <input type="file" name="avatar" id="avatar" value=""/><br />
      <br />

      Présentez-vous en quelques lignes : <br />
      <div>
      <textarea id="desc" name="description" ><?php
          if($IDU != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT Description_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                          $req->execute(array($IDU));

                          $data = $req->fetch();
                          //print_r($data);

                          foreach($data as $cle => $valeur)
                          {
                            // echo $cle ,' : ', $valeur;
                            if($cle == '[Description_Utilisateur]'){  echo $valeur; }
                          }
                       }
        ?>
      </textarea>
      </div>
      <br />
      <br />

      Mot de passe<em>*</em> (6 caractères au moins): <input type="password" name="mdp" required="" value=""/><br/>
      <br/>

      Confirmez votre mot de passe<em>*</em> : <input type="password" name="confirm_mdp" required="" value=""/><br/>
      <br/>

      </fieldset>

      <fieldset>
      <legend>Contact</legend>

      Code postal<em>*</em> : <input type="text" name="adresse" maxlength="5" required="" value="<?php
          if($IDU != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT Adresse_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                          $req->execute(array($IDU));

                          $data = $req->fetch();
                          //print_r($data);

                          foreach($data as $cle => $valeur)
                          {
                            // echo $cle ,' : ', $valeur;
                            if($cle == '[Adresse_Utilisateur]'){  echo $valeur; }
                          }
                       }
        ?>"
        /><br/>
      <br/>

      Adresse e-mail<em>*</em> : <input type="email" name="mail" required="" value="<?php
          if($IDU != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT Mail_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                          $req->execute(array($IDU));

                          $data = $req->fetch();
                          //print_r($data);

                          foreach($data as $cle => $valeur)
                          {
                            // echo $cle ,' : ', $valeur;
                            if($cle == '[Mail_Utilisateur]'){  echo $valeur; }
                          }
                        }
        ?>"
        /><br/>
      <br/>

      Confirmez votre adresse e-mail<em>*</em> : <input type="email" name="confirm_mail" required="" value="<?php
          if($IDU != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT Mail_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                          $req->execute(array($IDU));

                          $data = $req->fetch();
                          //print_r($data);

                          foreach($data as $cle => $valeur)
                          {
                            // echo $cle ,' : ', $valeur;
                            if($cle == '[Mail_Utilisateur]'){  echo $valeur; }
                          }
                        }
        ?>"
        /><br/>
      <br/>

      </fieldset>

      <fieldset>
      <legend>Préférences</legend>

      Catégories qui vont m'interesser le plus (plusieurs réponses possibles): <br>
      <?php
        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
        $req = $bdd->prepare('SELECT Categorie_Favorite FROM utilisateur_table WHERE id_utilisateur = ?');
        $req->execute(array($IDU));

        $data = $req->fetch();

        $chaineCat = null;

        foreach($data as $cle => $valeur) {
          if($cle == '[Categorie_Favorite]'){ $chaineCat = $valeur; }
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

      <br/>
      <br/>
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

      <?php
        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
        $req = $bdd->prepare('SELECT OKadresse_Utilisateur, OKmail_Utilisateur, OKNomPrenom_Utilisateur, OKplanning_Utilisateur, OKAlertesEvenements_Utilisateur, OKAlertesAbonnements_Utilisateur
                              FROM utilisateur_table WHERE id_utilisateur = ?');
        $req->execute(array($IDU));



        foreach($req as $row)
        {
          $OKadresse_Utilisateur             = false; if($row['OKadresse_Utilisateur']             == "oui"){ $OKadresse_Utilisateur             = true; }
          $OKmail_Utilisateur                = false; if($row['OKmail_Utilisateur']                == "oui"){ $OKmail_Utilisateur                = true; }
          $OKNomPrenom_Utilisateur           = false; if($row['OKNomPrenom_Utilisateur']           == "oui"){ $OKNomPrenom_Utilisateur           = true; }
          $OKplanning_Utilisateur            = false; if($row['OKplanning_Utilisateur']            == "oui"){ $OKplanning_Utilisateur            = true; }
          $OKAlertesEvenements_Utilisateur   = false; if($row['OKAlertesEvenements_Utilisateur']   == "oui"){ $OKAlertesEvenements_Utilisateur   = true; }
          $OKAlertesAbonnements_Utilisateur  = false; if($row['OKAlertesAbonnements_Utilisateur']  == "oui"){ $OKAlertesAbonnements_Utilisateur  = true; }
        }
      ?>

      Souhaitez vous que les autres utilisateurs aient accès à : <br/></br>
      Votre 	adresse e-mail ?
      <br/><input type="radio" name="mailOK" value="oui" <?php if ($OKmail_Utilisateur) {echo 'checked="checked"';}?>/>                 oui
      <br/><input type="radio" name="mailOK" value="non" <?php if (!$OKmail_Utilisateur){echo 'checked="checked"';}?>/>                 non
      <br/>
      Votre code-postal?
      <br/><input type="radio" name="adresseOK" value="oui" <?php if ($OKadresse_Utilisateur) { echo 'checked="checked"';}?>/>          oui
      <br/><input type="radio" name="adresseOK" value="non" <?php if (!$OKadresse_Utilisateur){ echo 'checked="checked"';}?>/>          non
      <br/>
      Votre nom et prénom?
      <br/><input type="radio" name="nomPrenomOK" value="oui" <?php if ($OKNomPrenom_Utilisateur) { echo 'checked="checked"';}?>/>      oui
      <br/><input type="radio" name="nomPrenomOK" value="non" <?php if (!$OKNomPrenom_Utilisateur){ echo 'checked="checked"';}?>/>      non
      <br/>
      Votre planning?
      <br/><input type="radio" name="planningOK" value="oui" <?php if ($OKplanning_Utilisateur) { echo 'checked="checked"';}?>/>        oui
      <br/><input type="radio" name="planningOK" value="non" <?php if (!$OKplanning_Utilisateur){ echo 'checked="checked"';}?>/>        non
      <br/>
      <br/>

      Je souhaite recevoir par e-mail des alertes sur les événements auxquels je m'inscris :
      <br/><input type="radio" name="AlertesEvenementsOK" value="oui" <?php if ($OKAlertesEvenements_Utilisateur) { echo 'checked="checked"';}?>/>  oui
      <br/><input type="radio" name="AlertesEvenementsOK" value="non" <?php if (!$OKAlertesEvenements_Utilisateur){ echo 'checked="checked"';}?>/>  non
      <br/>
      Je souhaite recevoir par e-mail des alertes sur mes abonnements :
      <br/><input type="radio" name="AlertesAbonnementsOK" value="oui" <?php if ($OKAlertesAbonnements_Utilisateur) { echo 'checked="checked"';}?>/> oui
      <br/><input type="radio" name="AlertesAbonnementsOK" value="non" <?php if (!$OKAlertesAbonnements_Utilisateur){ echo 'checked="checked"';}?>/> non
      <br/>

      </fieldset>

      <p2><em>*</em>signifie que ces champs doivent absolument être remplis.</p2>

      <br/><div><input type="submit" name="valider" value="VALIDER MON PROFIL"/></div><br/>

      </form>

      <h2> Modification de l'avatar </h2>
      <form <?php  echo 'action="envoi_photo_profil.php?IDU='.$IDU.'"'?> method="post" enctype="multipart/form-data">

                      </br>
                      <input type="file" name="photo" id="photo-profil"/><br />
                      <input type="submit" value="Envoyer le fichier" />

      </form>
    </body>

  </html>
