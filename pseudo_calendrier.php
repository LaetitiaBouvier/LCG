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
				$date=time();
				$bdd = new PDO('mysql:host=localhost;dbname=connexion_gauloise', 'root', ''); /*root pour mac*/
			 	$req = $bdd->prepare('SELECT JourDebut_Evenement FROM evenement_table WHERE JourDebut_Evenement = ?');
			 	$req->execute(array($date));

			 	$data = $req->fetch();
				?>


				<?php $date = time(); ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

        <?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

        <?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>
      </tr>

			<tr>
				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>
      </tr>

			<tr>
				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>
      </tr>

			<tr>
				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>

				<?php $date += 86400; ?>
				<td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $date); ?>"> <?php echo date("d-m", $date); if ($date==$data['JourDebut_Evenement']) { echo"Images_code/Alerte.png"; } ?> </a></p></td>
      </tr>
		</tbody>
    </table>
  </div>
</centralform>
</body>
</html>
