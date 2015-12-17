<?php

		$connect = mysqli_connect("localhost", "root", "", "Connexion_Gauloise");
		$req = "SELECT avatar_utilisateur FROM utilisateur_table WHERE id_utilisateur = ".$ID;
		$ret = mysqli_query ($connect, $req) or die (mysql_error ());
		$col = mysqli_fetch_row ($ret);


		header ("Content-type: png");
		echo $col[0];

    echo "test";
?>
