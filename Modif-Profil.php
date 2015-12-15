<?php
  require 'FonctionsUtilisateurs.php';
  insert_users();
?>

<?php

session_start() ;
$_SESSION["idUtilisateur"] = 52;

if(isset($_SESSION["idUtilisateur"])){
  $ID = $_SESSION["idUtilisateur"];

  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');
	$req = $bdd->prepare('SELECT * FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($ID));

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
}
else{
  $ID = -1;
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
      <form name="inscription" method="post" action="Create-Profil.php" enctype="multiplart/form-data">

      <p>    VEUILLEZ COMPLETER LES CHAMPS CI-APRES : <br/> </p>
      <br/>

      <fieldset>
      <legend>Informations personnelles</legend>

      Nom <em>*</em>: <input type="text" name="nom" required="" value="<?php
            if($ID != -1){
                           $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                           $req = $bdd->prepare('SELECT nom_utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                           $req->execute(array($ID));

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
          if($ID != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT prenom_utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                        $req->execute(array($ID));

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
          if($ID != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT genre_utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                          $req->execute(array($ID));

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
          if($ID != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT genre_utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                          $req->execute(array($ID));

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
          if($ID != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT Date_Naissance FROM utilisateur_table WHERE id_utilisateur = ?');
                          $req->execute(array($ID));

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

      Pseudo <em>*</em>: <input type="text" name="pseudo" required="" value="<?php
          if($ID != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT Pseudo_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                          $req->execute(array($ID));

                          $data = $req->fetch();
                          //print_r($data);

                          foreach($data as $cle => $valeur)
                          {
                            // echo $cle ,' : ', $valeur;
                            if($cle == '[Pseudo_Utilisateur]'){  echo $valeur; }
                          }
                       }
        ?>"
        /> <br/>
      <br/>

      Avatar/Photo de profil :  <input type="file" name="avatar" id="avatar" value=""/><br />
      <br />

      Présentez-vous en quelques lignes : <br />
      <div>
      <textarea id="desc" name="description" ><?php
          if($ID != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT Description_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                          $req->execute(array($ID));

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
          if($ID != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT Adresse_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                          $req->execute(array($ID));

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
          if($ID != -1){
                          $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                          $req = $bdd->prepare('SELECT Mail_Utilisateur FROM utilisateur_table WHERE id_utilisateur = ?');
                          $req->execute(array($ID));

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

      Confirmez votre adresse e-mail<em>*</em> : <input type="email" name="confirm_mail" required="" value="" /><br/>
      <br/>

      </fieldset>

      <fieldset>
      <legend>Préférences</legend>

      Catégories qui vont m'interesser le plus (plusieurs réponses possibles): <br>
      <br/>
      <input type="checkbox" name="categorieFavorite1" value="Festivals"<?php
          if($ID != -1){
                        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                        $req = $bdd->prepare('SELECT Categorie_Favorite FROM utilisateur_table WHERE id_utilisateur = ?');
                        $req->execute(array($ID));

                        $data = $req->fetch();
                        //print_r($data);

                        foreach($data as $cle => $valeur)
                        {
                          // echo $cle ,' : ', $valeur;
                          if($cle == '[Categorie_Favorite]' && strstr($valeur, "Festivals")){  echo 'checked="checked"'; }
                        }
                      }
        ?>
       />Festivals<br>
      <input type="checkbox" name="categorieFavorite2" value="Repas/Banquets"<?php
          if($ID != -1){
                      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                      $req = $bdd->prepare('SELECT Categorie_Favorite FROM utilisateur_table WHERE id_utilisateur = ?');
                      $req->execute(array($ID));

                      $data = $req->fetch();
                      //print_r($data);

                      foreach($data as $cle => $valeur)
                      {
                        // echo $cle ,' : ', $valeur;
                        if($cle == '[Categorie_Favorite]' && strstr($valeur, "Repas/Banquets")){  echo 'checked="checked"'; }
                      }
                    }
          //if (isset($_POST['categorieFavorite2'])){if($_POST['categorieFavorite2']=='Repas/Banquets') echo 'checked="checked"';}
        ?>/>Repas/Banquets<br>
      <input type="checkbox" name="categorieFavorite3" value="Concerts"<?php
        if($ID != -1){
                    $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                    $req = $bdd->prepare('SELECT Categorie_Favorite FROM utilisateur_table WHERE id_utilisateur = ?');
                    $req->execute(array($ID));

                    $data = $req->fetch();
                    //print_r($data);

                    foreach($data as $cle => $valeur)
                    {
                      // echo $cle ,' : ', $valeur;
                      if($cle == '[Categorie_Favorite]' && strstr($valeur, "Concerts")){  echo 'checked="checked"'; }
                    }
                  }
          //if (isset($_POST['categorieFavorite3'])){if($_POST['categorieFavorite3']=='Concerts') echo 'checked="checked"';}
        ?>/>Concerts<br>
      <input type="checkbox" name="categorieFavorite4" value="Brocantes/Marchés"<?php
          if($ID != -1){
                    $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                    $req = $bdd->prepare('SELECT Categorie_Favorite FROM utilisateur_table WHERE id_utilisateur = ?');
                    $req->execute(array($ID));

                    $data = $req->fetch();
                    //print_r($data);

                    foreach($data as $cle => $valeur)
                    {
                      // echo $cle ,' : ', $valeur;
                      if($cle == '[Categorie_Favorite]' && strstr($valeur, "Brocantes/Marchés")){  echo 'checked="checked"'; }
                    }
                  }
          //if (isset($_POST['categorieFavorite4'])){if($_POST['categorieFavorite4']=='Brocantes/Marchés') echo 'checked="checked"';}
        ?>/>Brocantes/Marchés<br>
      <input type="checkbox" name="categorieFavorite5" value="Soirées"<?php
          if($ID != -1){
                  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                  $req = $bdd->prepare('SELECT Categorie_Favorite FROM utilisateur_table WHERE id_utilisateur = ?');
                  $req->execute(array($ID));

                  $data = $req->fetch();
                  //print_r($data);

                  foreach($data as $cle => $valeur)
                  {
                    // echo $cle ,' : ', $valeur;
                    if($cle == '[Categorie_Favorite]' && strstr($valeur, "Soirées")){  echo 'checked="checked"'; }
                  }
                }
          //if (isset($_POST['categorieFavorite5'])){if($_POST['categorieFavorite5']=='Soirées') echo 'checked="checked"';}
        ?>/>Soirées<br>
      <input type="checkbox" name="categorieFavorite6" value="Conférences"<?php
          if($ID != -1){
                $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
                $req = $bdd->prepare('SELECT Categorie_Favorite FROM utilisateur_table WHERE id_utilisateur = ?');
                $req->execute(array($ID));

                $data = $req->fetch();
                //print_r($data);

                foreach($data as $cle => $valeur)
                {
                  // echo $cle ,' : ', $valeur;
                  if($cle == '[Categorie_Favorite]' && strstr($valeur, "Conférences")){  echo 'checked="checked"'; }
                }
              }
          //if (isset($_POST['categorieFavorite6'])){if($_POST['categorieFavorite6']=='Conférences') echo 'checked="checked"';}
        ?> />Conférences<br>
      <input type="checkbox" name="categorieFavorite7" value="Humanitaires"<?php
          if($ID != -1){
              $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
              $req = $bdd->prepare('SELECT Categorie_Favorite FROM utilisateur_table WHERE id_utilisateur = ?');
              $req->execute(array($ID));

              $data = $req->fetch();
              //print_r($data);

              foreach($data as $cle => $valeur)
              {
                // echo $cle ,' : ', $valeur;
                if($cle == '[Categorie_Favorite]' && strstr($valeur, "Humanitaires")){  echo 'checked="checked"'; }
              }
            }
          //if (isset($_POST['categorieFavorite7'])){if($_POST['categorieFavorite7']=='Humanitaires') echo 'checked="checked"';}
        ?>/>Humanitaires<br>
      <input type="checkbox" name="categorieFavorite8" value="Sportifs"<?php
          if($ID != -1){
            $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
            $req = $bdd->prepare('SELECT Categorie_Favorite FROM utilisateur_table WHERE id_utilisateur = ?');
            $req->execute(array($ID));

            $data = $req->fetch();
            //print_r($data);

            foreach($data as $cle => $valeur)
            {
              // echo $cle ,' : ', $valeur;
              if($cle == '[Categorie_Favorite]' && strstr($valeur, "Sportifs")){  echo 'checked="checked"'; }
            }
          }
          //if (isset($_POST['categorieFavorite8'])){if($_POST['categorieFavorite8']=='Sportifs') echo 'checked="checked"';}
        ?>/>Sportifs<br>
      <input type="checkbox" name="categorieFavorite9" value="Manifestations"<?php
          if($ID != -1){
            $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
            $req = $bdd->prepare('SELECT Categorie_Favorite FROM utilisateur_table WHERE id_utilisateur = ?');
            $req->execute(array($ID));

            $data = $req->fetch();
            //print_r($data);

            foreach($data as $cle => $valeur)
            {
              // echo $cle ,' : ', $valeur;
              if($cle == '[Categorie_Favorite]' && strstr($valeur, "Manifestations")){  echo 'checked="checked"'; }
            }
          }
          //if (isset($_POST['categorieFavorite9'])){if($_POST['categorieFavorite9']=='Manifestations') echo 'checked="checked"';}
        ?>/>Manifestations<br>
      <br/>

      Souhaitez vous que les autres utilisateurs aient accès à : <br/></br>
      Votre 	adresse e-mail ?
      <select >
      <option selected="selected" name="mailOK" value=1>oui</option>
      <option value=0>non</option>
      </select><br/>
      Votre code-postal?
      <select >
      <option selected="selected" name="adresseOK" value=1>oui</option>
      <option value=0>non</option>
      </select><br/>
      Votre nom et prénom?
      <select >
      <option selected="selected" name="nomPrenomOK" value=1>oui</option>
      <option value=0>non</option>
      </select><br/>
      Votre planning?
      <select >
      <option selected="selected" name="planningOK" value=1>oui</option>
      <option value=0>non</option>
      </select><br/>
      <br/>

      <br/><input type="checkbox" name="AlertesEvenementsOK" value=1 checked> Je souhaite recevoir par e-mail des alertes sur les événements auxquels je m'inscris.

      <br/><input type="checkbox" name="AlertesAbonnementsOK" value=1 checked> Je souhaite recevoir par e-mail des alertes sur mes abonnements.<br />
      <br/>

      </fieldset>

      <p2><em>*</em>signifie que ces champs doivent absolument être remplis.</p2>

      <br/><div><input type="submit" name="valider" value="VALIDER MON PROFIL"/></div><br/>

      </form>
    </body>

  </html>
