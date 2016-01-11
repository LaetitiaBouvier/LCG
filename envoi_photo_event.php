<?php

session_start();

if(isset($_GET["IDE"]))
{
  $IDE = $_GET["IDE"];}
  else {


  $ID=$_SESSION["ID_Utilisateur"];

  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
  $req = $bdd->prepare('SELECT Pseudo_Utilisateur FROM utilisateur_table WHERE ID_Utilisateur = ?');
  $req->execute(array($ID));

  $pseudo = $req->fetch();

  $reqbis = $bdd->prepare('SELECT ID_Evenement FROM evenement_table WHERE Organisateur_Evenement = ? ORDER BY ID_Evenement DESC LIMIT 1');
  $reqbis->execute(array($pseudo['Pseudo_Utilisateur']));

  $try = $reqbis->fetch();

  $IDE = $try['ID_Evenement'];
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
      //$IDE = basename($_FILES['photo']['name']);
      $nomphoto = $IDE.".".$extension_upload;

      //$photo="Images_code/IMG_Event_Original/".$IDE;

      // On peut valider le fichier et le stocker définitivement
      move_uploaded_file($_FILES['photo']['tmp_name'], "Images_code/IMG_Event_Original/".$nomphoto."");

      // ENREGISTREMENT DANS LA BASE DE DONNEES
      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE evenement_table SET Image_Evenement="'.$nomphoto.'" WHERE ID_Evenement ="'.$IDE.'"');
      $req->execute();

      // REDIMENSION

      // On récupère la partie de la chaine à partir du dernier . pour connaître l'extension.
      $extension = strrchr($nomphoto, '.');

      switch ($extension)
              {
                  case ".jpeg":
                  case ".jpg":
                      $source = imagecreatefromjpeg("Images_code/IMG_Event_Original/".$nomphoto.""); // La photo est la source
                      break;
                  case ".gif":
                      $source = imagecreatefromgif("Images_code/IMG_Event_Original/".$nomphoto.""); // La photo est la source
                      break;
                  case ".png":
                      $source = imagecreatefrompng("Images_code/IMG_Event_Original/".$nomphoto.""); // La photo est la source
                      break;
       }
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
    else {echo ("le fichier doit être de format .jpg, .jpeg, .png ou .gif");}
  }
  else {echo ("le fichier est trop volumineux");}
}
//echo ("nomphoto".$IDE);    //affiche nomdelaphoto.extension
//echo ("photo".$photo);      //affiche urldelaphoto

header("location:Page_show-event.php?IDE=$IDE");


?>
