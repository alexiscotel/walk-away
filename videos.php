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

			<div class="column-group gutters">
				
				<?php
					include('model/requetes_videos.php');
					$videos = req_videos();
					$total_videos = $videos->rowCount();
					
					if (empty($_GET['video']))
					{
						$id_video = req_last_video();
					}
					else
					{
						$id_video = $_GET['video'];
					}
					
					$last_videos = req_id_video($id_video);
					$last_videos = $last_videos->fetch();

				?>
				
                <div class="xlarge-70 large-70 medium-100 small-100 tiny-100">
					<div>
						<div class="push-left"><h1><?php echo $last_videos['titre']; ?></h1></div>
						<div class="push-right"><h1><small><?php echo $last_videos['date']; ?></small></h1></div>
					</div>
					
					<figure>
						<video width="100%" autobuffer controls="controls" poster="view/data/img_videos/<?php echo $last_videos['titre']; ?>.png">
							<source src="<?php echo $last_videos['chemin']; ?>" type="video/<?php echo substr($last_videos['chemin'], -3); ?>">
						</video>
					</figure>
					
					<div>
						<p><blockquote><?php echo $last_videos['citation']; ?></blockquote></p>
						<p><?php echo $last_videos['description']; ?></p>
					</div>
                </div>

				<div class="xlarge-30 large-30 medium-100 small-100 tiny-100">
					<h2>Toutes les Vidéos</h2>
                    <ul class="unstyled">
						<?php
							while ($donnees_videos = $videos->fetch())
							{
						?>
						<li class="column-group half-gutters">
							<div class="all-40 small-50 tiny-50">
								<a href="videos.php?video=<?php echo $donnees_videos['id']; ?>"><img src="view/data/img_videos/<?php echo $donnees_videos['titre']; ?>.png" /></a>
							</div>
							<div class="all-60 small-50 tiny-50" style="word-wrap : break-word">
								<p>
									<b><?php echo $donnees_videos['titre']; ?></b>
									<small><?php echo $donnees_videos['description']; ?></small>
								</p>
							</div>
						</li>
						<?php
							}
						?>
                    </ul>
                </div>
            </div>
		</div>
		
		<?php include('view/includes/footer.php'); ?>
	</body>
	
	<script type="text/javascript">
		window.alert("Si tu as pris une ou plusieurs vidéos lors de nos concerts,\ntu peux nous l'envoyer par mail, afin que l'on puisse la publier.\n\ncontactwalkaway@gmail.com");
	</script>
</html>