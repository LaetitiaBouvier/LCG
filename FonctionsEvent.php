<?php



// Conexion à la base
$connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise"); // mdp = "root", "pass" ou encore "" (A MODIFIER SELON VOTRE ORDI)

// Vérifier la connexion
if (!$connect)
  { printf("Echec de la connexion : %s\n", mysqli_connect_error());
    exit(); }

//insérer un nouveau profil dans la table "utilisateur_table" de la base de données "Connexion_Gauloise"
function insert_events()
  { $connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise"); // mdp = "root", "pass" ou encore "" (A MODIFIER SELON VOTRE ORDI)


  if (isset($_POST['valider']) && $_POST['valider'] == "VALIDER MON EVENEMENT")
    { $cond=true; // Vérifie que le formulaire soit bien validé (absence du "else" plus tard)


  //NOM EVENEMENT
  	if(isset($_POST['nom'])						&& !empty($_POST['nom']))
      {	$nom=$_POST['nom'];}
    else
      { print "Le nom de l'evenement n'est pas configuré ! ";}


  // DESCRIPTION DE L'EVENEMENT
    if(isset($_POST['description'])				 && !empty($_POST['description']))
      {	$description=$_POST['description'];}
    else
      { $description = " ";}


  // AJOUTER UNE PHOTO
  // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
  if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
  {
    // Testons si le fichier n'est pas trop gros
    if ($_FILES['photo']['size'] <= 1000000)
    {
      // Testons si l'extension est autorisée
      $infosfichier = pathinfo($_FILES['photo']['name']);
      $extension_upload = $infosfichier['extension'];
      $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
      if (in_array($extension_upload, $extensions_autorisees))
      {
        $nomphoto = ''.basename($_FILES['photo']['name']);
        // On peut valider le fichier et le stocker définitivement
        move_uploaded_file($_FILES['photo']['tmp_name'], "".$nomphoto."");

        $photo="Images_code/IMG_Event_Original/".$nomphoto."";
        $source = imagecreatefromjpeg("Images_code/IMG_Event_Original/".$nomphoto.""); // La photo est la source

        $destination_mini = imagecreatetruecolor(270, 100); // On crée la miniature vide

        $destination_large = imagecreatetruecolor(1000, 545); // On crée l'agrandissement vide

        // Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image

        $largeur_source = imagesx($source);
        $hauteur_source = imagesy($source);

        $largeur_destination_mini = imagesx($destination_mini);
        $hauteur_destination_mini = imagesy($destination_mini);

        $largeur_destination_large = imagesx($destination_large);
        $hauteur_destination_large = imagesy($destination_large);

        // On crée la miniature et l'agrandissement

        imagecopyresampled($destination_mini, $source, 0, 0, 0, 0, $largeur_destination_mini, $hauteur_destination_mini, $largeur_source, $hauteur_source);

        imagecopyresampled($destination_large, $source, 0, 0, 0, 0, $largeur_destination_large, $hauteur_destination_large, $largeur_source, $hauteur_source);

        // On enregistre la miniature et l'agrandissement

        imagejpeg($destination_mini, "Images_code/IMG_Event_Mini/".$nomphoto.".jpg");
        imagejpeg($destination_large, "Images_code/IMG_Event_Large/".$nomphoto.".jpg");


      }
    }
  }
    else
      { print "La photo de l'evenement n'est pas configurée ! ";}


  // AJOUTER UNE VIDEO
    if(isset($_POST['video'])						 && !empty($_POST['video']))
      {	$video=$_POST['video'];}
    else
      { $video = NULL;}


  // CHOISIR UNE CATEGORIE
    if(isset($_POST['categorie'])							 && !empty($_POST['categorie']))
      {	$categorie=$_POST['categorie'];}
    else
        { print "La catégorie de l'evenement n'est pas configurée ! ";}

  // CIBLE DE L'EVENEMENT
    $cible = "";
    if(isset($_POST['age1']) && !empty($_POST['age1']))	{ $cible 	.= $_POST['age1']; $cible .= " ";}else{ $cible .= "";}
    if(isset($_POST['age2']) && !empty($_POST['age2']))	{ $cible 	.= $_POST['age2']; $cible .= " ";}else{ $cible .= "";}
    if(isset($_POST['age3']) && !empty($_POST['age3']))	{ $cible 	.= $_POST['age3']; $cible .= " ";}else{ $cible .= "";}
    if(isset($_POST['age4']) && !empty($_POST['age4']))	{ $cible 	.= $_POST['age4']; $cible .= " ";}else{ $cible .= "";}
    if(isset($_POST['age5']) && !empty($_POST['age5']))	{ $cible 	.= $_POST['age5']; $cible .= " ";}else{ $cible .= "";}


  //ENDROIT
    if(isset($_POST['endroit'])						&& !empty($_POST['endroit']))
      {	$endroit=$_POST['endroit'];}
    else
      { print "L'endroit de l'evenement n'est pas configuré ! ";}


  // RUE
    if(isset($_POST['rue'])						&& !empty($_POST['rue']))
      {	$rue=$_POST['rue'];}


  // CODE POSTAL
    if(isset($_POST['CP'])						&& !empty($_POST['CP']))
      { $CP=$_POST['CP'];}
      if(strlen($CP) != 5 AND !is_numeric($CP))
        { print "Le code postal de l'évenement n'est pas configuré ! N'est pas un entier";}


  // VILLE
    if(isset($_POST['ville'])						&& !empty($_POST['ville']))
      {	$ville=$_POST['ville'];}
    else{$ville = NULL;}

  // DEPARTEMENT
  $departement=NULL;


  // REGION
  $region=NULL;


  // DATE DEBUT EVENT
    if(isset($_POST['datedeb'])			&& !empty($_POST['datedeb']))
      { $datedeb=$_POST['datedeb'];}
    else
      { print "La date de début de l'évenement n'est pas configurée ! ";}

  // HEURE DEBUT EVENT
  if(isset($_POST['heuredeb'])			&& !empty($_POST['heuredeb']))
    { $heuredeb=$_POST['heuredeb'];}
  else{$heuredeb = NULL;}

  // DATE FIN EVENT
  if(isset($_POST['datefin'])			&& !empty($_POST['datefin']))
    { $datefin=$_POST['datefin'];}
  else
    { print "La date de fin de l'évenement n'est pas configurée ! ";}

  // HEURE FIN EVENT
  if(isset($_POST['heurefin'])			&& !empty($_POST['heurefin']))
    { $heurefin=$_POST['heurefin'];}
  else{ $heurefin = NULL;}

  // NOMBRE PARTICIPANTS
  if(isset($_POST['participants'])			&& !empty($_POST['participants']))
    { $participants=$_POST['participants'];}
  else{ $participants = NULL;}

  //EVENEMENT PAYANT
  if(isset($_POST['payant'])			&& !empty($_POST['payant'])) {
      $payant = $_POST['payant'];
    }
  else{ $payant = NULL;}

  // LIEN
  if(isset($_POST['website'])			&& !empty($_POST['website']))
    { $website=$_POST['website'];}
  else{ $website = NULL; }

    $organisateur = "test";
    // ENREGISTREMENT DANS LA BASE DE DONNEES

         mysqli_query($connect, "insert into evenement_table (Nom_Evenement, Organisateur_Evenement, Image_Evenement, Video_Evenement, JourDebut_Evenement,
                                  JourFin_Evenement, HeureDebut_Evenement, HeureFin_Evenement, Description_Evenement, NbMaxParticipants_Evenement,
                                  Categorie_Evenement, Cibles_Evenement, NomLieu_Evenement, AdresseRue_Evenement, AdressePostal_Evenement,
                                  AdresseVille_Evenement, AdresseDepartement_Evenement, AdresseRegion_Evenement, Payant_Evenement,
                                  LienSiteWeb_Evenement)
                                values ('$nom', '$organisateur', '$photo','$video', '$datedeb', '$datefin', '$heuredeb','$heurefin','$description','$participants',
                                '$categorie', '$cible', '$endroit', '$rue', '$CP', '$ville', '$departement', '$region', '$payant','$website')")
                                or die('Error: ' . mysqli_error($connect));
          header("location:Confirm-Create-Event.html");

  	mysqli_close($connect);
  }
  }


  ?>
