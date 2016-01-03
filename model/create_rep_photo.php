<?php
	$repertoire = $_POST['repertoire'];
	
	if (empty($_POST['repertoire']))
	{
		/* photos.upload.1 -> Le champ doit êtr rempli */
		header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=photos.upload.1');
	}
	else
	{
		$chemin1 = '../view/data/photos/normal/';
		$chemin2 = '../view/data/photos/mini/';
		
		$mkdir1 = mkdir($chemin1 . '/' . $repertoire, 0777);
		$mkdir2 = mkdir($chemin2 . '/' . $repertoire, 0777);
		
		header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=0');
	}
?>