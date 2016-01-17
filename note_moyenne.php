<?php
/*if (isset($_GET['Noter']))
  {
    $Noter=$_GET['Noter'];
    $ID = strrchr($Noter, '.');
    $ID = substr($ID,1);
    echo $ID;
  }*/

$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/

$moyenne = $bdd->prepare('SELECT AVG(Note) AS moyenne FROM noter_table WHERE ID_Evenement = ?');
$moyenne->execute(array($ID));

/*while ($a = $moyenne->fetch()) {
  if (isset($a['moyenne'])) {
    echo $a['moyenne'];
  }

}*/

$data = $moyenne->fetch();

$NoteMoyenne=$data['moyenne'];
//$NoteMoyenne=number_format($NoteMoyenne,3);

$req = $bdd->prepare('UPDATE evenement_table SET Note_Evenement = :note_moyenne  WHERE ID_Evenement = :id');
$req->execute(array('note_moyenne'=>$NoteMoyenne, 'id'=>$ID));
$data = $req->fetch();

$req2 = $bdd->prepare('SELECT Note_Evenement FROM evenement_table WHERE ID_Evenement = ?');
$req2->execute(array($ID));
$note = $req2->fetch();
echo $note['Note_Evenement']."/5";
?>
