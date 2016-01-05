<!-- CE FICHIER FONCTIONNE INDEPENDEMMENT DES AUTRES! PAS MOYEN DE LE METTRE DANS LE FORMULAIRE DEJA EXISTANT !-->

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
      $nomphoto = basename($_FILES['photo']['name']);

      $photo="Images_code/IMG_Event_Original/".$nomphoto;

      // On peut valider le fichier et le stocker définitivement
      move_uploaded_file($_FILES['photo']['tmp_name'], "".$photo."");


    }
    else {echo ("le fichier doit être de format .jpg, .jpeg, .png ou .gif");}
  }
  else {echo ("le fichier est trop volumineux");}
}
//echo ("nomphoto".$nomphoto);    //affiche nomdelaphoto.extension
//echo ("photo".$photo);      //affiche urldelaphoto
?>
