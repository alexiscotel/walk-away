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
			
			<div class="column-group" style="margin-bottom : 40px">
				<div class="all-33"></div>
				<div class="all-33">
					<fieldset style="margin-top : 40px; padding : 20px"><legend>Rentrer un pseudo pour accéder au forum</legend>
						<form class="ink-form" method="POST" action="model/connect_forum.php?er=0">
							<div class="control-group required">
								<center><label for="pseudo">Pseudo</label></center>
								<div class="control">
									<input type="text" id="pseudo" name="pseudo" placeholder="Entre un pseudo" required autofocus/>
								</div>
							</div>
							
							<div style="margin-top : 20px">
								<center><button type="submit" class="ink-button black">Connexion</button></center>
							</div>
						</form>
						<?php
								$erreur = $_GET['er'];
								
								if ($erreur == '1')
								{
							?>
							<div style="margin-top : 20px">
								<center class="ink-label red">tu dois rentrer un pseudo pour pouvoir continuer</center>
							</div>
							<?php
								}
							?>
					</fieldset>
				</div>
				<div class="all-33"></div>
			</div>
		</div>
		
		<?php include('view/includes/footer.php'); ?>
		
	</body>
</html>