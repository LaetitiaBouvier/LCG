
<?php
  require 'FonctionsUtilisateurs.php';
  update_mdp();
?>

<?php
if(isset($_SESSION["ID_Utilisateur"])){
  $IDU = $_SESSION["ID_Utilisateur"];
}
else{
  $IDU = -1;
}
 ?>


 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

 	<head>
 		<title> Modification de mot de passe </title>
 		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 		<link rel="stylesheet" href="Style-form.css"/>
 	</head>

 	<body>
 		<h2> Modification de mot de passe </h2>


      <form name="mdp" method="post" action="Page_Modif-MDP.php" enctype="multiplart/form-data">

      <br/>

      <fieldset>
      <legend>MOT DE PASSE</legend>

      Veuillez entrer votre mot de passe actuel : <input type="password" name="mdp_actu" required="" value=""/></br>

      Veuillez entre votre nouveau mot de passe : <input type="password" name="mdp" required="" value=""/></br>
      Veuillez confirmer votre nouveau mot de passe : <input type="password" name="confirm_mdp" required="" value=""/></br>
      </fieldset>

      <br/><div><input type="submit" name="modifier_mdp" value="MODIFIER MON MDP"/></div><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </body>

  </html>
