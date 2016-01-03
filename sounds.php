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
				<div class="all-50 small-100 tiny-100">
					<img src="view/data/sounds.png" alt="" />
				</div>
				
				<div class="all-50 small-100 tiny-100">
				
			<?php
				include('model/requetes_music.php');
				
				$music = req_music();
				
				$compteur_music = 0;
				
				while ($donnees_music = $music->fetch())
				{
					if ($compteur_music < 2)
					{
						echo '<div class="all-100 small-100 tiny-100" style="margin-bottom : 20px">';
						echo '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="' . $donnees_music['lien'] . '"></iframe>';
						echo '</div>';
					}
					else
					{
						if ($compteur_music == 2)
						{
							echo '</div></div>';
							echo '<div class="column-group gutters">';
						}
						
						echo '<div class="all-100 small-100 tiny-100" style="margin-bottom : 20px">';
						echo '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="' . $donnees_music['lien'] . '"></iframe>';
						echo '</div>';
					}
					$compteur_music++;
				}
			?>
			</div>
		</div>
		
		<?php include('view/includes/footer.php'); ?>
	</body>
</html>