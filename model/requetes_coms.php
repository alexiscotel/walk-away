<?php
	function req_coms()
	{
		include('fonc_connect.php');
		
		$req_coms = $bdd->prepare('SELECT * FROM comspersos ORDER BY id DESC');
		$req_coms->execute() or die(print_r($bdd->errorInfo()));
		
		return $req_coms;
	}
	
	function req_insert_coms($date, $membre, $message)
	{
		include('fonc_connect.php');
		
		$req_insert_coms = $bdd->prepare('INSERT INTO comspersos(date, membre, message) VALUES(:date, :membre, :message)');
		$req_insert_coms->execute(array(':date' => $date, ':membre' => $membre, ':message' => $message)) or die(print_r($bdd->errorInfo()));
		
		return $req_insert_coms;
	}
?>