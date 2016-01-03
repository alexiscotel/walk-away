<div id="car1" class="ink-carousel" data-space-after-last-slide="false">

	<ul class="stage column-group half-gutters">

		<?php
			$chemin = './view/data/img-carousel';
			
			if ($dossier = opendir($chemin))
			{
				for ($nb_fichier = 0; false !== ($fichier = readdir($dossier)); $nb_fichier++)
				{
					if($fichier != '.' && $fichier != '..')
					{
		?>
		
		<li class="slide xlarge-25 large-25 medium-33 small-50 tiny-100">
			<img class="half-bottom-space" src="<?php echo $chemin . '/' . $fichier; ?>">
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