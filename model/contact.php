<?php
	if (empty($_POST['email']) || empty($_POST['message']))
	{
		header('Location:../contact.php?error=1');
	}
	else
	{
		/* fonction de mail */
	}
?>