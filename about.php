<html>
	<head>
		<?php include('view/includes/include.php'); ?>
		<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-1" />
		<title>Walk Away</title>
		
		<script type="text/javascript">
			function loadImg()
			{
				var largeurScreen = document.body.clientWidth;
				
				if (largeurScreen < 1100)
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
		</script>
	</head>
	
	<body>
		<div class="ink-grid">
			<!-- En tête -->
			<?php include('view/includes/header.php'); ?>
			
			<div class="column-group gutters">
                <div class="all-40 small-100 tiny-100">
                    <p class="quarter-top-space">Description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, Description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description,  </p>
                </div>
				
                <div class="all-60 small-100 tiny-100">
					<div style="background-color : #212121; border : 10px solid #212121">
						<center><img src="view/data/about.png" alt=""></center>
					</div>
                </div>
            </div>
			
			<div class="column-group gutters">
                <div class="all-50 small-100 tiny-100">
                    <h3>Cybé</h3>
					<div class="contenant" style="width : 100%; height : 340px; padding-top : 5px; background-color : #212121">
						<center>
							<img style="margin-top : auto; margin-bottom : auto" src="view/data/photos/mini/2014-08-09 - Contest Penestin/2014-08-09 - Contest Penestin (14).jpg" alt="">
							<!--<img class="img" style="margin-top : auto; margin-bottom : auto" src="view/data/photos/mini/2013-05-21 - fete musique aperock/2013-05-21 - fete musique aperock (2).jpg" alt="">-->
						</center>
					</div>
                    <p class="quarter-top-space">Description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, </p>
                </div>
				
                <div class="all-50 small-100 tiny-100">
                    <h3>Alex</h3>
                    <div style="width : 100%; height : 340px; padding-top : 5px; background-color : #212121">
						<center>
							<img style="margin-top : auto; margin-bottom : auto" src="view/data/photos/mini/2014-08-09 - Contest Penestin/2014-08-09 - Contest Penestin (3).jpg" alt="">
							<!--<img class="img" style="margin-top : auto; margin-bottom : auto" src="view/data/photos/mini/2013-12-22 - repete hiver/2013-12-22 - repete hiver (3).jpg" alt="">-->
						</center>
					</div>
                    <p class="quarter-top-space">description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, </p>
                </div>
            </div>
			
			<div class="column-group gutters">
                <div class="all-50 small-100 tiny-100">
                    <h3>Titi</h3>
                    <div style="width : 100%; height : 340px; padding-top : 5px; background-color : #212121">
						<center>
							<img style="margin-top : auto; margin-bottom : auto" src="view/data/photos/mini/2014-08-09 - Contest Penestin/2014-08-09 - Contest Penestin (1).jpg" alt="">
							<!--<img class="img" style="margin-top : auto; margin-bottom : auto" src="view/data/photos/mini/2013-05-21 - fete musique aperock/2013-05-21 - fete musique aperock (3).jpg" alt="">-->
						</center>
					</div>
                    <p class="quarter-top-space">description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, </p>
                </div>
				
                <div class="all-50 small-100 tiny-100">
                    <h3>Thubs</h3>
                    <div style="width : 100%; height : 340px; padding-top : 5px; background-color : #212121">
						<center>
							<img style="margin-top : auto; margin-bottom : auto" src="view/data/photos/mini/2014-08-09 - Contest Penestin/2014-08-09 - Contest Penestin (7).jpg" alt="">
							<!--<img class="img" style="margin-top : auto; margin-bottom : auto" src="view/data/photos/mini/2013-05-21 - fete musique aperock/2013-05-21 - fete musique aperock (3).jpg" alt="">-->
						</center>
					</div>
                    <p class="quarter-top-space">description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, description, </p>
                </div>
            </div>
	
		</div>
		
		<?php include('view/includes/footer.php'); ?>
	</body>
</html>