<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<title> Calendrier </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="calendrier.css"/>
	</head>

<body>

</br></br></br>

  <centralform>
  <div id="conteneur">
    <table border="0">
    <thead>
      <tr>
        <td colspan="7"> CALENDRIER - Aujourd'hui nous sommes le <?php echo date("d / m / Y"); ?> </td>
      </tr>
    <tfoot>


    <tbody>
      <tr>

				<?php
				$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
			 	$req = $bdd->prepare('SELECT ID_Evenement, JourDebut_Evenement, JourFin_Evenement FROM evenement_table');
			 	$req->execute(array('ID_Evenement', 'JourDebut_Evenement', 'JourFin_Evenement'));

			 	$data = $req->fetch();
				?>

        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d"); ?>"> <?php echo date("d-m"); if (date("Y-m-d")==$data['JourDebut_Evenement']) { echo " !!"; } ?> </a></p></td>

        <?php $demain =  time() + 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo" !!"; } else { echo" .";} ?> </a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo" !!"; } else { echo" .";}?></a></p></td>
				<?php var_dump($data); ?>
        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo" !!"; } else { echo" .";}?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>
      </tr>
      <tr>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>
      </tr>
      <tr>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>
      </tr>
      <tr>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>

        <?php $demain += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m", $demain); if (date("Y-m-d", $demain)==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?></a></p></td>
      </tr>
      <tbody>
    </table>
  </div>
</centralform>
</body>
</html>
