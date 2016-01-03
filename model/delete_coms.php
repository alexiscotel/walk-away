<?php
	$pseudo = $_GET['pseudo'];
	$page = $_GET['page'];
	
	$id_coms = $_GET['coms'];
	
	echo $id_coms;
	
	include('fonc_connect.php');
	include('requetes_forum.php');
	
	if ($page == 'forum')
	{
		$sup = req_delete_message($id_coms);
		
		header('Location:../forum.php?pseudo=' . $pseudo . '&er=0');
	}
	else if ($page == 'membre')
	{
		$req = $bdd->prepare('DELETE FROM comspersos WHERE id = :id');
		$req->execute(array(':id' => $id_coms)) or die(print_r($bdd->errorInfo()));
		
		header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0&coms=x&error=0');
	}
?>