<meta charset="utf-8">
<link rel="stylesheet" href="event.css">

<div id="texte">

  <fieldset>
    <legend> Informations Générales </legend>
      <div id="nom">
        <p> Nom de l'évènement : </p><?php echo $_GET['nom_event'];?> </br>
      </div>
      <div id="image_event">
        <img src=""/>
      </div>
      <div id="cat">
        <p> Catégorie d'évènement : </p><?php echo $_GET['categorie_event'];?> </br>
    </div>
    <div id="nb">
      <p> Nombre de participants : </p><?php echo $_GET['nb_event'];?> </br>
    </div>
    <div id="lieu">
      <p> Lieu de l'évènement : </p><?php echo $_GET['lieu_event'];?> </br>
    </div>
  </fieldset>

  <fieldset>
    <legend> Plus de précisions </legend>
      <div id="adresse">
        <p> Département : </p><?php echo $_GET['departement_event'];?>
        <p> Ville : </p><?php echo $_GET['ville_event'];?>
        <p> Adresse : </p><?php echo $_GET['adresse_event'];?>
      </div>
      <div id="prix">
        <p> Prix de l'évènement : </p><?php echo $_GET['prix_event'];?>
      </div>
      <div id="orga">
        <p1> Evènement organisé par :</p1><?php echo $_GET['organisateur_event'];?>
        <p2><a href="#"> Accéder à son profil </a></p2></br></br>
        <p3><a href="#"> Aller vers le site Web de l'évènement</a></p3>
      </div>
    </div>
  </fieldset>


<fieldset>
  <legend> Informations horaires </legend>
    <div id="date">
      <p> Date de début :<?php echo $_GET['datedebut'];?> et Date de fin :</p><?php echo $_GET['datefin'];?>
      <p> Heure de Début :<?php echo $_GET['hdeb_event'];?> et Heure de fin :</p><?php echo $_GET['hfin_event'];?>
    </div>
</fieldset>


<div id="suite">
  <div id="liste"><a href="#"> Accéder à la liste des participants </a></div>
  <div id="inscrire"><a href="#"> S'inscrire/Se désinscrire de l'évènement </a></div>
  <div id="signaler"><a href="#"> Signaler l'évènement </a></div>
</div>
