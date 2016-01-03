<?php
	function req_music()
	{
		include('./model/fonc_connect.php');
		
		$music = $bdd->prepare('SELECT * FROM music');
		$music->execute();
		
		return $music;
	}
	
	function req_last_music()
	{
		include('fonc_connect.php');
		
		$nb_last_music = $bdd->prepare('SELECT MAX(id) as max_id FROM music');
		$nb_last_music->execute();

		$nb_last_music = $nb_last_music->fetch();
		
		return $nb_last_music['max_id'];
	}
	
	function req_first_music()
	{
		include('./model/fonc_connect.php');

		$first_id_music = req_last_music();
		
		$first_music = $bdd->prepare('SELECT * FROM music WHERE id = :id');
		$first_music->execute(array('id' => $first_id_music));
		
		return $first_music;
	}
	
	function req_second_music()
	{
		include('./model/fonc_connect.php');
		
		$req_second_id = $bdd->prepare('SELECT MAX(id) as max_id FROM music');
		$req_second_id->execute();
		
		$tmp_second_id = $req_second_id->fetch();
		$second_id = $tmp_second_id['max_id'] - 1;
		
		$second_music = $bdd->prepare('SELECT * FROM music WHERE id = :id');
		$second_music->execute(array('id' => $second_id));
		
		return $second_music;
	}
	
	function req_id_music($id_music)
	{
		include('fonc_connect.php');
		
		$music_id = $bdd->prepare('SELECT * FROM music WHERE id = :id');
		$music_id->execute(array(':id' => $id_music));
		
		return $music_id;
	}
	
	function req_insert_music($id, $titre, $lien)
	{
		include('fonc_connect.php');
		
		$req_insert_music = $bdd->prepare('INSERT INTO music (id, titre, lien) VALUES (:id, :titre, :lien)');
		$req_insert_music->execute(array(':id' => $id, ':titre' => $titre, ':lien' => $lien)) or die(print_r($bdd->errorInfo()));
		
		return $req_insert_music;
	}
	
	function req_update_music($id, $titre, $lien)
	{
		include('fonc_connect.php');
		
		$req_update_music = $bdd->prepare('UPDATE music SET titre = :titre, lien = :lien WHERE id = :id');
		$req_update_music->execute(array(':titre' => $titre, 'lien' => $lien, ':id' => $id)) or die(print_r($bdd->errorInfo()));
		
		return $req_update_music;
	}
	
	function req_delete_music($id)
	{
		include('fonc_connect.php');

		$req_delete_music = $bdd->prepare('DELETE FROM music WHERE id = :id');
		$req_delete_music->execute(array(':id' => $id)) or die(print_r($bdd->errorInfo()));
		
		return $req_delete_music;
	}
?>