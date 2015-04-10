<?php
/**
* New World Group Connector
*
* @version 1.0 1/16/08
* @desc Connects to the New World Group Connect web service
*/

// Configuration

$action = 'register';
$serviceUrl = 'http://connect.newworldgroup.com/contactConnector';
// for parkwaylofts.com list
$listId = 167;
$password = 'uvyz0yas';


// do not touch below this line
// ===================================================================
if ($_POST) {

    if (function_exists('curl_init')) {

    	$ch = curl_init();

	    $postFields = array();
	    $formData = array();
	    foreach($_POST as $key => $val) {
	        if (strpos($key, 'formdata_') === 0) {
	            $newKey = substr($key, 9);
	            $formData[$newKey] = $val;
	        }
	    }
	    $postFields['formData'] = serialize($formData);
	    $postFields['listId'] = $listId;
	    $postFields['password'] = $password;
	    $postFields['clientIp'] = $_SERVER['REMOTE_ADDR'];
	    $postFields['serverIp'] = $_SERVER['SERVER_ADDR'];

	    $postStrArr = array();
	    foreach($postFields as $key => $val) {
	        $postStrArr[] = $key . '=' . urlencode($val);
	    }
	    $postStr = implode('&', $postStrArr);

	    curl_setopt($ch, CURLOPT_URL, $serviceUrl . '/?action=' . $action);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $postStr);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	    $return = curl_exec($ch);

	    if ($return !== false) {
	    	//do nothing we display it below.
	    	$return = preg_replace("/rs=/","",$return);
		} else {
			$return = "Can not connect to web service.";
		}

	    curl_close($ch);

	} else {
		$return = "Required software not installed on this web server.";
	}

}

?>

