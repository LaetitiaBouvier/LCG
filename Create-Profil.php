<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title> INSCRIPTION</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="Style-form.css"/>

	</head>
	<body>

		<h2> Formulaire de création/modification de profil </h2>


		<form name="inscription" method="post" action="inscription.php" enctype="multiplart/form-data">

    <p>    VEUILLEZ COMPLETER LES CHAMPS CI-APRES : <br/> </p>
		<br/>

		<fieldset>
	  <legend>Informations personnelles</legend>

		Nom <em>*</em>: <input type="text" name="nom-utilisateur" required=""/><br/>
		<br/>

		Prénom <em>*</em>: <input type="text" name="prenom-utilisateur" required=""/><br/>
		<br/>

		Sexe :
		<input type="radio" value="Homme" /> Homme
		<input type="radio" value="Femme" /> Femme
		<br/><br/>

		Date de naissance <em>*</em> : <input type="date" name="birth-utilisateur" required=""/><br/>
		<br/>

	  </fieldset>

		<fieldset>
		<legend>Informations de connexion</legend>

		Pseudo <em>*</em>: <input type="text" name="pseudo-utilisateur" required=""/> <br/>
	  <br/>

		Avatar/Photo de profil :  <input type="file" name="avatar" id="avatar" /><br />
		<br />

		Présentez-vous en quelques lignes : <br />
		<div>
		<textarea id="desc-utilisateur"></textarea>
	  </div>
	  <br />
		<br />

		Mot de passe<em>*</em>: <input type="password" name="mdp-utilisateur" required=""/><br/>
		<br/>

		Confirmez votre mot de passe<em>*</em> : <input type="password" name="confirm-mdp-utilisateur" required=""/><br/>
		<br/>

		</fieldset>

		<fieldset>
		<legend>Contact</legend>

		Code postal<em>*</em> : <input type="text" name="cp-utilisateur" maxlength="5" required=""/><br/>
  	<br/>

		Adresse e-mail<em>*</em> : <input type="email" name="email-utilisateur" required=""/><br/>
		<br/>

		Confirmez votre adresse e-mail<em>*</em> : <input type="email" name="confirm-email-utilisateur" required=""/><br/>
		<br/>

	  </fieldset>

	  <fieldset>
		<legend>Préférences</legend>

		Catégories qui vont m'interesser le plus (plusieurs réponses possibles): <br>
		<br/>
		<input type="checkbox" name="rubrique" value="Festivals" />Festivals<br>
		<input type="checkbox" name="rubrique" value="Repas/Banquets" />Repas/Banquets<br>
		<input type="checkbox" name="rubrique" value="Concerts" />Concerts<br>
		<input type="checkbox" name="rubrique" value="Brocantes/Marchés" />Brocantes/Marchés<br>
		<input type="checkbox" name="rubrique" value="Soirées" />Soirées<br>
		<input type="checkbox" name="rubrique" value="Conférences" />Conférences<br>
		<input type="checkbox" name="rubrique" value="Humanitaires" />Humanitaires<br>
		<input type="checkbox" name="rubrique" value="Sportifs" />Sportifs<br>
		<input type="checkbox" name="rubrique" value="Manifestations" />Manifestations<br>
		<br/>

		Souhaitez vous que les autres utilisateurs aient accès à : <br/></br>
		Votre 	adresse e-mail ?
		<select >
		<option selected="selected" value="oui">oui</option>
		<option value="non">non</option>
		</select><br/>
		Votre code-postal?
		<select >
		<option selected="selected" value="oui">oui</option>
		<option value="non">non</option>
		</select><br/>
		Votre nom et prénom?
		<select >
		<option selected="selected" value="oui">oui</option>
		<option value="non">non</option>
		</select><br/>
		Votre planning?
		<select >
		<option selected="selected" value="oui">oui</option>
		<option value="non">non</option>
		</select><br/>
		<br/>

		<br/><input type="checkbox" NAME="mailing" value="oui" checked>
		Je souhaite recevoir par e-mail des alertes sur les événements auxquels je m'inscris.

		<br/><input type="checkbox" NAME="mailing" value="oui" checked>
		Je souhaite recevoir par e-mail des alertes sur mes abonnements.<br />
		<br/>

	  </fieldset>

		<p2><em>*</em>signifie que ces champs doivent absolument être remplis.</p2>

		<br/><div><input type="submit" name="valider" value="VALIDER MON PROFIL"/></div><br/>

		</form>
	</body>
</html>
