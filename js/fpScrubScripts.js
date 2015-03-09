jQuery(function($){

		loadBuilding();        

	    function loadBuilding(){
	    	totalFrames = 41;
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
		    e.src = "frames/earth_000001.png";
			e.onload = function(){
		        $("#theEarth").delay(750).fadeIn(1500); 
		        $("#preloader").delay(500).fadeOut(750); 
		    }
	    }
			
});