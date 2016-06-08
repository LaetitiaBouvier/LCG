<?php

session_start();

if(isset($_GET["IDU"]))
{
  $IDU = $_GET["IDU"];}
else {
  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
  $req = $bdd->prepare('SELECT ID_Utilisateur, Pseudo_Utilisateur FROM utilisateur_table ORDER BY ID_Utilisateur DESC LIMIT 1');
  $req->execute();

  $recup = $req->fetch();
  $IDU = $recup['ID_Utilisateur'];
  $Pseudo = $recup['ID_Utilisateur'];
  }
  ?>


<?php
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
      //$IDU = basename($_FILES['photo']['name']);
      $nomphoto = $IDU.".".$extension_upload;

      //$photo="Images_code/IMG_Profil_Original/".$IDU;

      // On peut valider le fichier et le stocker définitivement
      move_uploaded_file($_FILES['photo']['tmp_name'], "Images_code/IMG_Profil_Original/".$nomphoto."");

      // ENREGISTREMENT DANS LA BASE DE DONNEES
      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE utilisateur_table SET Avatar_Utilisateur="'.$nomphoto.'" WHERE ID_Utilisateur ="'.$IDU.'"');
      $req->execute();

      // REDIMENSION

      // On récupère la partie de la chaine à partir du dernier . pour connaître l'extension.
      $extension = strrchr($nomphoto, '.');

      switch ($extension)
              {
                  case ".jpeg":
                  case ".jpg":
                      $source = imagecreatefromjpeg("Images_code/IMG_Profil_Original/".$nomphoto.""); // La photo est la source
                      break;
                  case ".gif":
                      $source = imagecreatefromgif("Images_code/IMG_Profil_Original/".$nomphoto.""); // La photo est la source
                      break;
                  case ".png":
                      $source = imagecreatefrompng("Images_code/IMG_Profil_Original/".$nomphoto.""); // La photo est la source
                      break;
       }
      $destination_mini = imagecreatetruecolor(100, 100); // On crée la miniature vide

      $destination_large = imagecreatetruecolor(350, 250); // On crée l'agrandissement vide

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

      imagejpeg($destination_mini, "Images_code/IMG_Profil_Mini/".$nomphoto.".jpg");
      imagejpeg($destination_large, "Images_code/IMG_Profil_Moyen/".$nomphoto.".jpg");

      if ($_POST['button']=="Ajouter ma photo de profil"){
        header("location:Page_Confirm_Inscription-2.php");
      }
      if ($_POST['maj_photo']=="Envoyer le fichier"){
        header("location:Page_show-profil.php?IDU=".$IDU."");
      }

    }
    else {echo ("le fichier doit être de format .jpg, .jpeg, .png ou .gif");}
  }
  else {echo ("le fichier est trop volumineux");}

//echo ("nomphoto".$IDU);    //affiche nomdelaphoto.extension
//echo ("photo".$photo);      //affiche urldelaphoto

}

else { ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  	<head>
  		<title> ENVOI AVATAR </title>
  		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  		<link rel="stylesheet" href="Style-form.css"/>
  	</head>
    <body>
      <?php print "<div class='alert-box error'><span>erreur: </span>Vous n'avez pas sélectionné de fichier, veuillez réessayer !</div> "; } ?>
    </body>
