<?php
session_start() ;

var_dump($_GET);
var_dump($_SESSION);

	if(isset($_SESSION["ID_Utilisateur"]))
    {$IDU = $_SESSION["ID_Utilisateur"];}

  if (isset($_GET['ID']))
    {$ID=$_GET['ID'];}

  if( isset($_POST['Notez']) && !empty($_POST['Notez']))
    {$note=$_POST['Notez'];}


  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
  $req = $bdd->prepare('SELECT ID_Utilisateur FROM noter_table WHERE ID_Utilisateur = ? AND ID_Evenement = ?');
  $req->execute(array($IDU, $ID));

  $data = $req->fetch();


  if($data['ID_Utilisateur'] != $IDU)
  {
    $connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise");
    mysqli_query($connect, "insert into noter_table (Note, ID_Utilisateur, ID_Evenement) values ('$note', '$IDU', '$ID')");
  }

?>
