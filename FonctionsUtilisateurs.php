<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="Style-form.css"/>
</head>
<?php

// Conexion à la base
$connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise"); // mdp = "root", "pass" ou encore "" (A MODIFIER SELON VOTRE ORDI)

// Vérifier la connexion
if (!$connect)
  { printf("Echec de la connexion : %s\n", mysqli_connect_error());
    exit(); }

function update_mdp()
{
	$ID = $_SESSION["ID_Utilisateur"];
	// MAJ DU MDP
if(isset($_POST['mdp']) && !empty($_POST['mdp']) && isset($_POST['confirm_mdp']) && !empty($_POST['confirm_mdp']) && isset($_POST['mdp_actu']) && !empty($_POST['mdp_actu'])){
	$mdp=htmlspecialchars($_POST['mdp']);
	$confirm_mdp=htmlspecialchars($_POST['confirm_mdp']);
	$mdp_actu=htmlspecialchars($_POST['mdp_actu']);
	$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
	$req = $bdd->prepare('SELECT MDP_Utilisateur FROM utilisateur_table WHERE ID_Utilisateur = ?');
	$req->execute(array($ID));
	$data = $req->fetch();

	if( $data['MDP_Utilisateur']==sha1($mdp_actu) && ($mdp == $confirm_mdp) && (strlen($mdp) > 5))
	{
		$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
		$req = $bdd->prepare('UPDATE utilisateur_table SET MDP_Utilisateur="'. sha1($mdp) .'" WHERE ID_Utilisateur ="'.$ID.'"');
		$req->execute();
		print "<div class='alert-box success'><span>FELICITATIONS : </span>Votre mot de passe a été mis à jour </div>";}

	else {$cond = false; print "<div class='alert-box warning'><span>attention: </span>Veuillez vous assurer d'avoir entré correctement votre mot de passe actuel et d'avoir entré deux fois votre nouveau mot de passe. </div>";}
}
}

