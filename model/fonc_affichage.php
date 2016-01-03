<?php
	function active()
	{
		$chemin_page = $_SERVER['PHP_SELF'];
		$page = basename($chemin_page);
		
		return $page;
	}
	
	function count_contenu($chemin_count)
	{
		if ($dossier_count = opendir($chemin_count))
		{
			for ($nb_fichier_count = 0; false !== ($fichier_count = readdir($dossier_count)); $nb_fichier_count++)
			{
				if($fichier_count != '.' && $fichier_count != '..' && $fichier_count != 'index.php'  && $fichier_count != 'index.html')
				{
					$nb_fichier_count++;
				}
			}
			
			if ($nb_fichier_count != 0)
			{
				$nb_fichier_count = ($nb_fichier_count / 2) - 1;
				return $nb_fichier_count;
			}
			else
			{
				$zero = '0';
				return $zero;
			}
			
			
			closedir($dossier_count);
		}
		else echo 'Le dossier n\' a pas pu être ouvert';
	}
	
	function list_contenu($chemin_list)
	{
		echo '<ul class="unstyled">';
		
		if ($dossier_list = opendir($chemin_list))
		{
			for ($nb_fichier_list = 0; false !== ($fichier_list = readdir($dossier_list)); $nb_fichier_list++)
			{
				if($fichier_list != '.' && $fichier_list != '..' && $fichier_list != 'index.php' && $fichier_list != 'index.html')
				{
					echo '<li>';
					
					$extension = pathinfo($fichier_list, PATHINFO_EXTENSION);
					
					echo '<div style="float : left">';
					
					if (substr($extension, 0, -1) == 'gp')
					{
						echo '<img style="margin-right : 5px" src="./view/data/icons/icons/32x32/gp.png" />';
					}
					else
					{					
						echo '<img style="margin-right : 5px" src="./view/data/icons/icons/32x32/' . $extension . '.png" />';
					}
					echo '</div>';
					
					echo '<div style="padding-top : 6px">';
					echo '<a style="text-decoration : none" href="' . $chemin_list . '/' .$fichier_list.'" target="_blank">';
					
					$tmp = explode('.', $fichier_list);
					echo $tmp[0];
					echo '</a>';
					echo '</div>';
					echo '</li>';
				}
			}
			
			echo '</ul>';
			
			closedir($dossier_list);
		}
		else echo 'Le dossier n\' a pas pu être ouvert';
		
	}		

	function generate($dossier)
	{
		$chemin = '../view/data/photos/normal/' . $dossier;

		if ($dos = opendir($chemin))
		{
			for ($nb_fichier = 0; false !== ($fichier = readdir($dos)); $nb_fichier++)
			{
				if($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != 'index.html')
				{				
					/**/$tmp = explode('.', $fichier);
					$ImageNews = $tmp[0];
					
					if ($tmp[1] == 'jpg' || $tmp[1] == 'jpeg')
					{
						$MIME = 'image/jpeg';
					}
					else if ($tmp[1] == 'png')
					{
						$MIME = 'image/png';
					}
					
					$ExtensionPresumee = $tmp[1];
					
					$ListeExtension = array('jpg' => 'image/jpeg', 'jpeg'=>'image/jpeg');
					$ListeExtensionIE = array('jpg' => 'image/pjpeg', 'jpeg'=>'image/pjpeg');
					
					if ($ExtensionPresumee == 'jpg' || $ExtensionPresumee == 'jpeg')
					{
						$ImageNews = getimagesize($chemin . '/' . $fichier);
						if($MIME == $ListeExtension[$ExtensionPresumee]  || $MIME == $ListeExtensionIE[$ExtensionPresumee])
						{
							$ImageChoisie = imagecreatefromjpeg($chemin . '/' . $fichier);
							$TailleImageChoisie = getimagesize($chemin . '/' . $fichier);
							
							$largeur = $TailleImageChoisie[0];
							$hauteur = $TailleImageChoisie[1];
							
							if ($largeur > $hauteur)
							{
								$NouvelleLargeur = 550; //Largeur à choisir
								$NouvelleHauteur = ($hauteur * ($NouvelleLargeur/$largeur));
							}
							else if ($largeur < $hauteur)
							{
								$NouvelleHauteur = 330; // Hauteur à choisir
								$NouvelleLargeur = ($largeur * ($NouvelleHauteur/$hauteur));
							}
							
							

							$NouvelleImage = imagecreatetruecolor($NouvelleLargeur , $NouvelleHauteur) or die ("Erreur");

							imagecopyresampled($NouvelleImage , $ImageChoisie  , 0,0, 0,0, $NouvelleLargeur, $NouvelleHauteur, $TailleImageChoisie[0],$TailleImageChoisie[1]);
							imagedestroy($ImageChoisie);
							$NomImageExploitable = $tmp[0];

							imagejpeg($NouvelleImage , '../view/data/photos/mini/' . $dossier . '/'.$NomImageExploitable.'.'.$ExtensionPresumee, 100);
							$LienImageNews = '../view/data/photos/mini/' . $dossier . '/'.$NomImageExploitable.'.'.$ExtensionPresumee;
						}
						else
						{
							echo 'Le type MIME de l\'image n\'est pas bon';
						}
					}
					else
					{
						echo 'L\'extension choisie pour l\'image est incorrecte';
					}
				}
			}
			
			closedir($dos);
		}
		else echo 'Le dossier n\' a pas pu être ouvert';
	}
	
?>