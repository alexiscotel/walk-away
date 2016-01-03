<?php
	function req_videos()
	{
		include('./model/fonc_connect.php');
		
		$vids = $bdd->prepare('SELECT * FROM videos ORDER BY id DESC');
		$vids->execute();
		
		return $vids;
	}
	
	function req_last_video()
	{
		include('fonc_connect.php');
		
		$nb_last_vids = $bdd->prepare('SELECT MAX(id) as max_id FROM videos');
		$nb_last_vids->execute();

		$nb_last_vids = $nb_last_vids->fetch();
		
		return $nb_last_vids['max_id'];
	}
	
	function req_first_video()
	{
		include('./model/fonc_connect.php');

		$first_id_vid = req_last_video();
		
		$first_vids = $bdd->prepare('SELECT * FROM videos WHERE id = :id');
		$first_vids->execute(array('id' => $first_id_vid));
		
		return $first_vids;
	}
	
	function req_id_video($id_video)
	{
		include('fonc_connect.php');
		
		$video_id = $bdd->prepare('SELECT * FROM videos WHERE id = :id');
		$video_id->execute(array(':id' => $id_video));
		
		return $video_id;
	}
	
	function req_insert_video($id, $titre, $date, $citation, $description)
	{
		include('fonc_connect.php');
		
		$req_insert_vids = $bdd->prepare('INSERT INTO videos (id, titre, date, citation, description) VALUES (:id, :titre, :date, :citation, :description)');
		$req_insert_vids->execute(array(':id' => $id, ':titre' => $titre, ':date' => $date, ':citation' => $citation, ':description' => $description)) or die(print_r($bdd->errorInfo()));
		
		return $req_insert_vids;
	}
	
	function req_update_video($id, $titre, $date, $citation, $description)
	{
		include('fonc_connect.php');
		
		$req_update_vids = $bdd->prepare('UPDATE videos SET titre = :titre, date = :date, citation = :citation, description = :description WHERE id = :id');
		$req_update_vids->execute(array(':titre' => $titre, ':date' => $date, ':citation' => $citation, ':description' => $description, ':id' => $id)) or die(print_r($bdd->errorInfo()));
		
		return $req_update_vids;
	}
	
	function req_delete_video($id)
	{
		include('fonc_connect.php');

		$req_delete_vids = $bdd->prepare('DELETE FROM videos WHERE id = :id');
		$req_delete_vids->execute(array(':id' => $id)) or die(print_r($bdd->errorInfo()));
		
		return $req_delete_vids;
	}
	
	function req_last_video_deleted()
	{
		include('fonc_connect.php');
		
		$id = req_last_video();
		
		$req_last_video_deleted = $bdd->prepare('DELETE FROM news WHERE id = :id');
		$req_last_video_deleted->execute(array(':id' => $id)) or die(print_r($bdd->errorInfo()));
		
		return $req_last_video_deleted;
	}
?>