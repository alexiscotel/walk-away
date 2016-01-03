<link rel="shortcut icon" href="view/data/favicon.ico">
<link rel="icon" type="image/gif" href="view/data/animated_favicon.gif">

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="">
<meta name="author" content="ink, cookbook, recipes">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!-- load inks CSS -->
<link rel="stylesheet" type="text/css" href="./view/ink/css/font-awesome.css">
<?php
	if ($dossier_css = opendir('./view/ink/css'))
	{
		for ($nb_fichier_css = 0; false !== ($fichier_css = readdir($dossier_css)); $nb_fichier_css++)
		{
			if($fichier_css != '.' && $fichier_css != '..')
			{
				echo '<link rel="stylesheet" type="text/css" href="./view/ink/css/' . $fichier_css . '">';
			}
		}		
		closedir($dossier_css);
	}
	else echo 'Le dossier n\' a pas pu être ouvert';
?>

<!-- load inks CSS for IE8 -->
<!--[if lt IE 9 ]>
	<link rel="stylesheet" href="./view/ink/css/ink-ie.min.css" type="text/css" media="screen" title="no title" charset="utf-8">
<![endif]-->

<!-- test browser flexbox support and load legacy grid if unsupported -->
<script type="text/javascript" src="./view/ink/js/modernizr.js"></script>
<script type="text/javascript">
	Modernizr.load({
	  test: Modernizr.flexbox,
	  nope : './view/ink/css/ink-legacy.min.css'
	});
</script>

<!-- load inks javascript files -->
<?php
	if ($dossier_js = opendir('./view/ink/js'))
	{
		for ($nb_fichier_js = 0; false !== ($fichier_js = readdir($dossier_js)); $nb_fichier_js++)
		{
			if($fichier_js != '.' && $fichier_js != '..')
			{
				echo '<script type="text/javascript" src="./view/ink/js/' . $fichier_js . '"></script>';
			}
		}		
		closedir($dossier_js);
	}
	else echo 'Le dossier n\' a pas pu être ouvert';
?>