<?php
	$con = mysql_connect("peterfogh.dk.mysql","peterfogh_dk","Gf2SnjLd");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
	mysql_select_db("peterfogh_dk", $con);
?>