<?php
  require 'FonctionsUtilisateurs.php';
  insert_users();
?>

<?php

session_start() ;
$_SESSION["idUtilisateur"] = 33;

if(isset($_SESSION["idUtilisateur"])){
  $ID = $_SESSION["idUtilisateur"];
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

      Nom <em>*</em>: <input type="text" name="nom" required="" value="

          <?php
            if($ID != -1){ $query = mysqli_query($connect, "SELECT * FROM utilisateur_table WHERE id_utilisateur = '$ID'");
                           $resultat = mysqli_fetch_row($query);
                           echo $resultat[0];
                         }
           ?>"
        /><br/>
      <br/>

      Prénom <em>*</em>: <input type="text" name="prenom" required="" value="
        <?php
          if($ID != -1){ $query = mysqli_query($connect, "SELECT * FROM Utilisateur_table WHERE ID_Evenement = '$ID'");
                         $resultat = mysqli_fetch_row($query);
                         echo $resultat[0];
                       }
         ?>"
        /><br/>
      <br/>

      Sexe :
      <input type="radio" name="genre" value="H"
        <?php
          if($ID != -1){ $query = mysqli_query($connect, "SELECT * FROM Utilisateur_table WHERE ID_Evenement = '$ID'");
                         $resultat = mysqli_fetch_row($query);
                         if($resultat[0] == 'H'){ echo 'checked="checked"'; }
                       }
         ?>/> Homme
      <input type="radio" name="genre" value="F"
        <?php
          if($ID != -1){ $query = mysqli_query($connect, "SELECT * FROM Utilisateur_table WHERE ID_Evenement = '$ID'");
                         $resultat = mysqli_fetch_row($query);
                         if($resultat[0] == 'F'){ echo 'checked="checked"'; }
                       }
        ?>/> Femme
      <br/><br/>

      Date de naissance <em>*</em> : <input type="date" name="dateNaissance" required="" value="
        <?php
          if($ID != -1){ $query = mysqli_query($connect, "SELECT Date_Naissance FROM Utilisateur_table WHERE ID_Evenement = '$ID'"); }
        ?>"
        /><br/>
      <br/>

      </fieldset>

      <fieldset>
      <legend>Informations de connexion</legend>

      Pseudo <em>*</em>: <input type="text" name="pseudo" required="" value="
        <?php
          if($ID != -1){ echo $query = mysqli_query($connect, "SELECT Pseudo_Utilisateur FROM Utilisateur_table WHERE ID_Evenement = '$ID'"); }
        ?>"
        /> <br/>
      <br/>

      Avatar/Photo de profil :  <input type="file" name="avatar" id="avatar" value=""/><br />
      <br />

      Présentez-vous en quelques lignes : <br />
      <div>
      <textarea id="desc" name="description" >
        <?php
          if($ID != -1){ echo $query = mysqli_query($connect, "SELECT Description_Utilisateur FROM Utilisateur_table WHERE ID_Evenement = '$ID'"); }
        ?>
      </textarea>
      </div>
      <br />
      <br />

      Mot de passe<em>*</em> (6 caractères au moins): <input type="password" name="mdp" required="" value="
        <?php
        if($ID != -1){ echo $query = mysqli_query($connect, "SELECT MDP_Utilisateur FROM Utilisateur_table WHERE ID_Evenement = '$ID'"); }
        ?>"
        /><br/>
      <br/>

      Confirmez votre mot de passe<em>*</em> : <input type="password" name="confirm_mdp" required="" value="
        <?php
          if($ID != -1){ echo $query = mysqli_query($connect, "SELECT MDP_Utilisateur FROM Utilisateur_table WHERE ID_Evenement = '$ID'"); }
        ?>"/><br/>
      <br/>

      </fieldset>

      <fieldset>
      <legend>Contact</legend>

      Code postal<em>*</em> : <input type="text" name="adresse" maxlength="5" required="" value="
        <?php
          if($ID != -1){ echo $query = mysqli_query($connect, "SELECT Adresse_Utilisateur FROM Utilisateur_table WHERE ID_Evenement = '$ID'"); }
        ?>"
        /><br/>
      <br/>

      Adresse e-mail<em>*</em> : <input type="email" name="mail" required="" value="
        <?php
          if($ID != -1){ echo $query = mysqli_query($connect, "SELECT Mail_Utilisateur FROM Utilisateur_table WHERE ID_Evenement = '$ID'"); }
        ?>"
        /><br/>
      <br/>

      Confirmez votre adresse e-mail<em>*</em> : <input type="email" name="confirm_mail" required="" value="
        <?php
          if($ID != -1){ echo $query = mysqli_query($connect, "SELECT Mail_Utilisateur FROM Utilisateur_table WHERE ID_Evenement = '$ID'"); }
        ?>"
        /><br/>
      <br/>

      </fieldset>

      <fieldset>
      <legend>Préférences</legend>

      Catégories qui vont m'interesser le plus (plusieurs réponses possibles): <br>
      <br/>
      <input type="checkbox" name="categorieFavorite1" value="Festivals" <?php if (isset($_POST['categorieFavorite1'])){if($_POST['categorieFavorite1']=='Festivals') echo 'checked="checked"';}?> />Festivals<br>
      <input type="checkbox" name="categorieFavorite2" value="Repas/Banquets" <?php if (isset($_POST['categorieFavorite2'])){if($_POST['categorieFavorite2']=='Repas/Banquets') echo 'checked="checked"';}?>/>Repas/Banquets<br>
      <input type="checkbox" name="categorieFavorite3" value="Concerts" <?php if (isset($_POST['categorieFavorite3'])){if($_POST['categorieFavorite3']=='Concerts') echo 'checked="checked"';}?>/>Concerts<br>
      <input type="checkbox" name="categorieFavorite4" value="Brocantes/Marchés" <?php if (isset($_POST['categorieFavorite4'])){if($_POST['categorieFavorite4']=='Brocantes/Marchés') echo 'checked="checked"';}?>/>Brocantes/Marchés<br>
      <input type="checkbox" name="categorieFavorite5" value="Soirées" <?php if (isset($_POST['categorieFavorite5'])){if($_POST['categorieFavorite5']=='Soirées') echo 'checked="checked"';}?>/>Soirées<br>
      <input type="checkbox" name="categorieFavorite6" value="Conférences" <?php if (isset($_POST['categorieFavorite6'])){if($_POST['categorieFavorite6']=='Conférences') echo 'checked="checked"';}?> />Conférences<br>
      <input type="checkbox" name="categorieFavorite7" value="Humanitaires" <?php if (isset($_POST['categorieFavorite7'])){if($_POST['categorieFavorite7']=='Humanitaires') echo 'checked="checked"';}?>/>Humanitaires<br>
      <input type="checkbox" name="categorieFavorite8" value="Sportifs" <?php if (isset($_POST['categorieFavorite8'])){if($_POST['categorieFavorite8']=='Sportifs') echo 'checked="checked"';}?>/>Sportifs<br>
      <input type="checkbox" name="categorieFavorite9" value="Manifestations" <?php if (isset($_POST['categorieFavorite9'])){if($_POST['categorieFavorite9']=='Manifestations') echo 'checked="checked"';}?>/>Manifestations<br>
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
