<html>
	<head>
		<?php include('view/includes/include.php'); ?>
		<title>Walk Away</title>
	</head>
	
	<body>
		<div class="ink-grid">
			<!-- En tête -->
			<?php include('view/includes/header.php'); ?>
			
			<?php
				$normal = count_contenu('view/data/photos/normal/Vos Photos');
				$mini = count_contenu('view/data/photos/mini/Vos Photos');
				
				if ($normal != $mini)
				{
					$normal = count_contenu('view/data/photos/normal/Vos Photos');
					$mini = count_contenu('view/data/photos/mini/Vos Photos');
					$nb = ($normal - $mini);
					if ($nb >= 0)
					{
						echo '<div class="column-group" style="margin-bottom : 50px"> <!-- validation photos -->';
						echo '<div class="panel" style="text-align : right; width : auto; float : right; background-color : #F7E491">';
						if ($nb == '1')
						{
							echo '<img style="margin-right : 10px" src="view/data/icons/img.png" />';
							echo $nb . ' photo à valider. <a href="model/validate.php" target="_blank">Clique ici !</a>';
						}
						else
						{
							echo '<img style="margin-right : 10px" src="view/data/icons/img.png" />';
							echo $nb . ' photo(s) à valider. <a href="model/validate.php" target="_blank">Clique ici !</a>';
						}
						echo '</div>';
						echo '</div>';
					}
				}
			?>

			<div class="column-group" style="margin-bottom : 50px"> <!-- Documents -->
				<div class="all-100 small-100 tiny-100 panel">
				
					<div id="img_docs" style="cursor : pointer" onclick="affich_docs();">
						<div style="display : inline-block; margin-left : 20px">
							<center><h3>Documents</h3></center>
						</div>
						
						<div style="float :right; margin-right : 20px">
							<img src="view/data/icons/down.png" />
						</div>
					</div>
					
					<?php
						$chemin_part = 'view/data/telechargements/tablatures';
						$chemin_assoc = 'view/data/telechargements/association';
					?>
					
					<div id="docs" class="column-group gutters" style="display : none"> <!--style="display : none"-->
						<div class="all-50 small-100 tiny-100">
							<div class="panel" style="background-color : #ededed">
								<div style="display : inline-block">
									<h4>Partitions</h4>
								</div>
								
								<div style="display : inline-block; float : right">
									<h5><span class="ink-badge orange"><?php echo count_contenu($chemin_part); ?></span></h5>
								</div>
								
								<div>
									<?php list_contenu($chemin_part); ?>
								</div>
							</div>
						</div>
						
						<div class="all-50 small-100 tiny-100">
							<div class="panel" style="background-color : #ededed">
								<div style="display : inline-block">
									<h4>Association</h4>
								</div>
								
								<div style="display : inline-block; float : right">
									<h5><span class="ink-badge red"><?php echo count_contenu($chemin_assoc); ?></span></h5>
								</div>
								
								<div>
									<?php list_contenu($chemin_assoc); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="column-group" style="margin-bottom : 50px"> <!-- News -->
				<div class="xlarge-100 large-100 all-100 panel">
				
					<div id="img_news" style="cursor : pointer" onclick="affich_news();">
						<div style="display : inline-block; margin-left : 20px">
							<center><h3>News</h3></center>
						</div>
						
						<div style="float :right; margin-right : 20px">
							<img src="view/data/icons/down.png" />
						</div>
					</div>
					
					<div id="news" class="column-group gutters" style="<?php $news = $_GET['news']; if ($news == 0){ echo 'display : none';} ?>"> <!--style="display : none"-->
						<div class="all-50 small-100 tiny-100">
							<div class="panel" style="background-color : #ededed">
								<h4>Création <small><font color="#c91010"><?php $erreur = $_GET['error']; switch($erreur){ case 'news.upload.1' : echo 'Au moins un des champs est vide'; break; } ?></font></small></h4>
								
								<form class="ink-form" enctype="multipart/form-data" action="model/upload.php?type=news" method="post"> <!-- model/insert_news.php -->
									<div class="control-group required">
										<label>Titre</label>
										<div class="control">
											<input type="text" name="titre_news" required/>
										</div>
										
										<label>Date</label>
										<div class="control">
											<input type="text" name="date_news" id="datepicker" value="<?php echo date('d\/m\/Y'); ?>" />
										</div>
										
										<label>Contenu</label>
										<div class="control">
											<textarea name="contenu_news" required/></textarea>
										</div>
									</div>
									<div class="control-group">
										<label>Image</label>
										<div class="control">
											<div class="input-file">
												<input type="file" name="image_news" />
												<font color="#c91010"><?php $erreur = $_GET['error']; switch ($erreur){ case 'news.upload.2' : echo 'Le fichier n\'a pas été chargé'; break; case 'news.upload.3': echo 'Le type de fichier est incorrect : <b>jpeg, jpg ou png</b>'; break; case 'news.upload.4': echo 'Erreur lors de l\'upload du fichier'; break; } ?></font>
											</div>
										</div>
										
										<button type="submit" class="ink-button" style="width : 100%; margin-left : 0px; margin-top : 25px"> <!-- itv = setInterval(prog, 100) -->
											Ajouter
										</button>
									</div>
								</form>
							</div>
						</div>
						
						<div class="all-50 small-100 tiny-100">
							<div class="panel" style="background-color : #ededed">
								<h4>Modification</h4>
								
								<form class="ink-form" enctype="multipart/form-data" action="model/modif_affichage.php?type=news" method="post">
									<div class="control-group">
										<label for="titre">News</label>
										<div class="control">
											<select name="news" id="news" required>
											<?php
												include('model/requetes_news.php');
												$req_news = req_news();
												
												while($news = $req_news->fetch())
												{
													echo '<option value="' . $news['img'] . '" selected="selected" >' . $news['titre'] . '</option>';
												}
											?>
											</select>
										</div>
										
										<button type="submit" class="ink-button" style="width : 100%; margin-left : 0px; margin-top : 25px">
											Modifier cette news
										</button>
									</div>
								</form>

								<form class="ink-form" enctype="multipart/form-data" action="model/update.php?type=news" method="post">
									<div class="control-group" style="<?php if ($_GET['news'] == "0"){echo 'display : none';} ?>">
									<?php
										$id_news = $_GET['news'];
										$update_news = req_id_news($id_news);
										$update_news = $update_news->fetch();
									?>
										<label>Titre</label>
										<div class="control">
											<input type="text" name="titre_news" value="<?php echo $update_news['titre']; ?>" />
										</div>
										
										<label>Date</label>
										<div class="control">
											<input type="text" name="date_news" id="datepicker" value="<?php echo $update_news['date']; ?>" />
										</div>
										
										<label>Contenu</label>
										<div class="control">
											<textarea name="contenu_news" ><?php echo $update_news['contenu']; ?></textarea>
										</div>
										
										<input type="hidden" name="img_news" value="<?php echo $id_news; ?>" />
										
										<button type="submit" class="ink-button" style="width : 100%; margin-left : 0px; margin-top : 25px" <?php if ($_GET['news'] != "0"){echo 'autofocus';} ?>>
											Valider les modifications
										</button>
										<font color="#c91010"><?php $erreur = $_GET['error']; switch($erreur){ case 'news.update.1' : echo 'Au moins un des champs est vide'; break; } ?></font>
									</div>
								</form>
							</div>
						</div>
						
						<div class="all-100 small-100 tiny-100">
							<div class="panel" style="background-color : #ededed">
								<center><h4>Suppression</h4></center>
									
								<form class="ink-form" enctype="multipart/form-data" action="model/delete.php?type=news" method="post">
									<div class="column-group gutters">
										<div class="all-25 medium-50 small-100 tiny-100">
											<div class="panel">
											<?php
												// include('model/requetes_news.php');
												$req_news = req_news();
												
												$compteur_news = 0;
												while($news = $req_news->fetch())
												{
													if ($compteur_news == 4)
													{
														echo '</div></div><div class="all-25 medium-50 small-100 tiny-100"><div class="panel">';
														$compteur_news = 0;
													}
											?>
												<div>
													<?php echo $news['titre']; ?><input style="float : right" type="checkbox" name="delete_news[]" value="<?php echo $news['img']; ?>" />
												</div>
											<?php
													$compteur_news++;
												}
											?>
											</div>
										</div>
									</div>
									
									<button type="submit" class="ink-button" style="width : 100%; margin-left : 0px; margin-top : 25px">
										Supprimer
									</button>
									<font color="#c91010"><?php $erreur = $_GET['error']; switch($erreur){ case 'news.delete.1' : echo 'Au moins un des champs doit être coché'; break; } ?></font>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="column-group" style="margin-bottom : 50px"> <!-- Photos -->
				<div class="xlarge-100 large-100 all-100 panel">
				
					<div id="img_pics" style="cursor : pointer" onclick="affich_pics();">
						<div style="display : inline-block; margin-left : 20px">
							<center><h3>Photos</h3></center>
						</div>
						
						<div style="float :right; margin-right : 20px">
							<img src="view/data/icons/down.png" />
						</div>
					</div>
					
					<div id="pics" class="column-group gutters" style="display : none"> <!--style="display : none"-->

						<div class="all-100 small-100 tiny-100">
							<div class="panel" style="background-color : #ededed">
								<center><h4>Ajout</h4></center>
								
								<form class="ink-form" enctype="multipart/form-data" action="model/create_rep_photo.php" method="post">
									<div class="control-group">
										<label>Créer un nouveau dossier</label>
										<div class="control">
											<input style="width : 100%" type="text" name="repertoire" required/>
										</div>
										
										<button type="submit" class="ink-button" style="width : 100%; margin-left : 0px; margin-top : 10px">
											Créer
										</button>
									</div>
								</form>
								
								<form class="ink-form" enctype="multipart/form-data" action="model/upload.php?type=photo" method="post">
									<div class="column-group gutters">
										<div class="all-50 medium-100 small-100 tiny-100">
										<?php
											$chemin1 = 'view/data/photos/normal';
											if ($dossier1 = opendir($chemin1))
											{
												$compteur_photo = 0;
												for ($nb_fichier1 = 0; false !== ($fichier1 = readdir($dossier1)); $nb_fichier1++)
												{
													if($fichier1 != '.' && $fichier1 != '..' && $fichier1 != 'index.html')
													{
														if ($compteur_photo == '3')
														{
															echo '</div><div class="all-50 medium-100 small-100 tiny-100">';
														}
										?>
											<div>
												<?php echo $fichier1; ?><input style="float : right; margin-top : 7px" type="radio" name="chemin_photo" value="<?php echo $fichier1; ?>" required/>
											</div>
										<?php
														$compteur_photo++;
													}
												}
											}
										?>
											<center><small><font color="#c91010"><?php $erreur = $_GET['error']; switch($erreur){ case 'photos.upload.1' : echo 'Choisir un répertoire de destination'; break; } ?></font></small></center>
										</div>
									</div>
									
									<div class="control-group">
										<label class="all-10 align-left">Image</label>
										<div class="control all-90">
											<div class="input-file">
												<input type="file" name="image_photo" />
											</div>
											
											<font color="#c91010">
												<?php $erreur = $_GET['error']; if($erreur == 'photos.upload.2'){ echo 'Le fichier n\'a pas été chargé';} ?>
												<?php $erreur = $_GET['error']; if($erreur == 'photos.upload.3'){ echo 'Le type de fichier est incorrect. Types autorisés : <b>jpeg ou jpg</b>';} ?>
											</font>
										</div>
										
										<?php $page = active();?>
										<input type="hidden" name="page" value="<?php echo $page; ?>" />
										
										<button type="submit" class="ink-button" style="width : 100%; margin-left : 0px; margin-top : 25px">
											Ajouter
										</button>
									</div>
								</form>
							</div>
						</div>
						
						<div class="all-100 small-100 tiny-100">
							<div class="panel" style="background-color : #ededed">
								<center><h4>Suppression</h4></center>
									
								<form class="ink-form" enctype="multipart/form-data" action="model/delete.php?type=photo" method="post">
									<div class="column-group gutters">
									<?php
										$chemin1 = 'view/data/photos/normal';
										if ($dossier1 = opendir($chemin1))
										{
											for ($nb_fichier1 = 0; false !== ($fichier1 = readdir($dossier1)); $nb_fichier1++)
											{
												if($fichier1 != '.' && $fichier1 != '..' && $fichier1 != 'index.html')
												{
									?>
										<div class="<?php if ($fichier1 == 'Vos photos'){ echo 'all-66 medium-100 small-100 tiny-100';}else{ echo 'all-33 medium-50 small-100 tiny-100';} ?>">
											<div class="panel">
												<h5><?php echo $fichier1; ?></h5>
												
												<?php
													$chemin2 = $chemin1 . '/' . $fichier1;
													if ($dossier2 = opendir($chemin2))
													{
														for ($nb_fichier2 = 0; false !== ($fichier2 = readdir($dossier2)); $nb_fichier2++)
														{
															if($fichier2 != '.' && $fichier2 != '..' && $fichier2 != 'index.html')
															{
												?>
												<div>
													<?php
														if ($fichier1 == 'Vos photos')
														{
															echo '<a style="text-decoration : none" href="' . $chemin2 . '/' . $fichier2 . '" target="_blank">' . $fichier2 . '</a>';
														}
														else
														{
															echo '<a style="text-decoration : none" href="' . $chemin2 . '/' . $fichier2 . '" target="_blank">' . substr($fichier2, 13) . '</a>';
														}
													?>
													<input style="float : right; margin-top : 7px" type="checkbox" name="delete_photos[]" value="<?php echo $chemin2 . '/' . $fichier2; ?>" />
												</div>
												<?php
															}
														}
														
														closedir($dossier2);
													}
													else echo 'Le dossier n\' a pas pu être ouvert';
												?>
											</div>
										</div>
									<?php
												}
											}
											
											closedir($dossier1);
										}
										else echo 'Le dossier n\' a pas pu être ouvert';
									?>
									</div>
									
									<button type="submit" class="ink-button" style="width : 100%; margin-left : 0px; margin-top : 25px">
										Supprimer
									</button>
									<font color="#c91010"><?php $erreur = $_GET['error']; switch($erreur){ case 'photo.delete.1' : echo 'Au moins un des champs doit être coché'; break; } ?></font>
								</form>
							</div>
						</div>
						
						<div class="all-100 small-100 tiny-100">
							<div class="panel" style="background-color : #ededed">
								<center><h4>Miniatures</h4></center>
								
								<div class="column-group gutters">
									<?php
										$chemin_mini = 'view/data/photos/normal';
											if ($dossier_mini = opendir($chemin_mini))
											{
												for ($nb_fichier_mini = 0; false !== ($fichier_mini = readdir($dossier_mini)); $nb_fichier_mini++)
												{
													if($fichier_mini != '.' && $fichier_mini != '..' && $fichier_mini != 'index.html')
													{
									?>
									<div class="all-25 small-100 tiny-100">
										<div class="panel">
											<form class="ink-form" enctype="multipart/form-data" action="model/miniatures.php?dossier=<?php echo $fichier_mini; ?>" method="post" target="_blank">
												<center><?php echo $fichier_mini; ?></center>
												<center><a href="model/generate.php"><button class="ink-button small" style="margin-top : 15px; margin-bottom : 0px">Générer les miniatures</button></a></center>
											</form>
										</div>
									</div>
									<?php
													}
												}
											}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="column-group" style="margin-bottom : 50px"> <!-- Videos -->
				<div class="xlarge-100 large-100 all-100 panel">
				
					<div id="img_vids" style="cursor : pointer" onclick="affich_vids();">
						<div style="display : inline-block; margin-left : 20px">
							<center><h3>Vidéos</h3></center>
						</div>
						
						<div style="float :right; margin-right : 20px">
							<img src="view/data/icons/down.png" />
						</div>
					</div>
					
					<div id="vids" class="column-group gutters" style="<?php $news = $_GET['videos']; if ($news == 0){ echo 'display : none';} ?>"> <!--style="display : none"-->						
						<div class="all-50 small-100 tiny-100">
							<div class="panel" style="background-color : #ededed">
								<h4>Modification</h4>
								
								<form class="ink-form" enctype="multipart/form-data" action="model/modif_affichage.php?type=video" method="post">
									<div class="control-group">
										<label>Videos</label>
										<div class="control">
											<select name="videos" id="videos">
											<?php
												include('model/requetes_videos.php');
												
												$req_video = req_videos();
												
												while($videos = $req_video->fetch())
												{
													echo '<option value="' . $videos['id'] . '" selected="selected" >' . $videos['titre'] . '</option>';
												}
											?>
											</select>
										</div>
										
										<button type="submit" class="ink-button" style="width : 100%; margin-left : 0px; margin-top : 25px">
											Modifier
										</button>
									</div>
								</form>

								<form class="ink-form" enctype="multipart/form-data" action="model/update.php?type=video" method="post">
									<div class="control-group" style="<?php if ($_GET['videos'] == "0"){echo 'display : none';} ?>">
									<?php										
										$id_video = $_GET['videos'];
										$update_video = req_id_video($id_video);
										$update_video = $update_video->fetch();
									?>
										<label>Titre</label>
										<div class="control">
											<input type="text" name="titre_video" value="<?php echo $update_video['titre']; ?>" />
										</div>
										
										<label>Date</label>
										<div class="control">
											<input type="text" name="date_video" id="datepicker" value="<?php echo $update_video['date']; ?>" />
										</div>
										
										<label>Citation</label>
										<div class="control">
											<textarea name="citation_video" ><?php echo $update_video['citation']; ?></textarea>
										</div>
										
										<label>Description</label>
										<div class="control">
											<textarea name="description_video" ><?php echo $update_video['description']; ?></textarea>
										</div>
										
										<input type="hidden" name="id_video" value="<?php echo $id_video; ?>" />
										
										<button type="submit" class="ink-button" style="width : 100%; margin-left : 0px; margin-top : 25px" <?php if ($_GET['videos'] != "0"){echo 'autofocus';} ?>>
											Valider les modifications
										</button>
										<font color="#c91010"><?php $erreur = $_GET['error']; switch($erreur){ case 'videos.update.1' : echo 'Au moins un des champs est vide'; break; } ?></font>
									</div>
								</form>
							</div>
						</div>
						
						<div class="all-50 small-100 tiny-100">
							<div class="panel" style="background-color : #ededed">
								<center><h4>Suppression</h4></center>
									
								<form class="ink-form" enctype="multipart/form-data" action="model/delete.php?type=video" method="post">
									<div class="column-group gutters">
										<div class="all-50 medium-100 small-100 tiny-100">
											<div class="panel">
											<?php
												// include('model/requetes_news.php');
												$req_videos = req_videos();
												
												$compteur_video = 0;
												while($videos = $req_videos->fetch())
												{
													if ($compteur_video == 4)
													{
														echo '</div></div><div class="all-50 medium-100 small-100 tiny-100"><div class="panel">';
														$compteur_video = 0;
													}
											?>
												<div>
													<?php echo $videos['titre']; ?><input style="float : right" type="checkbox" name="delete_videos[]" value="<?php echo $videos['id']; ?>" />
												</div>
											<?php
													$compteur_video++;
												}
											?>
											</div>
										</div>
									</div>
									
									<button type="submit" class="ink-button" style="width : 100%; margin-left : 0px; margin-top : 25px">
										Supprimer
									</button>
									<font color="#c91010"><?php $erreur = $_GET['error']; switch($erreur){ case 'videos.delete.1' : echo 'Au moins un des champs doit être coché'; break; } ?></font>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div id="#" class="column-group" style="margin-bottom : 35px"> <!-- Commentaires -->
				<div class="xlarge-100 large-100 all-100 panel">
				
					<div id="img_coms" style="cursor : pointer" onclick="affich_coms();">
						<div style="display : inline-block; margin-left : 20px">
							<center><h3>Commentaires</h3></center>
						</div>
						
						<div style="float :right; margin-right : 20px">
							<img src="view/data/icons/down.png" />
						</div>
					</div>
					
					<div id="coms" class="column-group gutters" style="display : none"> <!--style="display : none"-->
						<div class="all-100 small-100 tiny-100">
							<form class="ink-form" enctype="multipart/form-data" action="espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0&coms=x&error=0" method="post">
								<div class="control-group panel" style="background-color : #ededed">
									<label>Pseudo</label>
									<div class="control">
										<input type="text" name="membre" required/>
									</div>
									
									<label>Message</label>
									<div class="control">
										<textarea name="message" required/></textarea>
									</div>
									
									<button type="submit" class="ink-button" style="width : 100%; margin-left : 0px; margin-top : 25px">
										Publier
									</button>
								</div>
							</form>
							
							<div class="panel" style="background-color : #ededed">
							<?php
								include('model/fonc_connect.php');
								include('model/requetes_coms.php');
								
								/* enregistrement du message dans la bdd */
								
								if (isset($_POST['membre']) && isset($_POST['message']))
								{
									$membre = htmlspecialchars($_POST['membre']); // On utilise mysql_real_escape_string et htmlspecialchars par mesure de sécurité
									$message = htmlspecialchars($_POST['message']); // De même pour le message
									$message = nl2br($message); // Pour le message, comme on utilise un textarea, il faut remplacer les Entrées par des <br />
									$date = date('d m Y \- H:i:s');
									
									$req_insert_coms = req_insert_coms($date, $membre, $message);
									
									header('Location:espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0&coms=x&error=0##');
								}
								
								/*affichage*/
								$req_message = req_coms();
								
								if (!empty($req_message))
								{
									while ($donnees_message = $req_message->fetch())
									{
							?>
								<div style="margin-top : 15px; margin-bottom : 15px; padding-bottom : 10px; border-bottom : 1px solid #cccccc">
									<div style="display : inline-block; float : right">
										<a href="model/delete_coms.php?page=membre&coms=<?php echo $donnees_message['id']; ?>"><img src="view/data/icons/close.png" /></a>
									</div>
									
									<div>
										<h6><?php echo $donnees_message['membre']; ?><small><i> , le <?php echo $donnees_message['date']; ?></i></small></h6>
										<?php echo $donnees_message['message']; ?>
									</div>
								</div>
							<?php
									}
								}
							?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		<?php include('view/includes/footer.php'); ?>
		
		<?php
			$upload = $_GET['upload'];
			$update = $_GET['update'];
			$delete = $_GET['delete'];
			
			switch($upload)
			{
				case 'true':
					echo '<script type="text/javascript">window.alert("Ajout réussi");</script>';
				break;
				
				case 'false':
					echo '<script type="text/javascript">window.alert("Echec de l\'ajout");</script>';
				break;
				
				default :
				break;
			}
			
			switch($update)
			{
				case 'true':
					echo '<script type="text/javascript">window.alert("Mise à jour réussie");</script>';
				break;
				
				case 'false':
					echo '<script type="text/javascript">window.alert("Echec de la mise à jour");</script>';
				break;
				
				default :
				break;
			}
			
			switch($delete)
			{
				case 'true':
					echo '<script type="text/javascript">window.alert("Suppression réussie");</script>';
				break;
				
				case 'false':
					echo '<script type="text/javascript">window.alert("Echec de la suppression");</script>';
				break;
				
				default :
				break;
			}
			
		?>
		
		<script type="text/javascript">
			function affich_docs()
			{
				var div = document.getElementById("docs");
				
				if (div.style.display=="none")
				{
					div.style.display = "block";
					document.getElementById("img_docs").src = "view/data/up.png";
				}
				else
				{
					div.style.display = "none";
					document.getElementById("img_docs").src = "view/data/down.png";
				}
			}
			
			function affich_news()
			{
				var div = document.getElementById("news");
				
				if (div.style.display=="none")
				{
					div.style.display = "block";
					document.getElementById("img_news").src = "view/data/up.png";
				}
				else
				{
					div.style.display = "none";
					document.getElementById("img_news").src = "view/data/down.png";
				}
			}
			
			function affich_pics()
			{
				var div = document.getElementById("pics");
				
				if (div.style.display=="none")
				{
					div.style.display = "block";
					document.getElementById("img_pics").src = "view/data/up.png";
				}
				else
				{
					div.style.display = "none";
					document.getElementById("img_pics").src = "view/data/down.png";
				}
			}
			
			function affich_vids()
			{
				var div = document.getElementById("vids");
				
				if (div.style.display=="none")
				{
					div.style.display = "block";
					document.getElementById("img_vids").src = "view/data/up.png";
				}
				else
				{
					div.style.display = "none";
					document.getElementById("img_vids").src = "view/data/down.png";
				}
			}
			
			function affich_coms()
			{
				var div = document.getElementById("coms");
				
				if (div.style.display=="none")
				{
					div.style.display = "block";
					document.getElementById("img_coms").src = "view/data/up.png";
				}
				else
				{
					div.style.display = "none";
					document.getElementById("img_coms").src = "view/data/down.png";
				}
			}
		</script>
	</body>
</html>