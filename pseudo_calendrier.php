<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http;//www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<title> Calendrier </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="Style-form.css"/>
	</head>

  <style type="text/css">
    html, body {
      margin: 0;
      padding: 0;
      text-align: center;
      }
    #conteneur {
      position: relative;
      margin: 0 auto;
      padding : 0;
      width: 1100px;
      border : 2px solid #000;

      }
    table, td {
      margin: 0 auto;
      border : 1px dotted #000;
      }
    table td a {
      display : block;
      width : 150px;     /* taille de  */
      height : 100px;    /*  l'image   */
      line-height : 100px;
      }
    table td #sansimg {
      background-color: #000
      }
     table td p {
      margin : 0;
      background-color: #efefef;
      }
    </style>
</head>
<body>

</br></br></br>

  <centralform>
  <div id="conteneur">
    <table border="0">
    <thead>
      <tr>
        <td colspan="7"> CALENDRIER </td>
      </tr>
    <tfoot>


    <tbody>
      <tr>

        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d"); ?>"> <?php echo date("d-m-Y"); ?> </a></p></td>

        <?php $demain =  time() + 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>
      </tr>
      <tr>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>
      </tr>
      <tr>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>
      </tr>
      <tr>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>

        <?php $demain += 86400; ?>
        <td><p><a href="Page_Categories-2.php?Date=<?php echo date("Y-m-d", $demain); ?>"> <?php echo date("d-m-Y", $demain); ?></a></p></td>
      </tr>
      <tbody>
    </table>
  </div>
</centralform>
</body>
</html>
