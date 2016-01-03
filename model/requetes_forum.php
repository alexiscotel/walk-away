<?php
	function req_messages()
	{
		include('fonc_connect.php');
		
		$req_message = $bdd->prepare('SELECT * FROM forum ORDER BY id DESC');
		$req_message->execute() or die(print_r($bdd->errorInfo()));
		
		return $req_message;
	}
	
	function req_last_message()
	{
		include('fonc_connect.php');
		
		$req_last_message = $bdd->prepare('SELECT MAX(id) as max_id FROM forum');
		$req_last_message->execute();

		$req_last_message = $req_last_message->fetch();
		
		return $req_last_message['max_id'];
	}
	
	function req_first_message()
	{
		include('./model/fonc_connect.php');

		$first_id = req_last_message();
		
		$req_first_message = $bdd->prepare('SELECT * FROM forum WHERE id = :id');
		$req_first_message->execute(array('id' => $first_id));
		
		return $req_first_message;
	}
	
	function req_second_message()
	{
		include('./model/fonc_connect.php');
		
		$req_second_id = $bdd->prepare('SELECT MAX(id) as max_id FROM forum');
		$req_second_id->execute();
		
		$tmp_second_id = $req_second_id->fetch();
		$second_id = $tmp_second_id['max_id'] - 1;
		
		$req_second_message = $bdd->prepare('SELECT * FROM forum WHERE id = :id');
		$req_second_message->execute(array('id' => $second_id));
		
		return $req_second_message;
	}
	
	function req_pseudo($pseudo)
	{
		include('./model/fonc_connect.php');
		
		$req_pseudo = $bdd->query('SELECT pseudo, COUNT(message) as nb_message FROM forum WHERE pseudo = "' . $pseudo . '"');
		
		return $req_pseudo;
	}
	
	function req_insert_message($date, $pseudo, $message)
	{
		include('fonc_connect.php');
		
		$req_insert_message = $bdd->prepare('INSERT INTO forum(date, pseudo, message) VALUES(:date, :pseudo, :message)');
		$req_insert_message->execute(array(':date' => $date, ':pseudo' => $pseudo, ':message' => $message)) or die(print_r($bdd->errorInfo()));
		
		return $req_insert_message;
	}
	
	function req_update_message($date, $pseudo, $message, $id)
	{
		include('fonc_connect.php');
		
		$req_update_message = $bdd->prepare('UPDATE forum SET date = :date, pseudo = :pseudo, message = :message WHERE id = :id');
		$req_update_message->execute(array(':date' => $date, ':pseudo' => $pseudo, ':message' => $message, ':id' => $id)) or die(print_r($bdd->errorInfo()));
		
		return $req_update_message;
	}
	
	function req_delete_message($id)
	{
		include('fonc_connect.php');

		$req_delete_message = $bdd->prepare('DELETE FROM forum WHERE id = :id');
		$req_delete_message->execute(array(':id' => $id)) or die(print_r($bdd->errorInfo()));
		
		return $req_delete_message;
	}
	
	function req_nb_message()
	{
		include('fonc_connect.php');
		
		$req_nb_message = $bdd->prepare('SELECT COUNT(*) as nb FROM forum');
		$req_nb_message->execute();
		$req_nb_message = $req_nb_message->fetch();
		
		return $req_nb_message['nb'];
	}
?>