<!DOCTYPE HTML>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Parkway Lofts</title>
	<meta name="viewport" content="width=device-width" />
	<!-- Styles -->
	<link type="text/css" href="css/mainStyles.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css" media="screen" />	
	<!-- Scripts -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.easing.js"></script>
	<script type="text/javascript" src="js/jquery-valign.js"></script>
	<script type="text/javascript" src="js/jquery.preloader.js"></script>
	<script type="text/javascript" src="js/jquery.waitforimages.js"></script>
	<script type="text/javascript" src="js/slides.js"></script>
	<script type="text/javascript" src="js/baseScripts.js"></script>
	<script type="text/javascript" src="js/residenceFPScripts.js"></script>
	<script type="text/javascript" src="js/fpScrubScripts.js"></script>
	<script type="text/javascript">
		$(function(){
		
			$(".floorplansImage").preloader();
		
			$('#residenceBuildingFloors').slides({
				preload: {
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
				},
				startAtSlide:1,
				pagination:false,
				navigation:false,
				width:1480,
				height:460
			});
			
			$('#section1').css('opacity', 0);
		    $('#section2').css('opacity', 0);
		    $('#theFooter').css('opacity', 0);
		    
		    $('#homeContentHolder > IMG').attr('src', 'images/amenities-top.jpg');
		    
		    $('#residences-A > .columnImage > IMG').attr('src', 'images/residences-1a.jpg');
		    $('#residences-B > .columnImage > IMG').attr('src', 'images/residences-1b.jpg');
		    $('#residences-C > .columnImage > IMG').attr('src', 'images/residences-1c.jpg');
		    
		    $('#residences-2A > .columnImage > IMG').attr('src', 'images/residences-2a.jpg');
		    $('#column2-2a > IMG').attr('src', 'images/residences-2b1.jpg');
		    $('#column2-2b > IMG').attr('src', 'images/residences-2b2.jpg');
		    $('#residences-2C > .columnImage > IMG').attr('src', 'images/residences-2c.jpg');
		   	
		   	$('#homeContentHolder > IMG').waitForImages(function() {
    			$('#homeContentHolder > IMG').fadeIn(500, 'easeOutQuad'); 
			});
			
			$('#residenceBuildingFloors').waitForImages(function() {
    			$('#residenceBuildingFloors').delay(500).animate({'opacity': 1}, 500, 'easeOutQuad');
			});
			
			$('#section1').waitForImages(function() {
    			$('#section1').delay(500).animate({'opacity': 1}, 500, 'easeOutQuad');
    			$('#amenities-A').delay(700).fadeIn(500, 'easeOutQuad');
    			$('#amenities-Top').delay(1000).fadeIn(500, 'easeOutQuad');
    			$('#amenities-B').delay(1300).fadeIn(500, 'easeOutQuad');
    			$('#amenities-C').delay(1600).fadeIn(500, 'easeOutQuad'); 
			});
			
		    $('#section2').waitForImages(function() {
    			$('#section2').delay(500).animate({'opacity': 1}, 500, 'easeOutQuad');
    			$('#section2Separator').delay(500).fadeIn(500, 'easeOutQuad');
    			$('#amenities-2A').delay(700).fadeIn(500, 'easeOutQuad');
    			$('#amenities-2B').delay(1000).fadeIn(500, 'easeOutQuad');
    			$('#amenities-2C').delay(1300).fadeIn(500, 'easeOutQuad'); 
    			$('#theFooter').delay(1500).animate({'opacity': 1}, 500, 'easeOutQuad');
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			if( $("#error").html() != "") {
				$('body').css('overflow', 'hidden');
				$("#theContactHolder").show();
		    }
		});
	</script>
	<script type="text/javascript">
		<?
			if(isset($return) && $return == "SUCCESS"){
				$myFun = '
				$(document).ready(function(){
					$("input").each(function(){$(this).val("");});
				});
				';
				echo $myFun;
			}
		?>
	</script>
	
</head>

<body>

<div id="theContactHolder">
	<div class="contactform-frame">
		<div id="contactformFrameBorder">

	            	<div id="backToPage">
	            		<img style="float:right;margin-left:5px;margin-top:4px;" src="images/closeBTN.png" width="10" height="8"/>
	            		<div style="float:right;margin-top:2px;">BACK TO FORM</div>
	            		<div class="clearFloat"></div>
	            	</div>
	                <div id="popupForm">
	                <?php if(! isset($return) || $return != "SUCCESS"): ?>
	                	<div id="popupHeadline">STAY CONNECTED</div>
	                	<form id="register" name="register" method="post">
	        				<div class="contactRow">
	        					<div class="form-label">First & Last Name*</div>
	        					<input id="firstname" name="formdata_name" type="text">
	        					<div style="clear:both"></div>
	        				</div>
	        				
	                        <div class="contactRow">
	                        	<div class="form-label">Email Address*</div>
	                        	<input id="email" name="formdata_email" type="email">
	                        	<div style="clear:both"></div>
	                        </div>
	                        <div class="contactRow">
	                        	<div class="form-label">Phone</div>
	                        	<input id="phone" name="formdata_phone" type="tel">
	                        	<div style="clear:both"></div>
	                        </div>
	                        <div class="contactRow">
	                        	<div class="form-label">How Did You Hear<BR>About Us?</div>
	                        	<input id="type" name="formdata_residence" type="text">
	                        	<div style="clear:both"></div>
	                        </div>
	                        <div class="contactRow">
	                        	<div class="form-label">Comments</div>
	                        	<input id="comments" name="formdata_comments" type="text">
	                        	<div style="clear:both"></div>
	                        </div>
	        			
		        			<div class="required-and-submit clearfix">
		        			<!-- input fields for google conversions -->
							<input type="hidden" value="" name="formdata_medium">
							<input type="hidden" value="" name="formdata_campaign">
							<input type="hidden" value="" name="formdata_keyword">
							<input type="hidden" value="" name="formdata_keyword_source">
							<input type="hidden" value="" name="formdata_keyword_medium">
							<input type="hidden" value="Contact Page" name="formdata_form_name">
		        				<div class="requestSubmit" id="formSubmitBTN">SUBMIT</div>
		        				<div class="required">* Required Field</div>
		        				<div class="clearFloat"></div>
		        			</div>
	                  </form>	
	                  <?php endif ?>
	                  <?
						if(isset($return) && $return != "" && $return != "SUCCESS"){
							print "<div id='error' style='margin-left:130px;margin-top:20px;font-size:14px;font-weight:bold;color:#042859;'>".urldecode($return)."</div>";
						} else if(isset($return) && $return == "SUCCESS"){
							print "<div style='left:0px;text-align:center;font-size:18px;padding-top:15px;color:#042859;font-family: 'gotham_htfbook';' id='error'>Thank You For Your Inquiry!<BR>Your information has been received.</div>";
							print( "<style type='text/css'>
								#directionsButton {
									margin-left: 97px;
									margin-top: 20px;
								}
								</style>" );
						} else {
							print "<div id='error'></div>";
						}
					  ?>
	                
	                </div>
	                <div style="clear:both"></div>

		</div>
	</div>
</div>

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

<div id="homeContent">
	<div id="homeContentHolder">		
		<div class="sectionHolder">
		<div id="residenceBuildingSelector">
        	
        	<div id="residenceBuildingNavigation">
        		<div class="floorplans-floorSelector fpUnselected" id="fpBTN-7"><a href="#">Penthouse</a></div>
        		<div class="floorplans-floorSelector fpUnselected" id="fpBTN-6"><a href="#">Floor - 7</a></div>
        		<div class="floorplans-floorSelector fpUnselected" id="fpBTN-5"><a href="#">Floor - 6</a></div>
        		<div class="floorplans-floorSelector fpUnselected" id="fpBTN-4"><a href="#">Floor - 5</a></div>
        		<div class="floorplans-floorSelector fpUnselected" id="fpBTN-3"><a href="#">Floor - 4</a></div>
        		<div class="floorplans-floorSelector fpUnselected" id="fpBTN-2"><a href="#">Floor - 3</a></div>
        		<div class="floorplans-floorSelector fpUnselected" id="fpBTN-1"><a href="#">Floor - 2</a></div>
        	</div>    	
        	        			
    	</div>
    	
    		<div id="residenceBuildingFloors">
	        	<div class="buildingFloor" id="floor-open"><img src="images/floorplans/building-floor-open.png" alt="building-open" width="1480" height="460" /></div>
	        	<div class="buildingFloor" id="floor-2"><img src="images/floorplans/building-floor2.png" alt="building-2" width="1480" height="460" /></div>
	        	<div class="buildingFloor" id="floor-3"><img src="images/floorplans/building-floor3.png" alt="building-3" width="1480" height="460" /></div>
	        	<div class="buildingFloor" id="floor-4"><img src="images/floorplans/building-floor4.png" alt="building-4" width="1480" height="460" /></div>
	        	<div class="buildingFloor" id="floor-5"><img src="images/floorplans/building-floor5.png" alt="building-5" width="1480" height="460" /></div>
	        	<div class="buildingFloor" id="floor-6"><img src="images/floorplans/building-floor6.png" alt="building-6" width="1480" height="460" /></div>
	        	<div class="buildingFloor" id="floor-7"><img src="images/floorplans/building-floor7.png" alt="building-7" width="1480" height="460" /></div>
	        	<div class="buildingFloor" id="floor-8"><img src="images/floorplans/building-floor-penthouse.png" alt="building-8" width="1480" height="460" /></div>
        	</div> 
    	
        <div id="selectAFloorHeadline">SELECT A FLOOR</div>
		</div>
	</div>
</div>

<div id="theContents">

	
	
	<div class="sectionHolder">
		
		<div class="floorplansEntry" id="floorplanEntry1">
			<div class="floorplansEntryInformation">
				<div class="floorplansEntryTopText">
	        		<div class="floorplansEntryHeadline">THIRD<BR>FLOOR LOFT</div>
	        		<div class="floorplansInformation">LOFT / 1 BATHROOM</div>
	        		<div class="floorplansFeatures">
	        			<div class="floorplansResidenceFeatures">
	        				<div class="floorplansBuildingFeaturesHeadline">RESIDENCE FEATURES</div>
	        				<div class="floorplansFeauresCol">
	        				<ul>
	        					<li>17-foot ceiling heights</li>
	        					<li>New 13-foot, insulated windows</li>
	        					<li>Original architectural features</li>
	        					<li>Gourmet kitchens with stainless steel appliances, granite counter tops, glass tile backsplash and custom cabinetry</li>
	        					<li>Exposed columns and beams</li>
	        				</ul>
	        				</div>
	        				<div class="floorplansFeauresCol">
	        				<ul>
	        					<li>Polished concrete floors</li>
	        					<li>Laundry in every home</li>
	        					<li>Sustainable LEED design</li>
								<li>Energy-efficient systems</li>
								<li>Wi-Fi pre-wiring</li>
	        				</ul>
	        				</div>
	        			</div>
	        			<div class="clearFloat"></div>
	        		</div>
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
        
        <div class="sectionSeparator" id="section2Separator"></div>
        
        <div class="floorplansEntry" id="floorplanEntry2">
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
