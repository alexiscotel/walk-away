<?php
	$type = $_GET['type'];
	
	if ($type == 'news')
	{
		if (empty($_POST['delete_news']))
		{
			header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=news.delete.1');
		}
		else
		{
			include('requetes_news.php');
		
			$compteur_news = 0;
			foreach($_POST['delete_news'] as $img)
			{
				$req_delete_news = req_delete_news($img);
				$tab_result_news[$compteur_news] = $req_delete_news;
				$compteur_news++;
			}
			
			if (!in_array('false', $tab_result_news))
			{	/* true */
				header('Location:../espace_membre.php?upload=x&update=x&delete=true&news=0&photos=0&videos=0,coms=x&error=0');
			}
			else
			{	/* false */
				header('Location:../espace_membre.php?upload=x&update=x&delete=false&news=0&photos=0&videos=0,coms=x&error=0');
			}
		}
	}
	else if ($type == 'photo')
	{
		if (empty($_POST['delete_photos']))
		{
			header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=photo.delete.1');
		}
		else
		{
			foreach($_POST['delete_photos'] as $photo)
			{
				$unlink = unlink('.' . $photo);
				$unlink2 = unlink('../view/data/photos/mini/' . substr($photo, 26));
			}
			
			header('Location:../espace_membre.php?upload=x&update=x&delete=true&news=0&photos=0&videos=0,coms=x&error=0');
		}
	}
	else if ($type == 'video')
	{
		if (empty($_POST['delete_videos']))
		{
			header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=videos.delete.1');
		}
		else
		{
			include('requetes_videos.php');
			
			$compteur_videos = 0;
			foreach($_POST['delete_videos'] as $id)
			{
				$req_id_video = req_id_video($id);
				$req_id_video = $req_id_video->fetch();
				$chemin = $req_id_video['chemin'];
				
				unlink('../' . $chemin);
				
				$req_delete_video = req_delete_video($id);
				$tab_result_videos[$compteur_videos] = $req_delete_video;
				$compteur_videos++;
			}
			
			if (!in_array('false', $tab_result_videos))
			{	/* true */
				header('Location:../espace_membre.php?upload=x&update=x&delete=true&news=0&photos=0&videos=0,coms=x&error=0');
			}
			else
			{	/* false */
				header('Location:../espace_membre.php?upload=x&update=x&delete=false&news=0&photos=0&videos=0,coms=x&error=0');
			}
		}
	}
	else if ($type == 'valid')
	{
		$fichier = $_GET['fichier'];
		unlink('../view/data/photos/normal/Vos photos/' . $fichier);
		
		header('Location:validate.php');
	}
?>