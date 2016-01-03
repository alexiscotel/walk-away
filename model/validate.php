<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-1" />
		<title>Walk Away - Validation des photos uploadés</title>
		<script type="text/javascript" src="../view/ink/js/jquery-2.1.1.js"></script>
		<style>
			body
			{
				background-color : #ededed;
			}
		</style>
		
		<script type="text/javascript">
			function test()
			{
				var largeurDep = $('.image').css('width').substr(0, 3);
				var hauteurDep = $('.image').css('height').substr(0, 3);
				
				var largeurDiv = $('.dvi').css('width');
				// var hauteurDiv = $('.dvi').css('height');
				
				var largeurFin = largeurDiv.substr(0, 3);
				// var hauteurFin = hauteurDiv.substr(0, 3);
				
				var hauteurFin = Math.round((largeurFin * hauteurDep) / largeurDep);
				// var largeurFin = Math.round((hauteurFin * largeurDep) / hauteurDep);
				
				$('.image').css('width',largeurFin);
				$('.image').css('height', hauteurFin);
			}
		</script>
	</head>
	
	<body onload="test();">
		<div style="margin-top : 20px; text-align : center">
			<h2>Gestions des nouvelles photos</h2>
			(Pensez à générer les miniatures une fois la validation terminé)
		</div>
		
		<?php
			if ($dossier_list = opendir('../view/data/photos/normal/Vos Photos'))
			{
				for ($nb_fichier_list = 0; false !== ($fichier_list = readdir($dossier_list)); $nb_fichier_list++)
				{
					if($fichier_list != '.' && $fichier_list != '..')
					{
		?>
		<div style="width : 200px; margin : 20px; float : left; display : inline">
			<div class="dvi" style="width : 200px; margin-bottom : 15px">
				<a href="../view/data/photos/normal/Vos Photos/<?php echo $fichier_list; ?>" target="_blank"><img class="image" src="../view/data/photos/normal/Vos Photos/<?php echo $fichier_list; ?>" /></a>
			</div>
			
			<div class="float : left">
				<center>
					<a href="delete.php?type=valid&fichier=<?php echo $fichier_list; ?>"><button>Supprimer</button></a>
				</center>
			</div>
		</div>
		
		
		<?php
					}
				}
				closedir($dossier_list);
			}
			else echo 'Le dossier n\' a pas pu être ouvert';
		?>
	</body>
</html>