<html>
	<head>
		<?php include('view/includes/include.php'); ?>
		<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-1" />
		<title>Walk Away</title>
	</head>
	
	<body>
		<div class="ink-grid">
			<!-- En t�te -->
			<?php include('view/includes/header.php'); ?>
			
			<div class="column-group" style="margin-bottom : 40px">
				<div class="all-33"></div>
				<div class="all-33">
					<fieldset style="margin-top : 40px; padding : 20px">
						<form class="ink-form" method="POST" action="model/connect.php">
							<div class="control-group required">
								<center><label for="login">Identifiant</label></center>
								<div class="control">
									<input type="text" id="login" name="login" placeholder="Entre ton identifiant" required autofocus/>
								</div>
							</div>
							
							<div class="control-group required">
								<center><label for="mdp">Mot de passe</label></center>
								<div class="control">
									<input type="password" id="mdp" name="mdp" placeholder="Entre ton mot de passe" required/>
								</div>
							</div>
							
							<div style="margin-top : 20px">
								<center><button type="submit" class="ink-button black">Connexion</button></center>
							</div>
							
							<?php
								$erreur = $_GET['er'];
								
								if ($erreur == '1')
								{
							?>
							<div style="margin-top : 20px">
								<center class="ink-label red">Mauvais identifiants</center>
							</div>
							<?php
								}
							?>
						</form>
					</fieldset>
				</div>
				<div class="all-33"></div>
			</div>
		</div>
		
		<?php include('view/includes/footer.php'); ?>
		
	</body>
</html>