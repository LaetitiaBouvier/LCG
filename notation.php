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


  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
  $req = $bdd->prepare('SELECT * FROM noter_table WHERE ID_Utilisateur = ? AND ID_Evenement = ? AND Note = ?');
  $req->execute(array($IDU, $ID, $note));

  $data = $req->fetch();


  if($data['ID_Utilisateur']== $IDU){
		echo "Vous avez noté cet évènement ".$note."/5";
		$req = $bdd->prepare('UPDATE note_table SET Note = :new_note  WHERE ID_Utilisateur = ? AND ID_Evenement = ?');
		$req->execute(array($IDU, $ID, 'new_note' => $note));
		echo "Vous avez re-noté cet évènement ".$note."/5";
	}
  else{
    $connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise");
    mysqli_query($connect, "insert into noter_table (Note, ID_Utilisateur, ID_Evenement) values ('$note', '$IDU', '$ID')");
		echo "Vous avez noté cet évènement ".$note."/5";
  }

	$moyenne = mysqli_query("SELECT AVG(Note) FROM note_table");

	$req = $bdd->prepare('UPDATE evenement_table SET Note_Evenement = :note_moyenne  WHERE ID_Evenement = ?');
	$req->execute(array($ID, 'note_moyenne' => $moyenne));
	echo "Note moyenne de l'évènement :";
	print round($moyenne, 2);

	header("location:Page_show-event.php?IDE=$ID");
?>
