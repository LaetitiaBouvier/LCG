
<?php



  require 'FonctionsUtilisateurs.php';
  update_users();

?>

<?php

if(isset($_SESSION["ID_Utilisateur"])){
  $IDU = $_SESSION["ID_Utilisateur"];

/*
  $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', '');
	$req = $bdd->prepare('SELECT * FROM utilisateur_table WHERE id_utilisateur = ?');
	$req->execute(array($IDU));

	$data = $req->fetch();

  var_dump($data);

	foreach($data as $cle => $valeur)
	{
		 //echo $cle ,' : ', $valeur;
		 if($cle == '[nom_utilisateur]'){ $nom = $valeur; echo $nom;}
		 if($cle == '[prenom_utilisateur]'){ $prenom = $valeur; echo $prenom;}
     if($cle == '[Adresse_Utilisateur]'){ $adresse = $valeur; echo $adresse;}
     if($cle == '[genre]'){ if($valeur == 'H'){ $genre = 'checked="checked"'; } }


	}
  */
}
else{
  $IDU = -1;
}

 ?>


 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

 	<head>
 		<title> Modification </title>
 		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 		<link rel="stylesheet" href="Style-form.css"/>
 	</head>

 	<body>
 		<h2> Modification de mot de passe </h2>


      <form name="mdp" method="post" action="Page_Modif-MDP.php" enctype="multiplart/form-data">

      <br/>

      <fieldset>
      <legend>MOT DE PASSE</legend>

      Veuillez entrer votre mot de passe actuel : <input type="password" name="mot" required="" value=""/>

      Veuillez entre votre nouveau mot de passe : <input type="password" name="mdp" required="" value=""/>
      Veuillez confirmer votre nouveau mot de passe : <input type="password" name="mdp" required="" value=""/>
      </fieldset>

      <br/><div><input type="submit" name="modifier_mdp" value="MODIFIER MON MDP"/></div><br/>
    </body>

  </html>
