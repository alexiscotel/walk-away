<?php
	$type = $_GET['type'];
	
	if ($type == 'news')
	{
		if (empty($_POST['titre_news']) || empty($_POST['date_news']) || empty($_POST['contenu_news']) || empty($_POST['img_news']))
		{
			/* news.update.1 -> au moins un des champs est vide */
			header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=news.update.1');
		}
		else
		{
			include('requetes_news.php');
			
			$img_news = $_POST['img_news'];
			$titre_news = $_POST['titre_news'];
			$date_news = $_POST['date_news'];
			$contenu_news = $_POST['contenu_news'];
			
			$req_update_news = req_update_news($img_news, $titre_news, $date_news, $contenu_news);
			
			if ($req_update_news == true)
			{	/* true */
				header('Location:../espace_membre.php?upload=x&update=true&delete=x&news=0&photos=0&videos=0,coms=x&error=0');
			}
			else
			{	/* false */
				header('Location:../espace_membre.php?upload=x&update=false&delete=x&news=0&photos=0&videos=0,coms=x&error=0');
			}
		}
	}
	else if ($type == 'video')
	{
		if (empty($_POST['titre_video']) || empty($_POST['date_video']) || empty($_POST['citation_video']) || empty($_POST['description_video']) || empty($_POST['id_video']))
		{
			/* news.update.1 -> au moins un des champs est vide */
			header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=news.update.1');
		}
		else
		{
			include('requetes_videos.php');
			
			$id_video = $_POST['id_video'];
			$titre_video = $_POST['titre_video'];
			$date_video = $_POST['date_video'];
			$citation_video = $_POST['citation_video'];
			$description_video = $_POST['description_video'];
			
			$req_update_video = req_update_video($id_video, $titre_video, $date_video, $citation_video, $description_video);
			
			if ($req_update_video == true)
			{	/* true */
				header('Location:../espace_membre.php?upload=x&update=true&delete=x&news=0&photos=0&videos=0,coms=x&error=0');
			}
			else
			{	/* false */
				header('Location:../espace_membre.php?upload=x&update=false&delete=x&news=0&photos=0&videos=0,coms=x&error=0');
			}
		}
	}
?>