<?php

// Conexion à la base
$connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise"); // mdp = "root", "pass" ou encore "" (A MODIFIER SELON VOTRE ORDI)

// Vérifier la connexion
if (!$connect)
  { printf("Echec de la connexion : %s\n", mysqli_connect_error());
    exit(); }


function update_users()
{

  if (isset($_POST['valider']) && $_POST['valider'] == "VALIDER MON PROFIL")
  {

    $ID = $_SESSION["ID_Utilisateur"];

    // MAJ DU NOM
    if(isset($_POST['nom']) && !empty($_POST['nom']))
    {
      $nom=$_POST['nom'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET Nom_Utilisateur="'.$nom.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }


    // MAJ DU PRENOM
    if(isset($_POST['prenom']) && !empty($_POST['prenom']))
    {
      $prenom=$_POST['prenom'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET Prenom_Utilisateur="'.$prenom.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }


    // MAJ DU GENRE
    if( isset($_POST['genre']) && !empty($_POST['genre']))
    {
      $genre=$_POST['genre'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET Genre_Utilisateur="'.$genre.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }


    // MAJ DE LA DATE DE NAISSANCE
    if(isset($_POST['dateNaissance']) && !empty($_POST['dateNaissance'])){
      $dateNaissance=$_POST['dateNaissance'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET Date_Naissance="'.$dateNaissance.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }


    // MAJ DE LA DESCRITPION
    if(isset($_POST['description']) && !empty($_POST['description']))
    {
      $description=$_POST['description'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET Description_Utilisateur="'.$description.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }


    // MAJ DU MDP
    if(isset($_POST['mdp']) && !empty($_POST['mdp']) && isset($_POST['confirm_mdp']) && !empty($_POST['confirm_mdp'])){

      $mdp=$_POST['mdp'];
      $confirm_mdp= $_POST['confirm_mdp'];

      if(($mdp == $confirm_mdp) && (strlen($mdp) > 5))
      {
        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
        $req = $bdd->prepare('UPDATE utilisateur_table SET MDP_Utilisateur="'.$mdp.'" WHERE ID_Utilisateur ="'.$ID.'"');
        $req->execute();
      }
      else
      {
        echo "Mot de passe incorrect !";
      }
    }


    // MAJ DE L'ADRESSE
    if(isset($_POST['adresse']) && !empty($_POST['adresse']))
    {
      $adresse=$_POST['adresse'];

      if(strlen($adresse) == 5 AND is_numeric($adresse))
      {
        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
        $req = $bdd->prepare('UPDATE utilisateur_table SET Adresse_Utilisateur="'.$adresse.'" WHERE ID_Utilisateur ="'.$ID.'"');
        $req->execute();
      }
      else
      {
        echo "Adresse incorrecte !";
      }
    }


    // MAJ DU MAIL
    if(isset($_POST['mail']) && !empty($_POST['mail']) && isset($_POST['confirm_mail']) && !empty($_POST['confirm_mail']))
    {
      $mail=$_POST['mail'];
      $confirm_mail = $_POST['confirm_mail'];

      if($mail == $confirm_mail)
      {
        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
        $req = $bdd->prepare('UPDATE utilisateur_table SET Mail_Utilisateur="'.$mail.'" WHERE ID_Utilisateur ="'.$ID.'"');
        $req->execute();
      }
      else
      {
      echo "Mail incorrecte !";
      }
    }


    // MAJ CATEGORIES FAVORITES UTILSATEUR

    $categorieFavorite = "";
    if(isset($_POST['categorieFavorite1']) && !empty($_POST['categorieFavorite1']))	{ $categorieFavorite 	.= $_POST['categorieFavorite1']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite2']) && !empty($_POST['categorieFavorite2']))	{ $categorieFavorite 	.= $_POST['categorieFavorite2']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite3']) && !empty($_POST['categorieFavorite3']))	{ $categorieFavorite 	.= $_POST['categorieFavorite3']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite4']) && !empty($_POST['categorieFavorite4']))	{ $categorieFavorite 	.= $_POST['categorieFavorite4']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite5']) && !empty($_POST['categorieFavorite5']))	{ $categorieFavorite 	.= $_POST['categorieFavorite5']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite6']) && !empty($_POST['categorieFavorite6']))	{ $categorieFavorite 	.= $_POST['categorieFavorite6']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite7']) && !empty($_POST['categorieFavorite7']))	{ $categorieFavorite 	.= $_POST['categorieFavorite7']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite8']) && !empty($_POST['categorieFavorite8']))	{ $categorieFavorite 	.= $_POST['categorieFavorite8']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite9']) && !empty($_POST['categorieFavorite9']))	{ $categorieFavorite 	.= $_POST['categorieFavorite9']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}

    $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
    $req = $bdd->prepare('UPDATE utilisateur_table SET Categorie_Favorite="'.$categorieFavorite.'" WHERE ID_Utilisateur ="'.$ID.'"');
    $req->execute();

    // MAJ ADRESSE EMAIL VISIBLE ?
    if(isset($_POST['mailOK']) && !empty($_POST['mailOK']))
    {
      $mailOK = $_POST['mailOK'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET OKmail_Utilisateur="'.$mailOK.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }

    // MAJ CODE POSTAL VISIBLE ?
    if(isset($_POST['adresseOK']) && !empty($_POST['adresseOK']))
    {
      $adresseOK = $_POST['adresseOK'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET OKadresse_Utilisateur="'.$adresseOK.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }


    // MAJ NOM ET PRENOM VISIBLES
    if(isset($_POST['nomPrenomOK']) && !empty($_POST['nomPrenomOK']))
    {
      $nomPrenomOK = $_POST['nomPrenomOK'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET OKNomPrenom_Utilisateur="'.$nomPrenomOK.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }


    // PLANNING PERSO VISIBLE
    if(isset($_POST['planningOK']) && !empty($_POST['planningOK']))
    {
      $planningOK = $_POST['planningOK'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET OKplanning_Utilisateur="'.$planningOK.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }


    // SPAM EMAIL EVENEMENTS
    if(isset($_POST['AlertesEvenementsOK']) && !empty($_POST['AlertesEvenementsOK']))
    {
      $AlertesEvenementsOK = $_POST['AlertesEvenementsOK'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET OKAlertesEvenements_Utilisateur="'.$AlertesEvenementsOK.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }


    // SPAM EMAIL ABONNEMENTS
    if(isset($_POST['AlertesAbonnementsOK']) && !empty($_POST['AlertesAbonnementsOK']))
    {
      $AlertesAbonnementsOK = $_POST['AlertesAbonnementsOK'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET OKAlertesAbonnements_Utilisateur="'.$AlertesAbonnementsOK.'" WHERE ID_Utilisateur ="'.$ID.'"');
      $req->execute();
    }
  }
}



//insérer un nouveau profil dans la table "utilisateur_table" de la base de données "Connexion_Gauloise"
function insert_users()
  { $connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise"); // mdp = "root", "pass" ou encore "" (A MODIFIER SELON VOTRE ORDI)

  if (isset($_POST['valider']) && $_POST['valider'] == "VALIDER MON PROFIL")
    { $cond=true; // Vérifie que le formulaire soit bien validé (absence du "else" plus tard)


  //PSEUDO UTILISATEUR
		if(isset($_POST['pseudo']) 						&& !empty($_POST['pseudo']))
      { $pseudo = $_POST['pseudo'];

        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); //root pour mac
        $req = $bdd->prepare('SELECT pseudo_utilisateur FROM utilisateur_table WHERE pseudo_utilisateur = ?');
        $req->execute(array($pseudo));

        $data = $req->fetch();

        //$query = mysqli_query($connect, "SELECT id_utilisateur FROM utilisateur_table WHERE Pseudo_Utilisateur = '$pseudo'");
        //$resultat = mysqli_fetch_row($query);

        if($data)
          { $cond = false; print "Votre pseudo est déjà utilisé par un autre utilisateur! Veuillez en choisir un autre."; }
      }
    else
      { $cond = false; print "Votre pseudo n'est pas configuré ! ";}


//NOM UTILISATEUR
		if(isset($_POST['nom'])								&& !empty($_POST['nom']))
      { $nom=$_POST['nom'];}
    else
      { $cond = false; print "Votre nom n'est pas configuré ! ";}


//PRENOM UTILISATEUR
		if(isset($_POST['prenom'])						&& !empty($_POST['prenom']))
      {	$prenom=$_POST['prenom'];}
    else
      { $cond = false; print "Votre prenom n'est pas configuré ! ";}


// DATE DE NAISSANCE UTILISATEUR
    if(isset($_POST['dateNaissance'])			&& !empty($_POST['dateNaissance']))
      { $dateNaissance=$_POST['dateNaissance'];}
    else
      { $cond = false; print "Votre date de naissance n'est pas configurée ! ";}


// CODE POSTAL UTILISATEUR
    if(isset($_POST['adresse'])						&& !empty($_POST['adresse']))
    { $adresse=$_POST['adresse'];

      if(strlen($adresse) != 5 AND !is_numeric($adresse))
        { $cond = false; print "Votre adresse n'est pas configurée ! N'est pas un entier"; }
    }


// MOT DE PASSE UTILISATEUR
    if(isset($_POST['mdp'])               && !empty($_POST['mdp'])
    && isset($_POST['confirm_mdp'])       && !empty($_POST['confirm_mdp']))
      { $mdp=$_POST['mdp'];
        $confirm_mdp= $_POST['confirm_mdp'];
      if($mdp != $confirm_mdp)
        { $cond = false; print "Votre mot de passe est mal confirmé ! Veuillez réessayer ! ";}
      if(strlen($mdp) <= 5)
        { $cond = false; print "Votre mot de passe doit faire au moins 6 caractères ! Veuillez réessayer ! ";}
      }
    else
      { $cond = false; print "Votre mot de passe n'est pas configuré ! ";}


// MAIL DE L'UTILISATEUR
    if(isset($_POST['mail'])							&& !empty($_POST['mail'])
    && isset($_POST['confirm_mail'])      && !empty($_POST['confirm_mail']))
      { $mail=$_POST['mail'];
        $confirm_mail = $_POST['confirm_mail'];
        if($mail != $confirm_mail)
          { $cond = false; print "Votre mail est mal confirmé ! Veuillez réessayer ! ";}
      }
    else
      { $cond = false; print "Votre mail n'est pas configuré ! ";}


// DESCRIPTION UTILISATEUR
    if(isset($_POST['description'])				 && !empty($_POST['description']))
      {	$description=$_POST['description'];}
    else
      { $description = " ";}


// GENRE / SEXE UTILISATEUR
    if( isset($_POST['genre'])							 && !empty($_POST['genre']))
      {	$genre=$_POST['genre'];}
    else
      { $genre = NULL;}


// CATEGORIES FAVORITES UTILSATEUR
$categorieFavorite = "";
    if(isset($_POST['categorieFavorite1']) && !empty($_POST['categorieFavorite1']))	{ $categorieFavorite 	.= $_POST['categorieFavorite1']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite2']) && !empty($_POST['categorieFavorite2']))	{ $categorieFavorite 	.= $_POST['categorieFavorite2']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite3']) && !empty($_POST['categorieFavorite3']))	{ $categorieFavorite 	.= $_POST['categorieFavorite3']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite4']) && !empty($_POST['categorieFavorite4']))	{ $categorieFavorite 	.= $_POST['categorieFavorite4']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite5']) && !empty($_POST['categorieFavorite5']))	{ $categorieFavorite 	.= $_POST['categorieFavorite5']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite6']) && !empty($_POST['categorieFavorite6']))	{ $categorieFavorite 	.= $_POST['categorieFavorite6']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite7']) && !empty($_POST['categorieFavorite7']))	{ $categorieFavorite 	.= $_POST['categorieFavorite7']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite8']) && !empty($_POST['categorieFavorite8']))	{ $categorieFavorite 	.= $_POST['categorieFavorite8']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}
    if(isset($_POST['categorieFavorite9']) && !empty($_POST['categorieFavorite9']))	{ $categorieFavorite 	.= $_POST['categorieFavorite9']; $categorieFavorite .= " ";}else{ $categorieFavorite .= "";}


  // ADRESSE EMAIL VISIBLE
    if(isset($_POST['mailOK']) && !empty($_POST['mailOK']))
      {
        $mailOK = $_POST['mailOK'];
      }
    else
      { $mailOK = NULL;}


  // CODE POSTAL VISIBLE
    if(isset($_POST['adresseOK']) && !empty($_POST['adresseOK']))
      {
        $adresseOK = $_POST['adresseOK'];
      }
    else
      { $adresseOK = NULL;}


// NOM ET PRENOM VISIBLES
    if(isset($_POST['nomPrenomOK']) && !empty($_POST['nomPrenomOK']))
      {
        $nomPrenomOK = $_POST['nomPrenomOK'];
      }
    else
      { $nomPrenomOK = NULL;}


  // PLANNING PERSO VISIBLE
    if(isset($_POST['planningOK']) && !empty($_POST['planningOK']))
      {
        $planningOK = $_POST['planningOK'];
      }
    else
      { $planningOK = NULL;}


  // SPAM EMAIL EVENEMENTS
    if(isset($_POST['AlertesEvenementsOK']) && !empty($_POST['AlertesEvenementsOK']))
      {
        $AlertesEvenementsOK = $_POST['AlertesEvenementsOK'];
      }
    else
      { $AlertesEvenementsOK = NULL;}


  // SPAM EMAIL ABONNEMENTS
    if(isset($_POST['AlertesAbonnementsOK']) && !empty($_POST['AlertesAbonnementsOK']))
      {
        $AlertesAbonnementsOK = $_POST['AlertesAbonnementsOK'];
      }
    else
      { $AlertesAbonnementsOK = NULL;}


  // DATE INSCRIPTION
		$dateInscription = date("Y-m-d");

  // DROITS D'ADMIN
	$admin = "non";

  // DATE INSCRIPTION
  $avatar="profil.jpeg";

  // ENREGISTREMENT DANS LA BASE DE DONNEES
		if($cond == true)
      { mysqli_query($connect, "insert into utilisateur_table (Pseudo_Utilisateur, MDP_Utilisateur, Nom_Utilisateur, Prenom_Utilisateur, Avatar_Utilisateur, Description_Utilisateur,
                                                             Adresse_Utilisateur, Mail_Utilisateur, Genre_Utilisateur, Date_Naissance, Categorie_Favorite, Date_Inscription, Admin_Utilisateur,
                                                             OKadresse_Utilisateur, OKmail_Utilisateur, OKNomPrenom_Utilisateur, OKplanning_Utilisateur, OKAlertesEvenements_Utilisateur, OKAlertesAbonnements_Utilisateur)
                              values ('$pseudo', '$mdp', '$nom','$prenom', '$avatar', '$description', '$adresse','$mail','$genre','$dateNaissance','$categorieFavorite', '$dateInscription', '$admin',
                                      '$adresseOK', '$mailOK', '$nomPrenomOK', '$planningOK', '$AlertesEvenementsOK', '$AlertesAbonnementsOK')")
                              or die('Error: ' . mysqli_error($connect));

      $req = $bdd->prepare('SELECT ID_Utilisateur FROM utilisateur_table WHERE ID_Utilisateur = DESC LIMIT 1');
      $req->execute();
      $identity = $req->fetch();
      $IDU = $identity['ID_Utilisateur'];

      header("location:Page_Confirm_Inscription.php?IDU=".$IDU."");
		  }
    else
      { print "Les informations entrées sont incorrectes ! "; }

	}

	mysqli_close($connect);}


?>
