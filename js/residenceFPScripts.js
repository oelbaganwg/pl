jQuery(function($){

	loadBuilding();        

    function loadBuilding(){
    	var d = new Image();
	    d.src = "images/rotatingBuilding/parkwaylofts_wireframe0000.jpg";
		d.onload = function(){
	        for(i = 0; i < totalFrames; i++) { // loop for each image in sequence
				images[i] =  new Image(); // add image object to array
				images[i].src = "images/rotatingBuilding/parkwaylofts_wireframe"+pad(i, 4)+".jpg"; // set the source of the image object
			}  
			loadBuildingFirstFrame();
	    }
    }
    function loadBuildingFirstFrame(){
    	var e = new Image();
	    e.src = "frames/rotatingBuilding/parkwaylofts_wireframe0000.jpg";
		e.onload = function(){}
    }



$(document).ready(function() {

	$('.floorplans-floorSelector').mouseenter(function() {
		$('.fpSelected').removeClass('fpSelected').addClass('fpUnselected'); /* remove focus state from all input elements */
    	$(this).removeClass('fpUnselected').addClass('fpSelected');
		var rawId = $(this).attr('id');
		var currentId = parseInt(rawId.replace('fpBTN-','') );
		var absoId = currentId + 1;
		$("#residenceBuildingFloors").slides("slide",absoId);
	});
	
	$("a.fpEnlargeBTN").click(function(e) {
		$('body').css('overflow', 'hidden');
		$('#floorplansInHere').hide();
		$("#floorplansHolder").fadeIn(200, 'easeOutQuad');
		$("#floorplansLoader").show();
		var urlToUse = $(this).attr('href');
		
		$('#floorplansInHere').load(urlToUse, removePreloader);
				
		
		e.preventDefault();
		return false;
	});
	
	function removePreloader(){
   		$('#floorplansInHere').delay(200).fadeIn(200, 'easeOutQuad');
   		$('#floorplansLoader').delay(200).fadeOut(200, 'easeOutQuad');
	}
	
			
	
});


});