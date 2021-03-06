<!DOCTYPE HTML>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Parkway Lofts</title>
	<meta name="viewport" content="width=device-width" />
	<!-- Styles -->
	<link type="text/css" href="css/mainStyles.css" rel="stylesheet" />
	<!-- Scripts -->
	<script type="text/javascript" src="js/jquery-1.8.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.js"></script>
	<script type="text/javascript" src="js/slides.js"></script>
	<script type="text/javascript" src="js/jquery.preloader.js"></script>
	<script type="text/javascript" src="js/residenceFPScripts.js"></script>
	<script type="text/javascript" src="js/javascript-video-scrubber.js"></script>
	<script type="text/javascript" src="js/fpScrubScripts.js"></script>
	<script type="text/javascript">
		$(function(){
		
			$(".floorplansImage").preloader();
		
			$('#residenceBuildingFloors').slides({
				/*preload: {
 					active: true,
 					image: "images/loading.gif"
 				},
 				effects: {
 					navigation: "fade",
 					pagination: "fade"
				},
				fade: {
 					interval: 150,
 					crossfade: true, // [Boolean] TODO: add this feature. Crossfade the slides, great for images, bad for text
 					easing: "" // [String] Dependency: jQuery Easing plug-in <http://gsgd.co.uk/sandbox/jquery/easing/>
				},*/
				startAtSlide:1,
				pagination:false,
				navigation:false,
				width:980,
				height:460
			});
		});
	</script>
	
</head>

<body>

<div id="floorplansHolder">
	<div id="floorplansLoader">
		<img src="images/30.gif" alt="fancy_loading" width="64" height="8" />
	</div>
	<div id="floorplansInHere">
	
	</div>
</div>

<div id="theHeader">
	
	<div id="navigation">
		<div class="navBTN navLeft unselectedNav"><a href="residences.php">RESIDENCES</a></div>
		<div class="navBTN navLeft unselectedNav"><a href="amenities.php">AMENITIES</a></div>
		<div class="navBTN navLeft selectedNav"><a href="floorplans.php">FLOORPLANS</a></div>
		<div id="parkwayLogo">
			<a href="index.php"><img src="images/parkway-lofts-logo.png" alt="Parkway Lofts" width="140" height="156" /></a>
		</div>
		<div class="navBTN navRight unselectedNav"><a href="contact-us.php">CONTACT US</a></div>
		<div class="navBTN navRight unselectedNav"><a href="gallery.php">GALLERY</a></div>
		<div class="navBTN navRight unselectedNav"><a href="neighborhood.php">NEIGHBORHOOD</a></div>		
	</div>
	<div id="becomeVipBTN">BECOME A VIP</div>
	<div class="clearFloat"></div>
	
</div>

<div id="theContents">

	<div class="sectionHolder">
		<div id="residenceBuildingSelector">
        	
        	<div id="residenceBuildingNavigation">
        		<div class="floorplans-floorSelector fpUnselected" id="fpBTN-6"><a href="#">Penthouse</a></div>
        		<div class="floorplans-floorSelector fpUnselected" id="fpBTN-5"><a href="#">Level - 7</a></div>
        		<div class="floorplans-floorSelector fpUnselected" id="fpBTN-4"><a href="#">Level - 6</a></div>
        		<div class="floorplans-floorSelector fpUnselected" id="fpBTN-3"><a href="#">Level - 5</a></div>
        		<div class="floorplans-floorSelector fpUnselected" id="fpBTN-2"><a href="#">Level - 4</a></div>
        		<div class="floorplans-floorSelector fpUnselected" id="fpBTN-1"><a href="#">Level - 3</a></div>
        		<div class="floorplans-floorSelector fpSelected" id="fpBTN-0"><a href="#">Level - 2</a></div>
        	</div>
        	
        	<div id="residenceBuildingFloors">
	        	<img id="video" class="maskThis" src="images/rotatingBuilding/parkwaylofts_wireframe_0000.jpg" alt="" />
        	</div>		
        	
        	        			
    	</div>
    	
        	<div id="selectAFloorHeadline">SELECT A FLOOR</div>
	</div>
	
	<div class="sectionHolder">
		
		<div class="floorplansEntry">
			<div class="floorplansEntryInformation">
				<div class="floorplansEntryTopText">
	        		<div class="floorplansEntryHeadline">THIRD<BR>FLOOR LOFT</div>
	        		<div class="floorplansInformation">Loft, 1 Bathroom</div>
	        	</div>
	        	<div class="floorplansEntryBottomText">
	        		<div class="floorplansEntryLinkIcon"><img src="images/floorplanLinkIcon.png" alt="floorplanLinkIcon" width="19" height="23" /></div>
	        		<div class="floorplansEntryLinkText"><a href="floorplans/floorSample.php" class="fpEnlargeBTN">Enlarge</a> | <a href="#" target="_blank">Download PDF</a></div>
	        		<div class="clearFloat"></div>
	        	</div>
			</div>
        	<div class="floorplansImage">
        		<a href="floorplans/floorSample.php" class="fpEnlargeBTN"><img src="images/floorplans/fpThumb-Sample.png" alt="Floorplans Sample" width="500" height="437" /></a>
        	</div>
        	<div class="clearFloat"></div>
        </div>
        
        <div class="sectionSeparator"></div>
        
        <div class="floorplansEntry">
			<div class="floorplansEntryInformation">
				<div class="floorplansEntryTopText">
	        		<div class="floorplansEntryHeadline">THIRD<BR>FLOOR LOFT</div>
	        		<div class="floorplansInformation">Loft, 1 Bathroom</div>
	        	</div>
	        	<div class="floorplansEntryBottomText">
	        		<div class="floorplansEntryLinkIcon"><img src="images/floorplanLinkIcon.png" alt="floorplanLinkIcon" width="19" height="23" /></div>
	        		<div class="floorplansEntryLinkText"><a href="floorplans/floorSample.php" class="fpEnlargeBTN">Enlarge</a> | <a href="#" target="_blank">Download PDF</a></div>
	        		<div class="clearFloat"></div>
	        	</div>
			</div>
        	<div class="floorplansImage">
        		<a href="floorplans/floorSample.php" class="fpEnlargeBTN"><img src="images/floorplans/fpThumb-Sample.png" alt="Floorplans Sample" width="500" height="437" /></a>
        	</div>
        	<div class="clearFloat"></div>
        </div>
        
	</div>
	
</div>

<div id="theFooter">
	<div id="footerLeft">5 LAWRENCE STREET | BLOOMFIELD NJ | 07003 | 201.308.8200</div>
	<div id="footerRight"></div>
	<div class="clearFloat"></div>
</div>

</body>
</html>
