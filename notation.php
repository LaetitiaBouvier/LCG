<?php
session_start() ;


	if(isset($_SESSION["ID_Utilisateur"]))
    {$IDU = $_SESSION["ID_Utilisateur"];}

  if (isset($_GET['Noter']))
    {$Noter=$_GET['Noter'];
		$ID = strrchr($Noter, '.');
		$ID = substr($ID,1);
	echo $ID;}

		if (isset($_GET['notesA']))
	    {$note=$_GET['notesA'];}

	$maj=false;

  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
  $req = $bdd->prepare('SELECT * FROM noter_table WHERE ID_Evenement = ?');
  $req->execute(array($ID));
	foreach($req as $row){

  if($row['ID_Utilisateur']==$IDU){
		$req2 = $bdd->prepare('UPDATE noter_table SET Note ="'.$note.'"  WHERE ID_Utilisateur = "'.$IDU.'" AND ID_Evenement = "'.$ID.'"');
		$req2->execute();
		$maj=true;
	}}

	if($maj==false){
    $connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise");
    mysqli_query($connect, "insert into noter_table (Note, ID_Utilisateur, ID_Evenement) values ('$note', '$IDU', '$ID')");
  }



header("location:Page_show-event.php?IDE=$ID");
?>
