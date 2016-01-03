<html>
	<head>
		<?php include('view/includes/include.php'); ?>
		<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-1" />
		<title>Walk Away</title>
		
		<style>
			.miniature-galerie-image
			{
				list-style-type:none;
				padding:0;
				margin-bottom : 30px;
			}
			
			.miniature-galerie-image li
			{
				display:inline;
			}
			
			.miniature-galerie-image li img
			{
				width:80px;
				height:80px;
				background:#cecece;
				padding:5px;
				margin:2px;
				border-radius : 5px;
			}
			
			.miniature-galerie-image li img:hover
			{
				background:#8e8e8e;
			}
		</style>
	
		<script type="text/javascript">
			<!--
			var ChangeImage = function ChangeImage(Url)
			{
				document.getElementById('affiche-image').innerHTML = '<img src="'+Url+'" />';
			}
			-->
		</script>
	</head>
	
	<body>
		<div class="ink-grid">
			<!-- En tête -->
			<?php include('view/includes/header.php'); ?>
			
			<div class="column-group gutters conteneur-galerie-image">
				<div class="all-50 small-100 tiny-100">
					<div style="height : 400px; overflow : scroll">
						<?php
							$i=1;
							//Adresse des dossiers.
							$adresse_miniature = "view/data/photos/mini/";
							$adresse_normal = "view/data/photos/normal/";
							//Ouverture du dossier des miniatures. 
							
							if ($dossier1 = opendir($adresse_miniature))
							{
								for ($nb_fichier1 = 0; false !== ($fichier1 = readdir($dossier1)); $nb_fichier1++)
								{
									if($fichier1 != '.' && $fichier1 != '..' && $fichier1 != 'index.html')
									{
						?>
							<h4><?php echo $fichier1; ?></h4>
							<ul class="miniature-galerie-image">
						<?php
									if ($dossier2 = opendir($adresse_miniature . $fichier1))
									{
										for ($nb_fichier2 = 0; false !== ($fichier2 = readdir($dossier2)); $nb_fichier2++)
										{
											if($fichier2 != '.' && $fichier2 != '..'  && $fichier2 != 'index.html')
											{
						?>
								<li>
									<a href="<?php echo $adresse_normal . $fichier1 . '/' . $fichier2; ?>" target="_blank"><img src="<?php echo $adresse_miniature . $fichier1 . '/' . $fichier2; ?>" alt="photo" onmouseover="ChangeImage('<?php echo $adresse_miniature . $fichier1 . '/' . $fichier2;?>');"></a>
								</li>
						<?php
												$i++;
											}
										}
										closedir($dossier2);
									}
									else echo 'Le dossier n\' a pas pu être ouvert';
						?>
							</ul>
						<?php
								}
							}
							closedir($dossier1);
						}
						?>
					</div>
				</div>
				
				<div class="all-50 small-100 tiny-100">
					<div id="affiche-image" class="droite-galerie-image" style="width : 100%">
						<div style="margin-top : 40px">
							<center><h1><small><font color="#212121"><i>Passe ta souris sur une image pour l'afficher</i></font></small></h1></center>
						</div>
					</div>
				</div>
			</div>
			
			<div class="column-group gutters conteneur-galerie-image">
				<div class="all-30 small-100 tiny-100"></div>
				<div class="all-40 small-100 tiny-100">
					<center><h3>Ajoute tes photos !</h3></center>
					
					<form class="ink-form" enctype="multipart/form-data" action="model/upload.php?type=photo&page=photos" method="post">
						<div class="control-group">
							<div class="input-file">
								<input type="file" name="image_photo" required />
							</div>
							
							<?php $page = active();?>
							
							<input type="hidden" name="chemin_photo" value="Vos Photos" />
							<input type="hidden" name="page" value="<?php echo active(); ?>" />
							
							<center style="margin-top : 15px">
								<font color="#c91010">
									<?php $erreur = $_GET['error']; if($erreur == '1'){ echo 'Un problème un survenu lors du choix de répoertoire';} ?>
									<?php $erreur = $_GET['error']; if($erreur == '2'){ echo 'Le fichier n\'a pas été chargé';} ?>
									<?php $erreur = $_GET['error']; if($erreur == '3'){ echo 'Le fichier n\'a pas été chargé';} ?>
									<?php $erreur = $_GET['error']; if($erreur == 'n'){ echo 'l\'upload a échoué';} ?>
								</font>
								<font color="green">
									
								</font>
							</center>
							
							<button type="submit" class="ink-button" style="width : 100%; margin-left : 0px; margin-top : 15px">
								Ajouter
							</button>
						</div>
					</form>
				</div>
				<div class="all-30 small-100 tiny-100"></div>
			</div>
		</div>
		
		<?php include('view/includes/footer.php'); ?>
		
		<?php
			$erreur = $_GET['error'];
			if($erreur == 'y')
			{
				echo '<script type="text/javascript">window.alert("Votre photo a été ajouté avec succès !\n Elle sera validé par le groupe avant d\'être publié");</script>';
			}
		?>
	</body>
</html>