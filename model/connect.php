<?php
	if (empty($_POST['login']) && empty($_POST['mdp']))
	{
		header('Location:./private.php');
	}
	else
	{
		include_once('fonc_connect.php');
		include_once('requetes.php');
		
		$login = htmlspecialchars($_POST['login']);
		$pass = $_POST['mdp'];
		
		$req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND motdepasse = :pass');
		$req->execute(array('pseudo' => $login, 'pass' => $pass));
		
		$resultat = $req->fetch();
		
		if (!$resultat)
		{
			header('Location:../private.php?er=1');
		}
		else
		{
			header('Location:../espace_membre.php?upload=x&update=x&delete=x&news=0&photos=0&videos=0&coms=x&error=0');
		}
	}
?>