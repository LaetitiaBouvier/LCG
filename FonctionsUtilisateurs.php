<?php
// Conexion à la base
$connect = mysqli_connect("localhost", "root", "pass", "Connexion_Gauloise");

// Vérifier la connexion
if (!$connect) {
    printf("Echec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

function insert_users(){
	$connect = mysqli_connect("localhost", "root", "pass", "Connexion_Gauloise");

	if (isset($_POST['valider']) && $_POST['valider'] == "VALIDER MON PROFIL") {  // Vérifie que le formulaire soit bien validé

		$cond = true;

		if(isset($_POST['pseudo']) 						&& !empty($_POST['pseudo']))						{

      $pseudo 			= $_POST['pseudo'];

      $query = mysqli_query($connect, "SELECT id FROM utilisateur_table WHERE Pseudo_Utilisateur = '$pseudo'");
      if(mysqli_num_rows($query) == 1){
         // Pseudo déjà utilisé
         $cond = false; print "Votre pseudo est déjà utilisé ! ";
      }

    }else{ $cond = false; print "Votre pseudo n'est pasconfiguré ! ";}

		if(isset($_POST['nom'])								&& !empty($_POST['nom']))								{	$nom					= $_POST['nom'];							}else{ $cond = false; print "Votre nom n'est pas configuré ! ";}
		if(isset($_POST['prenom'])						&& !empty($_POST['prenom']))						{	$prenom 		  = $_POST['prenom']; 					}else{ $cond = false; print "Votre prenom n'est pas configuré ! ";}
		if(isset($_POST['dateNaissance'])			&& !empty($_POST['dateNaissance']))			{ $dateNaissance= $_POST['dateNaissance']; 		}else{ $cond = false; print "Votre date de naissance n'est pas configurée ! ";}

    if(isset($_POST['adresse'])						&& !empty($_POST['adresse'])) 					{
      $adresse			= $_POST['adresse'];

      if(strlen($adresse) == 5){
        if( is_numeric($adresse)){
          // ici l'adresse est OK
        } else{ $cond = false; print "Votre adresse n'est pas configurée ! N'est pas un entier";}
      } else{ $cond = false; print "Votre adresse n'est pas configurée ! N'a pas la bonne taille";}
    }

    if(isset($_POST['mdp'])               && !empty($_POST['mdp'])
    && isset($_POST['confirm_mdp'])       && !empty($_POST['confirm_mdp']))				{
      $mdp				= $_POST['mdp'];
      $confirm_mdp= $_POST['confirm_mdp'];

      if($mdp != $confirm_mdp){ $cond = false; print "Votre mot de passe est mal confirmé ! Veuillez réessayer ! ";}
      if(strlen($mdp) <= 5)    { $cond = false; print "Votre mot de passe doit faire au moins 6 caractères ! Veuillez réessayer ! ";}
    }else{ $cond = false; print "Votre mot de passe n'est pas configuré ! ";}

    if(isset($_POST['mail'])							&& !empty($_POST['mail'])
    && isset($_POST['confirm_mail'])      && !empty($_POST['confirm_mail']))			{
      $mail   			= $_POST['mail'];
      $confirm_mail = $_POST['confirm_mail'];

      if($mail != $confirm_mail){ $cond = false; print "Votre mail est mal confirmé ! Veuillez réessayer ! ";}
    }else{ $cond = false; print "Votre mail n'est pas configuré ! ";}

    if(isset($_POST['description'])				 && !empty($_POST['description']))				{	$description 				= $_POST['description']; 			}else{ $description = NULL;}
    if(isset($_POST['avatar'])						 && !empty($_POST['avatar']))						  {	$avatar							= $_POST['avatar'];						}else{ $avatar = NULL;}
    if(isset($_POST['genre'])							 && !empty($_POST['genre']))							{	$genre							= $_POST['genre'];						}else{ $genre = NULL;}

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

    if(isset($_POST['mailOK']) && !empty($_POST['mailOK']))                         {

      $mailOK              = $_POST['mailOK'];
      if($mailOK != 1){ $mailOK == 0; }
    }else{ $mailOK = NULL;}

    if(isset($_POST['adresseOK']) && !empty($_POST['adresseOK']))                   {

      $adresseOK              = $_POST['adresseOK'];
      if($adresseOK != 1){ $adresseOK == 0; }
    }else{ $adresseOK = NULL;}

    if(isset($_POST['nomPrenomOK']) && !empty($_POST['nomPrenomOK']))               {

      $nomPrenomOK              = $_POST['nomPrenomOK'];
      if($nomPrenomOK != 1){ $nomPrenomOK == 0; }
    }else{ $nomPrenomOK = NULL;}

    if(isset($_POST['planningOK']) && !empty($_POST['planningOK']))                 {

      $planningOK              = $_POST['planningOK'];
      if($planningOK != 1){ $planningOK == 0; }
    }else{ $planningOK = NULL;}

    if(isset($_POST['AlertesEvenementsOK']) && !empty($_POST['AlertesEvenementsOK'])){

      $AlertesEvenementsOK              = $_POST['AlertesEvenementsOK'];
      if($AlertesEvenementsOK != 1){ $AlertesEvenementsOK == 0; }
    }else{ $AlertesEvenementsOK = NULL;}

    if(isset($_POST['AlertesAbonnementsOK']) && !empty($_POST['AlertesAbonnementsOK'])){

      $AlertesAbonnementsOK              = $_POST['AlertesAbonnementsOK'];
      if($AlertesAbonnementsOK != 1){ $AlertesAbonnementsOK == 0; }
    }else{ $AlertesAbonnementsOK = NULL;}


		$dateInscription = date("Y-m-d");
		$admin = 0;

		if($cond == true){
			mysqli_query($connect, "insert into utilisateur_table (Pseudo_Utilisateur, MDP_Utilisateur, Nom_Utilisateur, Prenom_Utilisateur, Avatar_Utilisateur, Description_Utilisateur,
                                                             Adresse_Utilisateur, Mail_Utilisateur, Genre_Utilisateur, Date_Naissance, Categorie_Favorite, Date_Inscription, Admin_Utilisateur,
                                                             OKadresse_Utilisateur, OKmail_Utilisateur, OKNomPrenom_Utilisateur, OKplanning_Utilisateur, OKAlertesEvenements_Utilisateur, OKAlertesAbonnements_Utilisateur)
                              values ('$pseudo', '$mdp', '$nom','$prenom', '$avatar', '$description', '$adresse','$mail','$genre','$dateNaissance','$categorieFavorite', '$dateInscription', '$admin',
                                      '$adresseOK', '$mailOK', '$nomPrenomOK', '$planningOK', '$AlertesEvenementsOK', '$AlertesAbonnementsOK')")
                              or die('Error: ' . mysqli_error($connect));
		}else{
			print "Les informations entrées sont incorrect ! ";
		}
	}

	mysqli_close($connect);
}

?>
