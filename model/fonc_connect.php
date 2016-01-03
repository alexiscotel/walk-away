<?php
	$mysql_host = "localhost";
	$mysql_database = "bdd_walkaway";
	$mysql_user = "root";
	$mysql_password = "heretik/18";
	
	try
	{
		$bdd = new PDO('mysql:host='.$mysql_host.'; dbname='.$mysql_database, $mysql_user, $mysql_password);
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
?>