function update_users()
{

  if (isset($_POST['modifier']) &&htmlspecialchars($_POST['modifier']) == "MODIFIER MON PROFIL")
  {$cond = true;

    $ID = $_SESSION["ID_Utilisateur"];

    // MAJ DU NOM
		if(isset($_POST['nom'])								&& !empty($_POST['nom'])  && preg_match('#^[a-zA-Z]*$#', $_POST['nom'])  && strlen($_POST['nom'])<33  && strlen($_POST['nom'])>1)
		{
			$nom=htmlspecialchars($_POST['nom']);

			$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
			$req = $bdd->prepare('UPDATE utilisateur_table SET Nom_Utilisateur="'.$nom.'" WHERE ID_Utilisateur ="'.$ID.'"');
			$req->execute();
		}
		else {$cond = false; print "<div class='alert-box warning'><span>attention: </span>Votre nom doit être composé de 2 à 32 lettres et ne pas contenir de caractères spéciaux ni de chiffres. </br> Veuillez le reformuler.</div>";}



    // MAJ DU PRENOM
		if(isset($_POST['prenom'])						&& !empty($_POST['prenom']) && preg_match('#^[a-zA-Z]*$#', $_POST['nom'])  && strlen($_POST['nom'])<33  && strlen($_POST['nom'])>1)
		{
      $prenom=htmlspecialchars($_POST['prenom']);

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET Prenom_Utilisateur="'.$prenom.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }
			else {$cond = false; print "<div class='alert-box warning'><span>attention: </span>Votre prénom doit être composé de 2 à 32 lettres et ne pas contenir de caractères spéciaux ni de chiffres. </br> Veuillez le reformuler.</div>";}


    // MAJ DU GENRE
		if( isset($_POST['genre'])							 && !empty($_POST['genre'])  && preg_match('#^[a-zA-Z]*$#', $_POST['genre'])  && strlen($_POST['genre'])==5)
		{
			$genre=htmlspecialchars($_POST['genre']);

			$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
			$req = $bdd->prepare('UPDATE utilisateur_table SET Genre_Utilisateur="'.$genre.'" WHERE ID_Utilisateur ="'.$ID.'"');
			$req->execute();
		}


    // MAJ DE LA DATE DE NAISSANCE
		if(isset($_POST['dateNaissance'])			&& !empty($_POST['dateNaissance']))
      { $dateNaissance=htmlspecialchars($_POST['dateNaissance']);
        $past100Years = time() - (100 * 365 * 24 * 60 * 60);
        $past12Years = time() - (12 * 365 * 24 * 60 * 60);
        $maxancien  = date('Y-m-d', $past100Years);
        $maxnew  = date('Y-m-d', $past12Years);
				$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
				$req = $bdd->prepare('UPDATE utilisateur_table SET Date_Naissance="'.$dateNaissance.'" WHERE ID_Utilisateur ="'.$ID.'"');
				$req->execute();

      if ($dateNaissance < $maxancien OR $dateNaissance > $maxnew)
      { $cond = false; print "<div class='alert-box success'><span>remarque: </span>La date de naissance indiquée de vous permet pas l'accès au site.</br> Pour une utilisation optimale, nous vous conseillons de vous inscrire après vos 12 ans et avant vos 100 ans.</div>"; }
   }





    // MAJ DE LA DESCRITPION UTILISATEUR
		    if(isset($_POST['description'])				 && !empty($_POST['description'])   && strlen($_POST['description'])<256)
		      {	$description=htmlspecialchars($_POST['description']);
						$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
			      $req = $bdd->prepare('UPDATE utilisateur_table SET Description_Utilisateur="'.$description.'" WHERE ID_Utilisateur ="'.$ID.'"');
			      $req->execute();}
				else {$cond = false; print "<div class='alert-box warning'><span>attention: </span>Votre description doit contenir entre 0 et 255 caractères. </br> Veuillez la reformuler.</div>";}




    // MAJ DU CODE POSTAL UTILISATEUR
		    if(isset($_POST['adresse'])						&& !empty($_POST['adresse'])  && strlen($_POST['adresse'])==5 && preg_match('#^[0-9]*$#', $_POST['adresse']))
		    { $adresse=htmlspecialchars($_POST['adresse']);
					$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
	        $req = $bdd->prepare('UPDATE utilisateur_table SET Adresse_Utilisateur="'.$adresse.'" WHERE ID_Utilisateur ="'.$ID.'"');
	        $req->execute();}
		    else { $cond = false; print "<div class='alert-box warning'><span>attention: </span>Votre code postal doit être un composé de 5 chiffres.</div>"; }



    /*// MAJ DU MAIL
		if(isset($_POST['mail'])							&& !empty($_POST['mail'])
    && isset($_POST['confirm_mail'])      && !empty($_POST['confirm_mail']))
    { $mail=htmlspecialchars($_POST['mail']);
      $confirm_mail = htmlspecialchars($_POST['confirm_mail']);
      if($mail != $confirm_mail)
        { $cond = false; print "<div class='alert-box warning'><span>attention: </span>Vous n'avez pas saisi deux fois la même adresse email.</div>";}

    $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); //root pour mac
    $req = $bdd->prepare('SELECT Mail_Utilisateur FROM utilisateur_table WHERE Mail_Utilisateur = ?');
    $req->execute(array($mail));

    $data = $req->fetch();

    if($data)
      { print "<div class='alert-box warning'><span>attention: </span>Votre adresse email est déjà utilisée par un utilisateur. </br> Veuillez vous connectez, ou en choisir une autre.</div>"; }

			else {
      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); //root pour mac
      $req = $bdd->prepare('UPDATE utilisateur_table SET Mail_Utilisateur="'.$mail.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();}
      }
*/


    // MAJ CATEGORIES FAVORITES UTILSATEUR

    $categorieFavorite = "";
    if(isset($_POST['categorieFavorite1']) && !empty($_POST['categorieFavorite1']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite1']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite2']) && !empty($_POST['categorieFavorite2']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite2']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite3']) && !empty($_POST['categorieFavorite3']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite3']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite4']) && !empty($_POST['categorieFavorite4']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite4']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite5']) && !empty($_POST['categorieFavorite5']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite5']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite6']) && !empty($_POST['categorieFavorite6']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite6']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite7']) && !empty($_POST['categorieFavorite7']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite7']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite8']) && !empty($_POST['categorieFavorite8']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite8']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite9']) && !empty($_POST['categorieFavorite9']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite9']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}

    $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
    $req = $bdd->prepare('UPDATE utilisateur_table SET Categorie_Favorite="'.$categorieFavorite.'" WHERE ID_Utilisateur ="'.$ID.'"');
    $req->execute();

    // MAJ ADRESSE EMAIL VISIBLE ?
    if(isset($_POST['mailOK']) && !empty($_POST['mailOK']))
    {
      $mailOK =htmlspecialchars($_POST['mailOK']);

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET OKmail_Utilisateur="'.$mailOK.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }

    // MAJ CODE POSTAL VISIBLE ?
    if(isset($_POST['adresseOK']) && !empty($_POST['adresseOK']))
    {
      $adresseOK =htmlspecialchars($_POST['adresseOK']);

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET OKadresse_Utilisateur="'.$adresseOK.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }


    // MAJ NOM ET PRENOM VISIBLES
    if(isset($_POST['nomPrenomOK']) && !empty($_POST['nomPrenomOK']))
    {
      $nomPrenomOK =htmlspecialchars($_POST['nomPrenomOK']);

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET OKNomPrenom_Utilisateur="'.$nomPrenomOK.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }


    // PLANNING PERSO VISIBLE
    if(isset($_POST['planningOK']) && !empty($_POST['planningOK']))
    {
      $planningOK =htmlspecialchars($_POST['planningOK']);

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET OKplanning_Utilisateur="'.$planningOK.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }


    // SPAM EMAIL EVENEMENTS
    if(isset($_POST['AlertesEvenementsOK']) && !empty($_POST['AlertesEvenementsOK']))
    {
      $AlertesEvenementsOK =htmlspecialchars($_POST['AlertesEvenementsOK']);

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET OKAlertesEvenements_Utilisateur="'.$AlertesEvenementsOK.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }


    // SPAM EMAIL ABONNEMENTS
    if(isset($_POST['AlertesAbonnementsOK']) && !empty($_POST['AlertesAbonnementsOK']))
    {
      $AlertesAbonnementsOK =htmlspecialchars($_POST['AlertesAbonnementsOK']);

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET OKAlertesAbonnements_Utilisateur="'.$AlertesAbonnementsOK.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }
		if($cond == true) {print "<div class='alert-box success'><span>FELICITATIONS : </span>Vos informations ont été mises à jour </div>";}

  }

}



//insérer un nouveau profil dans la table "utilisateur_table" de la base de données "Connexion_Gauloise"
function insert_users()
  { $connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise"); // mdp = "root", "pass" ou encore "" (A MODIFIER SELON VOTRE ORDI)

  if (isset($_POST['valider']) && htmlspecialchars($_POST['valider']) == "VALIDER MON PROFIL")
    { $cond=true; // Vérifie que le formulaire soit bien validé (absence du "else" plus tard)


  //PSEUDO UTILISATEUR
		if(isset($_POST['pseudo']) 						&& !empty($_POST['pseudo'])   && preg_match('#^[a-zA-Z0-9]*$#', $_POST['pseudo'])  && strlen($_POST['pseudo'])<33  && strlen($_POST['pseudo'])>3)
      { $pseudo =htmlspecialchars($_POST['pseudo']);

        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); //root pour mac
        $req = $bdd->prepare('SELECT pseudo_utilisateur FROM utilisateur_table WHERE pseudo_utilisateur = ?');
        $req->execute(array($pseudo));

        $data = $req->fetch();

        //$query = mysqli_query($connect, "SELECT id_utilisateur FROM utilisateur_table WHERE Pseudo_Utilisateur = '$pseudo'");
        //$resultat = mysqli_fetch_row($query);

        if($data)
          { $cond = false; print "<div class='alert-box warning'><span>attention: </span>Votre pseudo est déjà utilisé par un autre utilisateur. </br> Veuillez en choisir un autre.</div>"; }
      }
			else {$cond = false; print "<div class='alert-box warning'><span>attention: </span>Votre pseudo doit être composé de 4 à 32 caractères et ne pas contenir de caractères spéciaux. </br> Veuillez le reformuler.</div>";}



//NOM UTILISATEUR
		if(isset($_POST['nom'])								&& !empty($_POST['nom'])  && preg_match('#^[a-zA-Z]*$#', $_POST['nom'])  && strlen($_POST['nom'])<33  && strlen($_POST['nom'])>1)
      { $nom=htmlspecialchars($_POST['nom']);}
		else {$cond = false; print "<div class='alert-box warning'><span>attention: </span>Votre nom doit être composé de 2 à 32 lettres et ne pas contenir de caractères spéciaux ni de chiffres. </br> Veuillez le reformuler.</div>";}

//PRENOM UTILISATEUR
		if(isset($_POST['prenom'])						&& !empty($_POST['prenom']) && preg_match('#^[a-zA-Z]*$#', $_POST['nom'])  && strlen($_POST['nom'])<33  && strlen($_POST['nom'])>1)
      {	$prenom=htmlspecialchars($_POST['prenom']);}
			else {$cond = false; print "<div class='alert-box warning'><span>attention: </span>Votre prénom doit être composé de 2 à 32 lettres et ne pas contenir de caractères spéciaux ni de chiffres. </br> Veuillez le reformuler.</div>";}

// DATE DE NAISSANCE UTILISATEUR
    if(isset($_POST['dateNaissance'])			&& !empty($_POST['dateNaissance']))
      { $dateNaissance=htmlspecialchars($_POST['dateNaissance']);
        $past100Years = time() - (100 * 365 * 24 * 60 * 60);
        $past12Years = time() - (12 * 365 * 24 * 60 * 60);
        $maxancien  = date('Y-m-d', $past100Years);
        $maxnew  = date('Y-m-d', $past12Years);

      if ($dateNaissance < $maxancien OR $dateNaissance > $maxnew)
      { $cond = false; print "<div class='alert-box success'><span>remarque: </span>La date de naissance indiquée de vous permet pas l'accès au site.</br> Pour une utilisation optimale, nous vous conseillons de vous inscrire après vos 12 ans et avant vos 100 ans.</div>"; }
   }


// CODE POSTAL UTILISATEUR
    if(isset($_POST['adresse'])						&& !empty($_POST['adresse'])  && strlen($_POST['adresse'])==5 && preg_match('#^[0-9]*$#', $_POST['adresse']))
    { $adresse=htmlspecialchars($_POST['adresse']);  }
    else { $cond = false; print "<div class='alert-box warning'><span>attention: </span>Votre code postal doit être un composé de 5 chiffres.</div>"; }



// MOT DE PASSE UTILISATEUR
    if(isset($_POST['mdp'])               && !empty($_POST['mdp'])
    && isset($_POST['confirm_mdp'])       && !empty($_POST['confirm_mdp']))
      { $mdp=htmlspecialchars($_POST['mdp']);
        $confirm_mdp= htmlspecialchars($_POST['confirm_mdp']);
      if($mdp != $confirm_mdp)
        { $cond = false; print "<div class='alert-box warning'><span>attention: </span> Vous n'avez pas saisi deux fois le même mot de passe. </div>";}
      if(strlen($mdp) < 6 &&  strlen($mdp)<33)
        { $cond = false; print "<div class='alert-box warning'><span>attention: </span> Votre mot de passe doit contenir entre 6 et 32 caractères. </div>";}
      }


// MAIL DE L'UTILISATEUR
    if(isset($_POST['mail'])							&& !empty($_POST['mail'])
    && isset($_POST['confirm_mail'])      && !empty($_POST['confirm_mail']))
    { $mail=htmlspecialchars($_POST['mail']);
      $confirm_mail = htmlspecialchars($_POST['confirm_mail']);
      if($mail != $confirm_mail)
        { $cond = false; print "<div class='alert-box warning'><span>attention: </span>Vous n'avez pas saisi deux fois la même adresse email.</div>";}
    }
    $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); //root pour mac
    $req = $bdd->prepare('SELECT Mail_Utilisateur FROM utilisateur_table WHERE Mail_Utilisateur = ?');
    $req->execute(array($mail));

    $data = $req->fetch();

    if($data)
      { $cond = false; print "<div class='alert-box warning'><span>attention: </span>Votre adresse email est déjà utilisée par un utilisateur. </br> Veuillez vous connectez, ou en choisir une autre.</div>"; }


// DESCRIPTION UTILISATEUR
    if(isset($_POST['description'])				 && !empty($_POST['description'])   && strlen($_POST['description'])<256)
      {	$description=htmlspecialchars($_POST['description']);}
			else {$cond = false; print "<div class='alert-box warning'><span>attention: </span>Votre description doit contenir entre 0 et 255 caractères.</br> Veuillez la reformuler.</div>";}


// GENRE / SEXE UTILISATEUR
    if( isset($_POST['genre'])							 && !empty($_POST['genre'])  && preg_match('#^[a-zA-Z]*$#', $_POST['genre'])  && strlen($_POST['genre'])==5)
      {	$genre=htmlspecialchars($_POST['genre']);}
    else
      { $genre = NULL;}


// CATEGORIES FAVORITES UTILSATEUR
$categorieFavorite = "";
    if(isset($_POST['categorieFavorite1']) && !empty($_POST['categorieFavorite1']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite1']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite2']) && !empty($_POST['categorieFavorite2']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite2']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite3']) && !empty($_POST['categorieFavorite3']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite3']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite4']) && !empty($_POST['categorieFavorite4']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite4']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite5']) && !empty($_POST['categorieFavorite5']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite5']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite6']) && !empty($_POST['categorieFavorite6']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite6']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite7']) && !empty($_POST['categorieFavorite7']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite7']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite8']) && !empty($_POST['categorieFavorite8']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite8']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite9']) && !empty($_POST['categorieFavorite9']))	{ $categorieFavorite 	.=htmlspecialchars($_POST['categorieFavorite9']); $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}


  // ADRESSE EMAIL VISIBLE
    if(isset($_POST['mailOK']) && !empty($_POST['mailOK']))
      {
        $mailOK =htmlspecialchars($_POST['mailOK']);
      }
    else
      { $mailOK = NULL;}


  // CODE POSTAL VISIBLE
    if(isset($_POST['adresseOK']) && !empty($_POST['adresseOK']))
      {
        $adresseOK =htmlspecialchars($_POST['adresseOK']);
      }
    else
      { $adresseOK = NULL;}


