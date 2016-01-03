<?php
	$type = $_GET['type'];
	
	if ($type == 'news')
	{
		$id = $_POST['news'];

		header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=' . $id . '&photos=0&videos=0,coms=x&error=0');
	}
	else if ($type == 'video')
	{
		$id = $_POST['videos'];

		header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=' . $id . '&coms=x&error=0');
	}
	
?>