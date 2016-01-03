<?php
	include('fonc_affichage.php');
	
	$dossier = $_GET['dossier'];
	
	// echo $dossier;
	generate($dossier);
	
?>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Walk Away - Générateur de miniatures</title>
		
		<style>
			body
			{
				background-color : #ededed;
			}
		</style>
		
		<script type="text/javascript">
			function affich()
			{
				window.alert("Les miniatures ont été générés correctement");
			}
		</script>
	</head>
	
	<body onLoad="affich();">
		<div>
			<p>
				<center><h2>Visualisation des miniatures</h2></center>
			</p>
		</div>
		
		<div>
			<table style="width : 100%">
				<?php
					if ($dossier_list = opendir('../view/data/photos/mini/' . $dossier))
					{
						for ($nb_fichier_list = 0; false !== ($fichier_list = readdir($dossier_list)); $nb_fichier_list++)
						{
							if($fichier_list != '.' && $fichier_list != '..' && $fichier_list != 'index.php')
							{
				?>
				<tr>
					<td style="width : 50%">
						<img class="imagequery" src="../view/data/photos/mini/<?php echo $dossier . '/' . $fichier_list; ?>" />
					</td>
					<td style="width : 50%" align="center">
						mini/<?php echo $dossier . '/' . $fichier_list; ?>
					</td>
				</tr>
				<?php
							}
						}
						closedir($dossier_list);
					}
					else echo 'Le dossier n\' a pas pu être ouvert';
				?>
			</table>
		</div>
	</body>
</html>