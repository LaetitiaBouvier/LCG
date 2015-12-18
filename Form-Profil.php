<form name="inscription" method="post" action="Create-Profil.php" enctype="multiplart/form-data">

<p>    VEUILLEZ COMPLETER LES CHAMPS CI-APRES : <br/> </p>
<br/>

<fieldset>
<legend>Informations personnelles</legend>

Nom <em>*</em>: <input type="text" name="nom" required="" value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>" /><br/>
<br/>

Prénom <em>*</em>: <input type="text" name="prenom" required="" value="<?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} ?>"/><br/>
<br/>

Sexe :
<input type="radio" name="genre" value="H" <?php if (isset($_POST['genre'])){if($_POST['genre']=='H') echo 'checked="checked"';}?>/> Homme
<input type="radio" name="genre" value="F" <?php if (isset($_POST['genre'])){if($_POST['genre']=='F') echo 'checked="checked"';}?>/> Femme
<br/><br/>

Date de naissance <em>*</em> : <input type="date" name="dateNaissance" required="" value="<?php if (isset($_POST['dateNaissance'])){echo $_POST['dateNaissance'];} ?>"/><br/>
<br/>

</fieldset>

<fieldset>
<legend>Informations de connexion</legend>

Pseudo <em>*</em>: <input type="text" name="pseudo" required="" value="<?php if (isset($_POST['pseudo'])){echo $_POST['pseudo'];} ?>"/> <br/>
<br/>

Avatar/Photo de profil :  <input type="file" name="avatar" id="avatar" value=""/><br />
<br />

Présentez-vous en quelques lignes : <br />
<div id="pres">
<textarea id="desc" name="description" > <?php if (isset($_POST['description'])){echo $_POST['description'];}?> </textarea>
</div>
<br />
<br />

Mot de passe<em>*</em> (6 caractères au moins): <input type="password" name="mdp" required="" value="<?php if (isset($_POST['mdp'])){echo $_POST['mdp'];} ?>"/><br/>
<br/>

Confirmez votre mot de passe<em>*</em> : <input type="password" name="confirm_mdp" required="" value="<?php if (isset($_POST['confirm_mdp'])){echo $_POST['confirm_mdp'];} ?>"/><br/>
<br/>

</fieldset>

<fieldset>
<legend>Contact</legend>

Code postal<em>*</em> : <input type="text" name="adresse" maxlength="5" required="" value="<?php if (isset($_POST['adresse'])){echo $_POST['adresse'];} ?>"/><br/>
<br/>

Adresse e-mail<em>*</em> : <input type="email" name="mail" required="" value="<?php if (isset($_POST['mail'])){echo $_POST['mail'];} ?>"/><br/>
<br/>

Confirmez votre adresse e-mail<em>*</em> : <input type="email" name="confirm_mail" required="" value="<?php if (isset($_POST['confirm_mail'])){echo $_POST['confirm_mail'];} ?>"/><br/>
<br/>

</fieldset>

<fieldset>
<legend>Préférences</legend>

Catégories qui vont m'interesser le plus (plusieurs réponses possibles): <br>
<br/>
<input type="checkbox" name="categorieFavorite1" value="Festivals" <?php if (isset($_POST['categorieFavorite1'])){if($_POST['categorieFavorite1']=='Festivals') echo 'checked="checked"';}?> />Festivals<br>
<input type="checkbox" name="categorieFavorite2" value="Repas/Banquets" <?php if (isset($_POST['categorieFavorite2'])){if($_POST['categorieFavorite2']=='Repas/Banquets') echo 'checked="checked"';}?>/>Repas/Banquets<br>
<input type="checkbox" name="categorieFavorite3" value="Concerts" <?php if (isset($_POST['categorieFavorite3'])){if($_POST['categorieFavorite3']=='Concerts') echo 'checked="checked"';}?>/>Concerts<br>
<input type="checkbox" name="categorieFavorite4" value="Brocantes/Marchés" <?php if (isset($_POST['categorieFavorite4'])){if($_POST['categorieFavorite4']=='Brocantes/Marchés') echo 'checked="checked"';}?>/>Brocantes/Marchés<br>
<input type="checkbox" name="categorieFavorite5" value="Soirées" <?php if (isset($_POST['categorieFavorite5'])){if($_POST['categorieFavorite5']=='Soirées') echo 'checked="checked"';}?>/>Soirées<br>
<input type="checkbox" name="categorieFavorite6" value="Conférences" <?php if (isset($_POST['categorieFavorite6'])){if($_POST['categorieFavorite6']=='Conférences') echo 'checked="checked"';}?> />Conférences<br>
<input type="checkbox" name="categorieFavorite7" value="Humanitaires" <?php if (isset($_POST['categorieFavorite7'])){if($_POST['categorieFavorite7']=='Humanitaires') echo 'checked="checked"';}?>/>Humanitaires<br>
<input type="checkbox" name="categorieFavorite8" value="Sportifs" <?php if (isset($_POST['categorieFavorite8'])){if($_POST['categorieFavorite8']=='Sportifs') echo 'checked="checked"';}?>/>Sportifs<br>
<input type="checkbox" name="categorieFavorite9" value="Manifestations" <?php if (isset($_POST['categorieFavorite9'])){if($_POST['categorieFavorite9']=='Manifestations') echo 'checked="checked"';}?>/>Manifestations<br>
<br/>

