<html>
	<head>
		<?php include('view/includes/include.php'); ?>
		<title>Walk Away</title>
	</head>
	
	<body>
		<div class="ink-grid">
			<!-- En tête -->
			<?php include('view/includes/header.php'); ?>
			
			<div class="column-group" style="margin-bottom : 50px"> <!-- Documents -->
				<div class="all-100 small-100 tiny-100 panel">
					<div style="display : inline-block; margin-left : 20px">
						<center><h3>Documents</h3></center>
					</div>
					
					<?php						
						$chemin = 'view/data/telechargements/public';
						
						list_contenu($chemin);
					?>
				</div>
			</div>

		</div>
		
		<?php include('view/includes/footer.php'); ?>
	</body>
</html>