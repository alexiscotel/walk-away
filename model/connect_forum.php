<?php
	str_replace(' ', '_', $_POST['pseudo']);
	
	if (empty($_POST['pseudo']))
	{
		header('Location:../connexion.php?er=1');
	}
	else
	{
		$pseudo = $_POST['pseudo'];
		
		if ($pseudo == 'admin')
		{
		?>
		<div style="width : 300px; margin-left : auto; margin-right : auto;">
			<fieldset>
				<center>
					<form method="POST" action="connexion_forum.php">
						<center><label for="motdepasse">Mot de passe</label></center>
						<input type="password" name="motdepasse" required autofocus/>
						<input type="hidden" name="pseudo" value="<?php echo $pseudo; ?>" />

						<center><button type="submit">Connexion</button></center>
					</form>
					<?php
						$erreur = $_GET['er'];
						
						if ($erreur == '1')
						{
					?>
					<div style="margin-top : 20px">
						<center>tu dois rentrer un pseudo pour pouvoir continuer</center>
					</div>
					<?php
						}
						elseif ($erreur == '2')
						{
					?>
					<div style="margin-top : 20px">
						<center>Mauvais mot de passe</center>
					</div>
					<?php
						}
					?>
				</center>
			</fieldset>
		</div>
		<?php
		}
		else
		{
			header('Location:../forum.php?pseudo=' . $pseudo . '&er=0');
		}
	}
?>