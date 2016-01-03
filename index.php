<!DOCTYPE html>
<html>
	<head>
		<?php include('view/includes/include.php'); ?>
		<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-1" />
		<title>Walk Away</title>
	</head>
	
	<body>
		<div class="ink-grid">
			<!-- En tête -->
			<?php include('view/includes/header.php'); ?>
			
			<!-- carousel -->
			<div class="all-100 panel">
				<div id="car1" class="ink-carousel">
					<ul class="stage column-group half-gutters">
						<?php
							$chemin = 'view/data/img-carousel';
							
							if ($dossier = opendir($chemin))
							{
								for ($nb_fichier = 0; false !== ($fichier = readdir($dossier)); $nb_fichier++)
								{
									if($fichier != '.' && $fichier != '..' && $fichier != 'index.html')
									{
						?>
						<li class="slide xlarge-25 large-25 medium-33 small-50 tiny-100">
							<a href="photos.php?error=0"><img class="half-bottom-space" src="<?php echo $chemin . '/' . $fichier; ?>" alt="<?php echo $chemin . '/' . $fichier; ?>" ></a>
						</li>
						<?php
									}
								}
								closedir($dossier);
							}
							else echo 'Le dossier n\' a pas pu être ouvert';
						?>
					</ul>
				</div>

				<nav id="p1" class="ink-navigation" data-next-label="" data-previous-label="">
					<ul class="pagination dotted">
					</ul>
				</nav>

				<script>
					Ink.requireModules(['Ink.UI.Carousel_1'], function(InkCarousel) {
						new InkCarousel('#car1', {pagination: '#p1'})
					});
				</script>
			</div>
			
			<div class="column-group gutters" style="margin-top : 35px">
                <div class="all-50 small-100 tiny-100">
					<h1>Dernières news</h1>
					
					<?php
						include_once('model/fonc_connect.php');
						include_once('model/requetes_news.php');
						
						$first_news = req_first_news();
						$first_news = $first_news->fetch();
						
						$second_news = req_second_news();
						$second_news = $second_news->fetch();
					?>
					
					<div class="column-group gutters">
						<div class="all-50 small-100 tiny-100">
							<h4><?php echo $first_news['titre']; ?></h4>
							<img src="view/data/photos_news/<?php echo $first_news['img']; ?>.jpg" alt="<?php echo $first_news['img']; ?>" />
							<p style="text-align : justify; margin-top : 15px">
								<?php echo $first_news['contenu']; ?>
							</p>
						</div>
						
						<div class="all-50 small-100 tiny-100">
							<h4><?php echo $second_news['titre']; ?></h4>
							<img src="view/data/photos_news/<?php echo $second_news['img']; ?>.jpg" alt="<?php echo $second_news['img']; ?>" />
							<p style="text-align : justify; margin-top : 15px">
								<?php echo $second_news['contenu']; ?>
							</p>
						</div>
					</div>
                </div>
				
                <div class="all-50 small-100 tiny-100">
					<h1 style="float : right">Derniers morceaux</h1>
					
					<?php
						include_once('model/requetes_music.php');
						
						$first_music = req_first_music();
						$first_music = $first_music->fetch();
						
						$second_music = req_second_music();
						$second_music = $second_music->fetch();
					?>
					
					<div style="margin-bottom : 30px">
						<iframe width="100%" height="166" scrolling="no" frameborder="no" src="<?php echo $first_music['lien']; ?>"></iframe>
					</div>
					
					<div style="margin-bottom : 30px">
						<iframe width="100%" height="166" scrolling="no" frameborder="no" src="<?php echo $second_music['lien']; ?>"></iframe>
					</div>
                </div>
				
				
					
				<?php
					include_once('model/fonc_connect.php');
					include_once('model/requetes_forum.php');
					
					$req_message = req_messages();
					$req_message = $req_message->fetch();

					if ($req_message == true)
					{						
						$first_message = req_first_message();
						$first_message = $first_message->fetch();
						
						$second_message = req_second_message();
						$second_message = $second_message->fetch();
				?>
				<div class="all-25 small-100 tiny-100"></div>
				<div class="all-50 small-100 tiny-100">
					<center><h1>Commentaires récents</h1></center>
					
					<div>
						<div class="panel" style="margin : 15px">
							<h6><?php echo $first_message['pseudo']; ?><small><i> , le <?php echo $first_message['date']; ?></i></small></h6>
							<?php echo substr($first_message['message'], 0); ?>
						</div>
						
						<div class="panel" style="margin : 15px">
							<h6><?php echo $second_message['pseudo']; ?><small><i> , le <?php echo $second_message['date']; ?></i></small></h6>
							<?php echo $second_message['message']; ?>
						</div>
					</div>
				</div>
				<div class="all-25 small-100 tiny-100"></div>
				<?php
					}
				?>								
				
            </div>
			
		</div>
		
		<?php include('view/includes/footer.php'); ?>
	</body>
</html>