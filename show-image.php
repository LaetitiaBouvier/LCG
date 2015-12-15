<?php
$id_files=54;
echo "test";
if ($id_files) {

   $connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise");
   $sql = "SELECT avatar_utilisateur FROM utilisateur_table WHERE id_utilisateurs=$id_files";

   $result = mysqli_query($connect, $sql);

   $data = @mysql_result($result, 0, "avatar_utilisateur");
   //$type n'est pas nécessaire si tu n'as que des jpg ou autres mais peut être utile en cas de maj du site (integration de png, gif....)
   //$type = @mysql_result($result, 0, "png");

   header("Content-Type: /jpg");
   print $data;

   echo "test";
}
?>
