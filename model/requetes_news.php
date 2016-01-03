<?php
	function req_news()
	{
		include('./model/fonc_connect.php');
		
		$news = $bdd->prepare('SELECT * FROM news ORDER BY id DESC');
		$news->execute();
		
		return $news;
	}
	
	function req_last_news()
	{
		include('fonc_connect.php');
		
		$nb_last_news = $bdd->prepare('SELECT MAX(img) as max_img FROM news');
		$nb_last_news->execute();

		$id_last_news = $nb_last_news->fetch();
		
		return $id_last_news['max_img'];
	}
	
	function req_first_news()
	{
		include('./model/fonc_connect.php');

		$first_id = req_last_news();
		
		$first_news = $bdd->prepare('SELECT * FROM news WHERE img = :id');
		$first_news->execute(array('id' => $first_id));
		
		return $first_news;
	}
	
	function req_second_news()
	{
		include('./model/fonc_connect.php');
		
		$req_second_id = $bdd->prepare('SELECT MAX(img) as max_img FROM news');
		$req_second_id->execute();
		
		$tmp_second_id = $req_second_id->fetch();
		$second_id = $tmp_second_id['max_img'] - 1;
		
		$second_news = $bdd->prepare('SELECT * FROM news WHERE img = :id');
		$second_news->execute(array('id' => $second_id));
		
		return $second_news;
	}
	
	function req_id_news($id_news)
	{
		include('./model/fonc_connect.php');
		
		$news_id = $bdd->prepare('SELECT * FROM news WHERE img = :img');
		$news_id->execute(array(':img' => $id_news));
		
		return $news_id;
	}
	
	function req_insert_news($img, $titre, $date, $contenu)
	{
		include('fonc_connect.php');
		
		$req_insert_news = $bdd->prepare('INSERT INTO news (img, titre, date, contenu) VALUES (:img, :titre, :date, :contenu)');
		$req_insert_news->execute(array(':img' => $img, ':titre' => $titre, ':date' => $date, ':contenu' => $contenu)) or die(print_r($bdd->errorInfo()));
		
		return $req_insert_news;
	}
	
	function req_update_news($img, $titre, $date, $contenu)
	{
		include('fonc_connect.php');
		
		$req_update_news = $bdd->prepare('UPDATE news SET titre = :titre, date = :date, contenu = :contenu WHERE img = :img');
		$req_update_news->execute(array(':titre' => $titre, ':date' => $date, ':contenu' => $contenu, ':img' => $img)) or die(print_r($bdd->errorInfo()));
		
		return $req_update_news;
	}
	
	function req_delete_news($img)
	{
		include('fonc_connect.php');

		$req_delete_news = $bdd->prepare('DELETE FROM news WHERE img = :img');
		$req_delete_news->execute(array(':img' => $img)) or die(print_r($bdd->errorInfo()));
		
		return $req_delete_news;
	}
	
	function req_last_news_deleted()
	{
		include('fonc_connect.php');
		
		$id = req_last_news();
		
		$req_last_delete = $bdd->prepare('DELETE FROM news WHERE img = :id');
		$req_last_delete->execute(array(':id' => $id)) or die(print_r($bdd->errorInfo()));
		
		return $req_last_delete;
	}
?>