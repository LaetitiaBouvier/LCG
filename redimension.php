<!-- FICHIER QUI FONCTIONNE SI L'IMAGE SE TROUVE DANS LE DOSSIER Images_code/IMG_Event_Original/... !-->
<?php

$nomphoto = "Cute Geek Box.jpg";  // A METTRE EN RELATION AVEC LA BDD

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

?>
