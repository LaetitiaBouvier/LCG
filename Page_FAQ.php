<?php
	session_start() ;
?>

<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="Style-form.css" />
	<title>FAQ</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <style>

  #faq
  {
    display: inline-block;
    border: 1px solid black;
    width: 800px;
		background-color: white;
		padding-left: 10px;
		margin-left: 15px;
		margin-top: 15px;
  }

	#faq a
	{
		font-size: 1em;
	}

  #faq h2
  {
    color: black;
    font-size: 2em;
    text-align: left;
    font-family: serif;
  }

  #faq p
  {
    color: black;
    text-decoration: none;
    font-size: 1em;
  }

  </style>

	</head>

	<body>
		<header>
      <?php include("header.php"); ?>
    </header>

    <nav>
      <?php include("menu_deroulant.php"); ?>
    </nav>

		<div id="block_faq">

    <div id="faq">

    <h2>Généralités</h2>

    <h3>Liens utiles pour le forumeur</h3>

    <ul>
      <li>Pour modifier les informations de son profil</li>
      <li>Pour recevoir son mot de passe par e-mail</li>
      <li>Pour contacter un administrateur du site</li>
      <li>Charte des forums</li>
      <li>Pour consulter les conditions générales d’utilisation du site</li>
    </ul>

    <h3>Lexique du forum</h3>

    <h4>Administrateur (admin)</h4>

    <p>Personne travaillant pour La Connexion Gauloise ayant accès à l'administration du forum. Généralement on le reconnaît, car il poste en rouge sur le forum. Attention, tous les employés de laconnexiongauloise.com ne sont pas admins. Un admin peut supprimer des messages, bannir un compte, supprimer un événement et administrer la FAQ.</p>

    <h4>Bannissement</h4>

    <p>Acte de suspendre définitivement un compte sur laconnexiongauloise.com. Une fois un compte banni, la personne ne peut pas recréer de compte avec cette adresse e-mail. En cas de bannissement, vous recevrez normalement un e-mail vous indiquant :</p>

    <ul>
      <li>Le pseudo banni</li>
      <li>Le motif</li>
      <li>Le forum et le titre du topic</li>
      <li>Le message ayant provoqué votre bannissement</li>
    </ul>

    <p>Seuls les administrateurs ont accès à cette fonction.</p>

    <h4>Boost</h4>

    <p>Message posté uniquement dans le but d'augmenter son compteur dans sa profil.</p>

    <h4>Cookie</h4>

    <p>"Les cookies sont de petits fichiers textes stockés par le navigateur web sur le disque dur du visiteur d'un site web et qui servent (entre autres) à enregistrer des informations sur le visiteur ou encore sur son parcours dans le site." (source Wikipedia)</p>

    <p>Ces fichiers servent à se rappeler de votre mot de passe sur le forum.</p>

    <p>Pour les désactiver ou les supprimer voici la procédure :</p>

    <h3>Pour Mozilla Firefox</h3>

    <ol>
      <li>Choisissez le menu "Outils" puis "Options".</li>
      <li>Cliquez sur l'icône "vie privée".</li>
      <li>Repérez le menu "cookie" et sélectionnez les options qui vous conviennent.</li>
    </ol>

    <h3>Pour Microsoft Internet Explorer</h3>

    <ol>
      <li>Choisissez le menu "Outils" (ou "Tools"), puis "Options Internet" (ou "Internet Options").</li>
      <li>Cliquez sur l'onglet "Confidentialité" (ou "Confidentiality").</li>
      <li>Sélectionnez le niveau souhaité à l'aide du curseur.</li>
    </ol>

    <p>Pour les besoins de certains services l’activation des cookies peut s’avérer nécessaire.</p>

    <h4>Flood</h4>

    <p>"Inondation" en Anglais. Ce terme désigne le fait d'envoyer une grande quantité de messages sur un forum ou à l'intérieur d'un topic afin d'empêcher une utilisation normale de celui-ci.</p>

    <h4>Up – upper – uppage</h4>

    <p>Action de poster sur un topic dans le but de le faire remonter en première page afin qu'il soit de nouveau bien visible. Attention de ne pas en abuser, au risque d'agacer la communauté.</p>

    <h4>Où puis-je faire mes suggestions ?</h4>

    <p>Si vous avez des propositions pour améliorer le site vous pouvez nous contacter en cliquant sur le bouton "Nous contacter" en bas de page.</p>

    <h2>Inscription et problèmes de compte</h2>

    <h3>Je me suis inscrit et je ne reçois pas mon e-mail de confirmation</h3>

    <p>En premier lieu vérifiez bien que l'e-mail ne soit pas dans vos courriers indésirables. Si vous n'avez pas reçu le mail, vous pouvez nous contacter pour que nous résolvions le problème.</p>

    <p>Si au bout de sept jours le compte n'est toujours pas confirmé il faudra reprendre l'étape d'inscription depuis le début.</p>

    <h3>Je n'arrive pas à m'inscrire, mon adresse e-mail est refusée, pourquoi ?</h3>

    <p>Si lors de votre inscription votre adresse e-mail est rejetée, cela peut-être dû à trois choses :</p>

    <ul>
	    <li>La première raison peut être que l'adresse e-mail est déjà associée à un compte.</li>
	    <li>La seconde peut venir du fait que le pseudo associé à cet e-mail ait été banni. Auquel cas cela bannit aussi l'adresse e-mail. On ne débannit pas cette dernière, à moins que le pseudo soit innocenté.</li>
	    <li>Enfin la troisième raison peut être que vous essayez de vous inscrire avec une adresse jetable de type yopmail. Ces dernières sont interdites à cause de réservations massives et automatiques de comptes.</li>
    </ul>

    <h3>Comment modifier mon compte ?</h3>

    <p>Vous pouvez à tout moment modifier les données de votre compte. Pour cela il suffit de cliquer sur "Profil" -> "Modifier mon profil".</p>

    <h3>J'ai changé mon adresse e-mail, mais je ne reçois pas l'e-mail de confirmation</h3>

    <p>Quand vous changez d'adresse e-mail vous ne pouvez pas poster avec votre pseudo tant que vous n'avez pas cliqué sur l'e-mail de confirmation. Cependant vous avez toujours la possibilité de vous connecter sur la page de modification de votre compte.</p>

    <p>Connectez-vous et dans le formulaire, en dessous de votre adresse e-mail, un lien vous propose de vous renvoyer l'e-mail de confirmation.</p>

    <h3>Je me suis trompé d'adresse e-mail en la changeant dans mon profil, que faire ?</h3>

    <p>Quand vous changez d'adresse e-mail vous ne pouvez pas poster avec votre pseudo tant que vous n'avez pas cliqué sur l'e-mail de confirmation. Cependant vous avez toujours la possibilité de vous connecter sur la page de modification de votre compte.</p>

    <p>Connectez-vous et dans le formulaire, il vous suffit juste de modifier de nouveau votre adresse e-mail.</p>

    <h3>J'ai oublié mon mot de passe ?</h3>

    <p>En cas de perte de son mot de passe, il suffit de nous envoyer un mail avec votre pseudo et votre adresse mail.</p>

    <p>Votre mot de passe sera automatiquement renvoyé sur votre adresse e-mail associée.</p>

    <h3>J'ai oublié mon mot de passe, mais mon adresse e-mail n'est plus valide ?</h3>

    <p>Vous pouvez nous envoyer un message via le formulaire de contact (motif Pseudos / Compte) ou par e-mail à moderation@laconnexiongauloise.com en précisant bien le pseudo que vous souhaitez récupérer. Merci également de fournir un lien vers un message que vous avez posté le plus récemment possible avec ce pseudo.</p>

    <p>Attention : nous ne garantissons pas que nous serons en mesure d'établir que ce compte vous appartient bien, surtout si celui-ci est inactif depuis longtemps.</p>

    <h3>Comment faire supprimer mon compte ?</h3>

    <p>Il faut bien différencier la suppression d'un compte et le bannissement d'un compte. Le bannissement est une opération qui peut se faire par simple demande sur le forum Réclamations en prenant soin de faire la demande avec le pseudo dont vous souhaitez le bannissement.</p>

    <p>La suppression de compte efface complètement de notre base de données toutes les informations et tous les messages postés par ce compte. Par conséquent, cette opération est irréversible, une procédure a donc été mise en place pour éviter les abus.</p>

    <p>Afin de procéder à la suppression de votre compte laconnexiongauloise.com et de tous les messages postés avec celui-ci, vous devrez donc nous faire parvenir les éléments suivants pour justifier de votre identité :</p>

		<ul>
	    <li>Envoi d'un e-mail ou d'un courrier demandant la suppression du compte en question en précisant bien le pseudo à supprimer.</li>
	    <li>Envoi de la copie recto verso d'une pièce d'identité.</li>
	    <li>Envoi de la copie de la page "mon compte" où figurent votre nom, prénom ainsi que vos coordonnées en vous connectant à l'adresse suivante : lien</li>
		</ul>

		<p>Attention : pour que nous puissions valider votre demande, il est nécessaire que les informations figurant sur votre carte d'identité et les renseignements entrés pour ce compte soient identiques, sinon quoi nous ne pourrons pas considérer ce compte comme vous appartenant..</p>

    <p>Si votre compte est banni, ou que vous ne pouvez pas accéder à la page "mon compte" (perte de mot de passe, ...), vous pouvez tout de même faire la demande en envoyant simplement une copie de votre pièce d'identité. Nous regarderons si les informations correspondent bien avec celles de votre compte.</p>

    <p>Vous pouvez envoyer les documents à l'adresse e-mail suivante : moderation@laconnexiongauloise.com</p>

		<h2>Profil</h2>

		<h3>Comment modifier les informations affichées dans mon profil ?</h3>

		<p>Lorsque vous êtes connecté avec votre pseudo, allez dans votre profil. Vous pouvez modifier la plupart des informations tout simplement en cliquant sur le bouton « Modifier ».</p>

		<p>Pour modifier la partie « Infos », vous devez vous rendre sur la page « Mon Compte » tout simplement en cliquant sur l'onglet du même nom.</p>

		<h3>J'ai changé mon avatar mais il n'apparaît pas dans ma profil, pourquoi ?</h3>

		<p>Pour que votre avatar soit pris en compte, il faut qu'il soit validé manuellement par un admin. Cela peut prendre du coup quelques heures, en particulier le week-end.</p>

		<h3>Mon nouvel avatar a bien été validé, mais je vois toujours l'ancien, que faire ?</h3>

		<p>Il suffit juste de rafraîchir votre profil. Pour cela appuyez sur la touche F5 ou bien sur la combinaison Ctrl+R.

		<h3>Pourquoi mon avatar est refusé ?</h3>

		<p>Ne sont pas acceptés les avatars qui pourraient heurter la sensibilité des plus jeunes, ainsi que ceux incitant à la haine ou au racisme.</p>

		<p>Si vous ne comprenez pas pourquoi votre avatar est refusé, vous pouvez toujours en faire la demande via le formulaire de contact (motif Pseudos / Compte) avec un lien vers l'avatar refusé. Un admin se chargera de vous expliquer ce qui ne va pas.</p>

		<h3>L'avatar d'une personne me dérange, que faire ?</h3>

		<p>Vous pouvez le signaler en passant par le formulaire de contact (motif Pseudos / Compte) avec un lien vers le profil concerné, et en faisant l'argumentaire de ce qui vous gêne dans l'avatar.</p>

		<h3>Je n'ai pas rempli certaines rubriques, les autres internautes les verront-ils ?</h3>

		<p>Non, toutes les parties non remplies sont invisibles pour les lecteurs.</p>

		<h3>Je ne vois plus les boutons pour modifier mon profil dans mon profil, pourquoi ?</h3>

		<p>Vous êtes sûrement déconnecté, ou alors pas connecté avec le bon pseudo. Pour cela utilisez le formulaire de connexion en haut à droite du site.</p>

		<h3>On m'a volé mon compte, que faire ?</h3>

		<p>En cas de vol de compte, vous pouvez nous envoyer un message via le formulaire de contact (motif Pseudos / Compte) ou par e-mail à l'adresse moderation@laconnexiongauloise.com en précisant bien le pseudo qui vous a été volé. Merci également de fournir un lien vers un message posté le plus récemment possible par vous-même avec ce pseudo.</p>

		<p>Attention : essayez de nous contacter le plus rapidement possible. Plus l'affaire sera ancienne et plus il nous sera compliqué d'établir que ce compte vous appartient bien.</p>

		<h3>Je n'ai pas reçu de message concernant mon bannissement</h3>

		<p>Si en essayant de poster, un message vous indique que ce pseudo est banni, vous devriez normalement recevoir un message sur l'adresse e-mail associée au compte, vous expliquant le motif de votre exclusion. Pensez à bien vérifier dans les courriers indésirables si vous ne recevez rien. Si pour une raison ou une autre vous n'avez pas reçu de message, vous pouvez toujours demander le motif de votre bannissement sur le forum Réclamations.</p>

		<h3>Je pense que le bannissement de mon compte est une erreur, que faire ?</h3>

		<p>Vous pouvez en toute légitimité demander le débannissement de votre pseudo sur le forum Réclamations. N'oubliez pas de mettre le message de votre ban. Si vous avez été banni sur un forum modéré, vous pouvez aussi demander l'avis du modérateur concerné.</p>

		<h3>Le forum ne marche pas, qui contacter ?</h3>

		<p>Si en essayant d'aller sur le forum ce dernier ne marchait pas, passez par le formulaire de contact (motif Signaler un bug sur le site).</p>

		<p>Dans le corps du message précisez les informations suivantes :</p>

		<ul>
			<li>Lien</li>
			<li>Message d'erreur</li>
			<li>Date et heure à laquelle s'est produite l'erreur</li>
			<li>Système d'exploitation</li>
			<li>Votre navigateur internet et si vous en avez, les modules complémentaires que vous utilisez.</li>
			<li>Si vous passez par un proxy : fournisseur d'accès internet, votre firewall et votre antivirus.</li>
		<ul>

		<p>Cela permettra à l'équipe technique de cerner au plus vite le problème.</p>

		<h3>Comment signaler un abus ou bien un message hors-charte ?</h3>

		<p>Si vous constatez un abus ou bien un message hors charte sur les forums, ou bien sur les commentaires des événements, photos, vidéos, etc., vous pouvez nous les signaler de quatre manières :</p>

		<ul>
			<li>En cliquant sur le point d'exclamation à droite du message. Cela enverra une alertes aux administrateurs.</li>
			<li>Si c'est un forum modéré, vous pouvez le signaler au modérateur dudit forum sur son topic de modération.</li>
			<li>Si vous avez moins de 30 jours de présence sur le site et que le forum n'est pas modéré, vous pouvez signaler les messages hors-charte sur le forum Réclamations.</li>
			<li>Enfin vous pouvez aussi nous signaler les messages à supprimer via le formulaire de contact (motif Forums / Modération).</li>
		</ul>

		<p>Dans les trois derniers cas, n'oubliez pas de mettre un lien vers le message, la date et l'heure de ce dernier, ainsi que le pseudo l'ayant posté.</p>

		<h3>Quelles sont les règles pour upper un topic ?</h3>

		<p>Si vous créez un topic et que celui-ci coule – c'est-à-dire qu'il se retrouve en deuxième page -, vous pouvez poster dessus afin de le faire remonter. Attention à le faire avec parcimonie, auquel cas votre topic pourrait être supprimé.</p>

		<p>De plus sachez qu'il n'est pas interdit de upper un vieux topic pour y apporter des informations ou bien compléter un débat. Mais attention cela est toléré uniquement si le up est réellement justifié.</p>

  	</div>

		</div>

    <footer>
      <?php include("footer.php"); ?>
    </footer>
  </body>
</html>
