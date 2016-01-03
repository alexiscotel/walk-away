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
			
			<!-- news -->
			<?php
				include('model/requetes_news.php');
				
				$news = req_news();

				$compteur_news = 0;
				$compteur_news2 = 0;
				echo '<div class="column-group gutters">';
				
				while ($donnees_news = $news->fetch())
				{
					if ($compteur_news2 == 0)
					{
			?>
				<div class="xlarge-50 large-50 all-100">
					<figure class="ink-image bottom-space">
						<div style="background-color : #212121; border : 3px solid #212121">
							<center><img src="view/data/photos_news/<?php echo $donnees_news['img']; ?>.jpg" class="imagequery" alt="" /></center>
						</div>
						<figcaption class="over-bottom" style="text-align : justify; border-bottom : 3px solid #212121; border-right : 3px solid #212121; border-left : 3px solid #212121">
						<div>
							<h4 class="push-left">
								<?php echo $donnees_news['titre']; ?>
							</h4>
							<small class="push-right">
								<?php echo $donnees_news['date']; ?>
							</small>
						</div>
						
						<div style="float : left; text-align : justify">
							<i><?php echo $donnees_news['contenu']; ?></i>
						</div>
						</figcaption>
					</figure>
                </div>
			<?php
					}
					else
					{
						if ($compteur_news2 == 3)
						{
							echo '</div><div class="column-group gutters">';
							$compteur_news = 0;
						}
						
						if ($compteur_news == 4)
						{
							echo '</div><div class="column-group gutters">';
						}
			?>
				<div class="xlarge-25 large-25 all-50">
					<div style="background-color : #212121; border : 10px solid #212121">
						<center><img src="view/data/photos_news/<?php echo $donnees_news['img']; ?>.jpg" class="imagequery" alt="" /></center>
					</div>
					<div class="quarter-top-space">
						<div>
							<h4 class="push-left">
								<?php echo $donnees_news['titre']; ?>
							</h4>
							<small class="push-right">
								<?php echo $donnees_news['date']; ?>
							</small>
						</div>
						
						<div style="float : left; text-align : justify">
							<i><?php echo $donnees_news['contenu']; ?></i>
						</div>
					</div>
				</div>
			<?php
						$compteur_news++;
						
						if ($compteur_news > 4)
						{
							$compteur_news = 1;
						}
					}
					
					$compteur_news2++;
				}
			?>
			</div>
		</div>
		
		<?php include('view/includes/footer.php'); ?>
		
	</body>
</html>