Souhaitez vous que les autres utilisateurs aient accès à : <br/></br>
Votre 	adresse e-mail ?
<br/><input type="radio" name="mailOK" value="oui" <?php if (isset($_POST['mailOK'])){if($_POST['mailOK']=='oui') echo 'checked="checked"';}?>/>                 oui
<br/><input type="radio" name="mailOK" value="non" <?php if (isset($_POST['mailOK'])){if($_POST['mailOK']=='non') echo 'checked="checked"';}?>/>                 non
<br/>
Votre code-postal?
<br/><input type="radio" name="adresseOK" value="oui" <?php if (isset($_POST['adresseOK'])){if($_POST['adresseOK']=='oui') echo 'checked="checked"';}?>/>        oui
<br/><input type="radio" name="adresseOK" value="non" <?php if (isset($_POST['adresseOK'])){if($_POST['adresseOK']=='non') echo 'checked="checked"';}?>/>        non
<br/>
Votre nom et prénom?
<br/><input type="radio" name="nomPrenomOK" value="oui" <?php if (isset($_POST['nomPrenomOK'])){if($_POST['nomPrenomOK']=='oui') echo 'checked="checked"';}?>/>  oui
<br/><input type="radio" name="nomPrenomOK" value="non" <?php if (isset($_POST['nomPrenomOK'])){if($_POST['nomPrenomOK']=='non') echo 'checked="checked"';}?>/>  non
<br/>
Votre planning?
<br/><input type="radio" name="planningOK" value="oui" <?php if (isset($_POST['planningOK'])){if($_POST['planningOK']=='oui') echo 'checked="checked"';}?>/>     oui
<br/><input type="radio" name="planningOK" value="non" <?php if (isset($_POST['planningOK'])){if($_POST['planningOK']=='non') echo 'checked="checked"';}?>/>     non
<br/>
<br/>

Je souhaite recevoir par e-mail des alertes sur les événements auxquels je m'inscris :
<br/><input type="radio" name="AlertesEvenementsOK" value="oui" <?php if (isset($_POST['AlertesEvenementsOK'])){if($_POST['AlertesEvenementsOK']=='oui') echo 'checked="checked"';}?>/> oui
<br/><input type="radio" name="AlertesEvenementsOK" value="non" <?php if (isset($_POST['AlertesEvenementsOK'])){if($_POST['AlertesEvenementsOK']=='non') echo 'checked="checked"';}?>/> non
<br/>
Je souhaite recevoir par e-mail des alertes sur mes abonnements :
<br/><input type="radio" name="AlertesAbonnementsOK" value="oui" <?php if (isset($_POST['AlertesAbonnementsOK'])){if($_POST['AlertesAbonnementsOK']=='oui') echo 'checked="checked"';}?>/> oui
<br/><input type="radio" name="AlertesAbonnementsOK" value="non" <?php if (isset($_POST['AlertesAbonnementsOK'])){if($_POST['AlertesAbonnementsOK']=='non') echo 'checked="checked"';}?>/> non
<br/>

</fieldset>

<p2><em>*</em>signifie que ces champs doivent absolument être remplis.</p2>

<br/><div id="valid"><input type="submit" name="valider" value="VALIDER MON PROFIL"/></div><br/>

</form>
