<?php



// Conexion à la base
$connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise"); // mdp = "root", "pass" ou encore "" (A MODIFIER SELON VOTRE ORDI)

// Vérifier la connexion
if (!$connect)
  { printf("Echec de la connexion : %s\n", mysqli_connect_error());
    exit(); }



  if (isset($_POST['valider']) && $_POST['valider'] == "VALIDER MON EVENEMENT")
  {

    if(isset($_POST['nom']))
    {
      $nom=$_POST['nom'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE evenement_table SET Nom_Evenement="'.$nom.'" WHERE ID_Evenement ="'.$ID.'"');
      $req->execute();
    }

    if(isset($_POST['description']))
    {
      $description=$_POST['description'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE evenement_table SET Description_Evenement="'.$description.'" WHERE ID_Evenement ="'.$ID.'"');
      $req->execute();
    }


    if(isset($_POST['categorie']) && !empty($_POST['categorie']))
    {
      $categorie=$_POST['categorie'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE evenement_table SET Categorie_Evenement="'.$categorie.'" WHERE ID_Evenement ="'.$ID.'"');
      $req->execute();
    }


    // CIBLE DE L'EVENEMENT
    $cible = "";
    if(isset($_POST['age1']) && !empty($_POST['age1']))	{ $cible 	.= $_POST['age1']; $cible .= " ";}else{ $cible .= "";}
    if(isset($_POST['age2']) && !empty($_POST['age2']))	{ $cible 	.= $_POST['age2']; $cible .= " ";}else{ $cible .= "";}
    if(isset($_POST['age3']) && !empty($_POST['age3']))	{ $cible 	.= $_POST['age3']; $cible .= " ";}else{ $cible .= "";}
    if(isset($_POST['age4']) && !empty($_POST['age4']))	{ $cible 	.= $_POST['age4']; $cible .= " ";}else{ $cible .= "";}
    if(isset($_POST['age5']) && !empty($_POST['age5']))	{ $cible 	.= $_POST['age5']; $cible .= " ";}else{ $cible .= "";}

    $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
    $req = $bdd->prepare('UPDATE evenement_table SET Cibles_Evenement="'.$cible.'" WHERE ID_Evenement ="'.$ID.'"');
    $req->execute();


    //ENDROIT
    if(isset($_POST['endroit']) && !empty($_POST['endroit']))
    {
      $endroit=$_POST['endroit'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE evenement_table SET NomLieu_Evenement="'.$endroit.'" WHERE ID_Evenement ="'.$ID.'"');
      $req->execute();
    }


    // RUE
    if(isset($_POST['rue']) && !empty($_POST['rue']))
    {
      $rue=$_POST['rue'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE evenement_table SET AdresseRue_Evenement="'.$rue.'" WHERE ID_Evenement ="'.$ID.'"');
      $req->execute();
    }


    // CODE POSTAL
    if(isset($_POST['CP']) && !empty($_POST['CP']))
    {
      $CP=$_POST['CP'];

      if((strlen($CP) == 5) && is_numeric($CP))
      {
        $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
        $req = $bdd->prepare('UPDATE evenement_table SET AdressePostal_Evenement="'.$CP.'" WHERE ID_Evenement ="'.$ID.'"');
        $req->execute();
      }
    }


    // VILLE
    if(isset($_POST['ville']) && !empty($_POST['ville']))
    {
      $ville=$_POST['ville'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE evenement_table SET AdresseVille_Evenement="'.$ville.'" WHERE ID_Evenement ="'.$ID.'"');
      $req->execute();
    }


    // DEPARTEMENT
    $departement=NULL;


    // REGION
    $region=NULL;


    // DATE DEBUT EVENT
    if(isset($_POST['datedeb']) && !empty($_POST['datedeb']))
    {
      $datedeb=$_POST['datedeb'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE evenement_table SET JourDebut_Evenement="'.$datedeb.'" WHERE ID_Evenement ="'.$ID.'"');
      $req->execute();
    }


    // HEURE DEBUT EVENT
    if(isset($_POST['heuredeb']) && !empty($_POST['heuredeb']))
    {
      $heuredeb=$_POST['heuredeb'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE evenement_table SET HeureDebut_Evenement="'.$heuredeb.'" WHERE ID_Evenement ="'.$ID.'"');
      $req->execute();
    }


    // DATE FIN EVENT
    if(isset($_POST['datefin']) && !empty($_POST['datefin']))
    {
      $datefin=$_POST['datefin'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE evenement_table SET JourFin_Evenement="'.$datefin.'" WHERE ID_Evenement ="'.$ID.'"');
      $req->execute();
    }


    // HEURE FIN EVENT
    if(isset($_POST['heurefin']) && !empty($_POST['heurefin']))
    {
      $heurefin=$_POST['heurefin'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE evenement_table SET HeureFin_Evenement="'.$heurefin.'" WHERE ID_Evenement ="'.$ID.'"');
      $req->execute();
    }


    // NOMBRE PARTICIPANTS
    if(isset($_POST['participants']) && !empty($_POST['participants']))
    {
      $participants=$_POST['participants'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE evenement_table SET NbMaxParticipants_Evenement="'.$participants.'" WHERE ID_Evenement ="'.$ID.'"');
      $req->execute();
    }


    //EVENEMENT PAYANT
    if(isset($_POST['payant'])  && !empty($_POST['payant']))
    {
      $payant = $_POST['payant'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE evenement_table SET NbMaxParticipants_Evenement="'.$participants.'" WHERE ID_Evenement ="'.$ID.'"');
      $req->execute();
    }


    // LIEN
    if(isset($_POST['website']) && !empty($_POST['website']))
    {
      $website=$_POST['website'];

      $bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
      $req = $bdd->prepare('UPDATE evenement_table SET LienSiteWeb_Evenement="'.$website.'" WHERE ID_Evenement ="'.$ID.'"');
      $req->execute();
    }
  }
  header("location:Page_Confirm_Modification_InfosEvent.php");



  ?>
