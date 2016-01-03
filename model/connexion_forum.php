<?php
	$mdp = $_POST['motdepasse'];
	$pseudo = $_POST['pseudo'];
	
	if ($mdp == 'applicationData')
	{
		header('Location:../forum.php?pseudo=' . $pseudo . '&er=0');
	}
	else
	{
		echo 'mauvais mot de passe<br /><br /><a href="' . $_SERVER["HTTP_REFERER"] . '">Retour</a>';
	}
?>