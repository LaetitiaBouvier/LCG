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
<div>
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
<input type="checkbox" name="categorieFavorite1" value="Festivals" />Festivals<br>
<input type="checkbox" name="categorieFavorite2" value="Repas/Banquets" />Repas/Banquets<br>
<input type="checkbox" name="categorieFavorite3" value="Concerts" />Concerts<br>
<input type="checkbox" name="categorieFavorite4" value="Brocantes/Marchés" />Brocantes/Marchés<br>
<input type="checkbox" name="categorieFavorite5" value="Soirées" />Soirées<br>
<input type="checkbox" name="categorieFavorite6" value="Conférences" />Conférences<br>
<input type="checkbox" name="categorieFavorite7" value="Humanitaires" />Humanitaires<br>
<input type="checkbox" name="categorieFavorite8" value="Sportifs" />Sportifs<br>
<input type="checkbox" name="categorieFavorite9" value="Manifestations" />Manifestations<br>
<br/>

Souhaitez vous que les autres utilisateurs aient accès à : <br/></br>
Votre 	adresse e-mail ?
<select >
<option selected="selected" name="mailOK" value=1>oui</option>
<option value=0>non</option>
</select><br/>
Votre code-postal?
<select >
<option selected="selected" name="adresseOK" value=1>oui</option>
<option value=0>non</option>
</select><br/>
Votre nom et prénom?
<select >
<option selected="selected" name="nomPrenomOK" value=1>oui</option>
<option value=0>non</option>
</select><br/>
Votre planning?
<select >
<option selected="selected" name="planningOK" value=1>oui</option>
<option value=0>non</option>
</select><br/>
<br/>

<br/><input type="checkbox" name="AlertesEvenementsOK" value=1 checked> Je souhaite recevoir par e-mail des alertes sur les événements auxquels je m'inscris.

<br/><input type="checkbox" name="AlertesAbonnementsOK" value=1 checked> Je souhaite recevoir par e-mail des alertes sur mes abonnements.<br />
<br/>

</fieldset>

<p2><em>*</em>signifie que ces champs doivent absolument être remplis.</p2>

<br/><div><input type="submit" name="valider" value="VALIDER MON PROFIL"/></div><br/>

</form>
