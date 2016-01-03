<html>
	<head>
		<?php include('view/includes/include.php'); ?>
		<title>Walk Away</title>
	</head>
	
	<body>
		<div class="ink-grid">
			<!-- En tête -->
			<?php include('view/includes/header.php'); ?>
			
			<div class="column-group gutters" style="margin-bottom : 50px">
				<div class="all-50 small-100 tiny-100">
					<fieldset style="background-color : #ededed">
						<legend style="padding-top : 15px; padding-right : 7px"><h3><img style="margin-top : 3px; margin-left : 2px" src="view/data/icons/mail.png" /> Mail - groupewalkaway@gmail.com</h3></legend>
						
						<form class="ink-form" enctype="multipart/form-data" action="model/contact.php" method="post">
							<div class="control-group">
								<label>Nom</label>
								<div class="control">
									<input type="text" name="nom"/>
								</div>
							</div>
							
							<div class="control-group required">
								<label>Email</label>
								<div class="control">
									<input type="email" name="email" required />
								</div>
								
								<label>Message</label>
								<div class="control">
									<textarea name="message" required /></textarea>
								</div>
							</div>
							
							<button type="submit" class="ink-button" style="width : 100%; margin-left : 0px" disabled>
								Envoyer
							</button>
							
							<font color="#c91010"><?php $erreur = $_GET['error']; switch($erreur){ case 'contact.1' : echo 'Au moins un des champs est vide'; break; } ?></font></small></h4>
						</form>
					</fieldset>
				</div>
				
				<div class="all-50 small-100 tiny-100">
					<fieldset style="background-color : #ededed">
						<legend style="padding-top : 15px; padding-right : 7px"><h3><img style="margin-top : 3px; margin-left : 2px" src="view/data/icons/social.png" /> Réseaux sociaux</h3></legend>
						
						<div class="column-group gutters">
							<div class="all-33 small-33 tiny-33"> <!-- youtube -->
								<center>
									<a style="color : #c5191d; text-decoration : none" href="#" target="_blank">
										<img src="view/data/social/youtube_logo.png" />
										<br /><br />
										Groupe Walk Away
									</a>
								</center>
							</div>
							<div class="all-33 small-33 tiny-33"> <!-- facebook -->
								<center>
									<a style="color : #3c4f9f; text-decoration : none" href="https://www.facebook.com/groupe.walk.away?ref=hl" target="_blank">
										<img onmouseover="this.style.box-shadow = '6px 6px 6px black';" src="view/data/social/facebook_logo.png" />
										<br /><br />
										Groupe Walk Away
									</a>
								</center>
							</div>
							<div class="all-33 small-33 tiny-33"> <!-- google+ -->
								<center>
									<a style="color : #bc290b; text-decoration : none" href="#" target="_blank">
										<img src="view/data/social/googleplus_logo.png" />
										<br /><br />
										Groupe Walk Away
									</a>
								</center>
							</div>
						</div>
						
						<div class="column-group gutters" style="display : none">
							<div class="all-33 small-33 tiny-33" disabled> <!-- twitter -->
								<center>
									<a style="color : #2476b1; text-decoration : none" href="#" target="_blank">
										<img src="view/data/social/twitter_logo.png" />
										<br /><br />
										bientôt !
									</a>
								</center>
							</div>
							<div class="all-33 small-33 tiny-33" disabled> <!-- instagram -->
								<center>
									<a style="color : #9a6650; text-decoration : none" href="#" target="_blank">
										<img src="view/data/social/instagram_logo.png" />
										<br /><br />
										peut-être ...
									</a>
								</center>
							</div>
							<div class="all-33 small-33 tiny-33" disabled> <!-- snapchat -->
								<center>
									<a style="color : #ad9d22; text-decoration : none" href="#" target="_blank">
										<img src="view/data/social/snapchat_logo.png" />
										<br /><br />
										on ne sait jamais ;-)
									</a>
								</center>
							</div>
						</div>
					</fieldset>
					
					<fieldset style="background-color : #ededed; display : none">
						<legend style="padding-top : 15px; padding-right : 7px"><h3><img style="margin-top : 3px; margin-left : 2px" src="view/data/icons/perso.png" /> Téléphonne</h3></legend>
						
						<div>
							Pour joindre Alex, compose le : 06 28 21 39 48
						</div>
					</fieldset>
				</div>
			</div>

		</div>
		
		<?php include('view/includes/footer.php'); ?>
	</body>
</html>