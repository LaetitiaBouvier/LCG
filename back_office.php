<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title> Back-office </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="Style-form.css"/>
	</head>
</br>
	<fieldset>
		<legend> Vous êtes sur le Back-Office </legend>
		<form name='bannir' method='post' action='bannir.php' enctype='multipart/form-data'>
			</br> Nom de l'utilisateur à bannir  : <input type="text" name="pseudo" value="<?php if (isset($_POST['pseudo'])){echo $_POST['pseudo'];} ?>"/>
		<input type="submit" name="valider" value="BANNIR"/></div>
		</form>
		<form name='delete' method='post' action='delete_event.php' enctype='multipart/form-data'>
			</br> ID de l'évenement à supprimer  : <input type="text" name="event" value="<?php if (isset($_POST['event'])){echo $_POST['event'];} ?>"/>
		<input type="submit" name="valider" value="SUPPRIMER "/></div>
		</form>
	</fieldset>