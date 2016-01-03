<?php
	include('./model/fonc_affichage.php');
?>
<style>
	#menuNavigation
	{
		position : absolute;
	}
	
	#menuNavigation.fixe
	{
		position : fixed;
	}
</style>

<script type="text/javascript">
	/* début afficher/cacher icones */
	function loadImg()
	{
		var largeurScreen = document.body.clientWidth;
		
		if (largeurScreen < 1340)
		{
			$('.img').css('display', 'none');
		}
		else
		{
			$('.img').css('display', 'inline');
		}
		// window.alert(largeurScreen);
	}
	
	function addEvent(element, type, listener)
	{
		if (element.addEventListener)
		{
			element.addEventListener(type, listener, false);
		}
		else if (element.attachEvent)
		{
			element.attachEvent("on"+type, listener);
		}
	}
	
	addEvent(window, "load", loadImg);
	addEvent(window, "resize", loadImg);
	/* fin afficher/cacher icones */
</script>

<header class="clearfix vertical-padding vertical-space">
	<div class="logo xlarge-push-left large-push-left">
		<a href="./index.php" style="text-decoration : none">
			<img style="float : left;" src="./view/data/walkaway.png" alt="">
		</a>
		<h1 style="float : left; margin-left : 20px; padding-top : 18px;">Walk Away <small color="grey">| Go Ahead !</small></h1>
	</div>
	
	
	<nav class="ink-navigation xlarge-push-right large-push-right half-top-space">
		<ul class="menu horizontal black">
			<li <?php $page = active(); if ($page == 'news.php'){echo 'class="active"';}?>><a href="news.php"><img class="img" style="margin-top : 6px; margin-right : 6px;" src="./view/data/icons/header/news.png" /> News</a></li>
			<li <?php $page = active(); if ($page == 'about.php'){echo 'class="active"';}?>><a href="about.php"><img class="img" style="margin-top : 6px; margin-right : 6px;" src="./view/data/icons/header/about.png" /> About</a></li>
			<li <?php $page = active(); if ($page == 'photos.php'){echo 'class="active"';}?>><a href="photos.php?error=0"><img class="img" style="margin-top : 6px; margin-right : 6px;" src="./view/data/icons/header/photos.png" /> Photos</a></li>
			<li <?php $page = active(); if ($page == 'sounds.php'){echo 'class="active"';}?>><a href="sounds.php"><img class="img" style="margin-top : 6px; margin-right : 6px;" src="./view/data/icons/header/sound.png" /> Sounds</a></li>
			<li <?php $page = active(); if ($page == 'videos.php'){echo 'class="active"';}?>><a href="videos.php?video="><img class="img" style="margin-top : 6px; margin-right : 6px;" src="./view/data/icons/header/videos.png" /> Vids</a></li>
			<li <?php $page = active(); if ($page == 'download.php'){echo 'class="active"';}?>><a href="download.php"><img class="img" style="margin-top : 6px; margin-right : 6px;" src="./view/data/icons/header/download.png" /> Downloads</a></li>
			<li <?php $page = active(); if ($page == 'forum.php'){echo 'class="active"';}?>>
				<?php
					include('./model/requetes_forum.php');
					$nombre = req_nb_message();
					
					if ($page != 'forum.php')
					{
						if ($nombre != 0)
						{
				?>
				<span style="position : absolute; right : 0px; top : -9px" class="ink-badge yellow">
					<?php echo $nombre; ?>
				</span>
				<?php
						}
					}
				?>
				<a href="connexion.php?er=0"><img class="img" style="margin-top : 6px; margin-right : 6px;" src="./view/data/icons/header/forum.png" /> Forum</a>
			</li>
			<li <?php $page = active(); if ($page == 'contact.php'){echo 'class="active"';}?>><a href="contact.php?error=0"><img class="img" style="margin-top : 6px; margin-right : 6px;" src="./view/data/icons/header/contact.png" /> Contact</a></li>
		</ul>
	</nav>
</header>