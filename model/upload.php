<?php
	$type = $_GET['type'];
	
	if ($type == 'news')
	{
		if (empty($_POST['titre_news']) || empty($_POST['date_news']) || empty($_POST['contenu_news']))
		{
			/* news.upload.1 -> au moins un des champs est vide */
			header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=news.upload.1');
		}
		else if ($_FILES['image_news']['error'] == 4)
		{
			/* news.upload.2 -> Le fichier n'a pas été chargé */
			header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=news.upload.2');
		}
		else
		{
			$extensions_autorisees = array('jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG');
			
			$tmp = explode('.', $_FILES['image_news']['name']);
			$extension = $tmp[1];
			
			if (!in_array($extension, $extensions_autorisees))
			{
				/* news.upload.3 -> Le type de fichier est incorrect : <b>jpeg, jpg ou png</b> */
				header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=news.upload.3');
			}
			else
			{
				include('requetes_news.php');
				
				$id_img_news = req_last_news() +1;
				
				/* upload de l'image */
				$chemin = '../view/data/photos_news/';
				$fichier = $id_img_news . '.' . $extension;
				
				if(move_uploaded_file($_FILES['image_news']['tmp_name'], $chemin . $fichier))
				{
					/* enregistrement de la requete */
				
					$titre_news = $_POST['titre_news'];
					$date_news = $_POST['date_news'];
					$contenu_news = $_POST['contenu_news'];
					
					$req_insert_news = req_insert_news($id_img_news, $titre_news, $date_news, $contenu_news);
					
					if ($req_insert_news == true)
					{	/* true */
						header('Location:../espace_membre.php?upload=true&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=0');
					}
					else
					{	/* false */
						header('Location:../espace_membre.php?upload=false&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=0');
					}
				}
				else
				{
					/* news.uplaod.4 -> Erreur lors de l'upload du fichier */
					header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=news.upload.4');
				}
			}
		}
	}
	else if ($type == 'photo')
	{
		$page = $_POST['page'];
		
		if (empty($_POST['chemin_photo']))
		{
			/* photos.upload.1 -> Choisir un répertoire de destination */
			if ($page == 'espace_membre')
			{
				header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=photos.upload.1');
			}
			else if ($page == 'photos')
			{
				header('Location:../photos.php?error=1');
			}
		}
		else if ($_FILES['image_photo']['error'] == 4)
		{
			/* photos.upload.2 -> Le fichier n\'a pas été chargé */
			if ($page == 'espace_membre')
			{
				header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=photos.upload.2');
			}
			else if ($page == 'photos')
			{
				header('Location:../photos.php?error=2');
			}
		}
		else
		{
			$extension = strrchr($_FILES['image_photo']['name'], '.');
			$extensions_autorisees = array('.jpg', '.jpeg', '.JPG', '.JPEG');
			
			if (!in_array($extension, $extensions_autorisees))
			{
				/* photos.upload.3 -> Le fichier n\'a pas été chargé */
				if ($page == 'espace_membre')
				{
					header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=photos.upload.3');
				}
				else if ($page == 'photos')
				{
					header('Location:../photos.php?error=3');
				}
			}
			else
			{
				if ($page == 'photos')
				{
					$dossier = '../view/data/photos/normal/Vos photos/' . $_POST['chemin_photo'] . '/';
				}
				else
				{
					$dossier = '../view/data/photos/normal/' . $_POST['chemin_photo'] . '/';
				}
				
				$fichier = basename($_FILES['image_photo']['name']);
				
				$fichier = strtr($fichier,
     'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
     'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
				$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);				
				
				if (move_uploaded_file($_FILES['image_photo']['tmp_name'], $dossier . $fichier))
				{	/* true */
					if ($page == 'espace_membre.php')
					{
						header('Location:../espace_membre.php?upload=true&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=0');
					}
					else if ($page == 'photos.php')
					{
						header('Location:../photos.php?error=y');
					}
				}
				else
				{	/* false */
					if ($page == 'espace_membre.php')
					{
						header('Location:../espace_membre.php?upload=false&update=x&delete=x&news=0&photos=0&videos=0,coms=x&error=0');
					}
					else if ($page == 'photos.php')
					{
						header('Location:../photos.php?error=n');
					}
				}
			}
		}
	}
?>