// NOM ET PRENOM VISIBLES
    if(isset($_POST['nomPrenomOK']) && !empty($_POST['nomPrenomOK']))
      {
        $nomPrenomOK =htmlspecialchars($_POST['nomPrenomOK']);
      }
    else
      { $nomPrenomOK = NULL;}


  // PLANNING PERSO VISIBLE
    if(isset($_POST['planningOK']) && !empty($_POST['planningOK']))
      {
        $planningOK =htmlspecialchars($_POST['planningOK']);
      }
    else
      { $planningOK = NULL;}


  // SPAM EMAIL EVENEMENTS
    if(isset($_POST['AlertesEvenementsOK']) && !empty($_POST['AlertesEvenementsOK']))
      {
        $AlertesEvenementsOK =htmlspecialchars($_POST['AlertesEvenementsOK']);
      }
    else
      { $AlertesEvenementsOK = NULL;}


  // SPAM EMAIL ABONNEMENTS
    if(isset($_POST['AlertesAbonnementsOK']) && !empty($_POST['AlertesAbonnementsOK']))
      {
        $AlertesAbonnementsOK =htmlspecialchars($_POST['AlertesAbonnementsOK']);
      }
    else
      { $AlertesAbonnementsOK = NULL;}


  // DATE INSCRIPTION
		$dateInscription = date("Y-m-d");

  // ADMIN
		$admin = "non";

  // avatar
  $avatar="profil.jpg";

  // ENREGISTREMENT DANS LA BASE DE DONNEES
		if($cond == true)
      {
				$mdp_hache = sha1($mdp);
				mysqli_query($connect, "insert into utilisateur_table (Pseudo_Utilisateur, MDP_Utilisateur, Nom_Utilisateur, Prenom_Utilisateur, Avatar_Utilisateur, Description_Utilisateur,
                                                             Adresse_Utilisateur, Mail_Utilisateur, Genre_Utilisateur, Date_Naissance, Categorie_Favorite, Date_Inscription, Admin_Utilisateur,
                                                             OKadresse_Utilisateur, OKmail_Utilisateur, OKNomPrenom_Utilisateur, OKplanning_Utilisateur, OKAlertesEvenements_Utilisateur, OKAlertesAbonnements_Utilisateur)
                              values ('$pseudo', '$mdp_hache', '$nom','$prenom', '$avatar', '$description', '$adresse','$mail','$genre','$dateNaissance','$categorieFavorite', '$dateInscription', '$admin',
                                      '$adresseOK', '$mailOK', '$nomPrenomOK', '$planningOK', '$AlertesEvenementsOK', '$AlertesAbonnementsOK')")
                              or die('Error: ' . mysqli_error($connect));

      header("location:Page_Confirm_Inscription.php");
		  }
    else
      { print "<div class='alert-box error'><span>erreur: </span>Les informations entrées sont incorrectes, veuillez réessayer !</div> "; }

	}

	mysqli_close($connect); }


?>
