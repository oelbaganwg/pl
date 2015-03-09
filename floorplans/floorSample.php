<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
</head>

<body>

<div id="viewportHolder">
	<div id="zoomerLegend">
		<div class="zoom" id="zoomIn" style="margin-right:20px;">Zoom In</div><div class="zoom" style="margin-right:20px;"> | </div><div class="zoom" id="zoomOut" style="margin-right:20px;">Zoom Out</div><div class="zoom" style="margin-right:20px;"> | </div><div class="zoom" id="closeBTN">Close</div>
	</div>
	<div id="mouseTip">Click anywhere to zoom in</div>
	<div class="viewport floorplanViewport"> 
		<div id="movingViewport">
			<img src="images/floorplans/sampleFloorplan.png" id="movingViewportImage" width="2000" height="3000" />
		</div>
	</div> 
	
</div>

<div id="zoomClicker"></div>
<script type="text/javascript">

	$(document).ready(function(){
		sizer();
    });
    $(window).resize(function(){
		sizer();
    });
    
    var trackInitialization = false;
    var zoomed = false;
    
    	
    
    function sizer(){
    	
		
		var newWidth = $(window).width() - 100;
		var newHeight = $(window).height() - 100;
		
		$('#viewportHolder').css({
      		width: newWidth, 
      		height: newHeight,
      		marginLeft: '50px',
      		marginTop: '50px',
      		marginRight: '50px'
	    });
	    $('.viewport').css({
      		width: newWidth, 
      		height: newHeight,
      		overflow: 'hidden'
	    });
	    $('#movingViewport').css({
      		width: newWidth, 
      		height: newHeight,
      		overflow: 'hidden'
	    });
	    
	    if(trackInitialization == false){
			trackInitialization = true;
			$('#floorplansInHere').fadeIn();
		}			
		
		
			
		var imageRatio = 2000 / 3000;
		var windowRatio = newWidth / newHeight;

		if((newWidth/newHeight) <= imageRatio){
			
			if(zoomed == false){
				var newImageWidth = newWidth;
				var newImageHeight = newImageWidth / imageRatio;
				var imageTopMargin = (newHeight - newImageHeight) / 2;
				var imageSideMargin = 0;
			} else {
				var newImageWidth = newWidth * 2;
				var newImageHeight = (newImageWidth / imageRatio);
				var imageTopMargin = (newHeight - newImageHeight) / 2;
				var imageSideMargin = (newWidth - newImageWidth) / 2;
			}
			
		} else {
		
			if(zoomed == false){
				var newImageHeight = newHeight;
				var newImageWidth = newImageHeight * imageRatio;
				var imageTopMargin = (newHeight - newImageHeight) / 2;
				var imageSideMargin = (newWidth - newImageWidth) / 2;
			} else {
				var newImageHeight = newHeight * 2;
				var newImageWidth = (newImageHeight * imageRatio);
				var imageTopMargin = (newHeight - newImageHeight) / 2;
				var imageSideMargin = (newWidth - newImageWidth) / 2;
			}
			
		}
		
		var pano  = $("#movingViewport"),
        panoImg   = $("#movingViewportImage"),
        w         = panoImg.width() + 100,
        panoWidth = $(window).width(), // this is the width of the container in pixels
        h		  = panoImg.height() +100,
        panoHeight= $(window).height(),
        cx        = (w-panoWidth)/panoWidth,
        cy        = (h-panoHeight)/panoHeight,
        lastx     = 0,
        lasty     = 0;
		
		pano.css({width  : $(window).width() - 100,height : $(window).height() - 100,overflow : 'hidden'}).mousemove(function(e){
		
            if(zoomed == true){
            	var x = e.pageX-pano.offset().left; // mouse x coordinate relative to the container
	           	var y = e.pageY-pano.offset().top; // mouse y coordinate relative to the container
	           	if (Math.abs(lastx-x)<=1 || Math.abs(lasty-y)<=1) return; // only do something if the mouse X coordinate moved more than 1 pixel
	        	lastx = x;      
	        	cx        = (w-panoWidth)/panoWidth;
        		cy        = (h-panoHeight)/panoHeight;        
		        panoImg.css({ marginLeft : -cx*x, marginTop : -cy*y });
            }
            
        });
		if((newWidth/newHeight) <= imageRatio){
			$('#movingViewportImage').css({
				width: newImageWidth,
				height: newImageHeight,
				marginTop: imageTopMargin,
				marginLeft: '0px'
			});
		} else {
			$('#movingViewportImage').css({
				width: newImageWidth,
				height: newImageHeight,
				marginTop : '0px',
				marginLeft: imageSideMargin
			});
		}
			
    }
    $('#zoomIn').mousedown(function() {
    	zoomed = true;
    	sizer();
    	$(window).trigger("resize");
    });
    $('#zoomOut').mousedown(function() {
    	zoomed = false;
    	sizer();
    });
    $("#zoomClicker").click(function(){
		$('#floorplansHolder').fadeOut(200, 'easeOutQuad', function(){
			$('#floorplansInHere').html('');
			$('body').css('overflow', 'auto');
		});
	});
	
	$(".viewport").mousemove(function(e) { 
		$('#mouseTip').css('left', e.pageX + 10).css('top', e.pageY - 10).css('display', 'none');
	});
	$(".viewport").mouseout(function() { 
	    $('#mouseTip').css('display', 'none');
	});
	$(".viewport").mousedown(function(e) {
		if(zoomed == true){
			$('#mouseTip').html('Click anywhere to zoom in');
			$('#zoomOut').trigger('mousedown');
		} else {
			$('#mouseTip').html('Click anywhere to zoom out');
			$('#zoomIn').trigger('mousedown');
		}
	});
	
	$("#closeBTN").click(function(){
		$('#floorplansHolder').fadeOut(200, 'easeOutQuad', function(){
			$('#floorplansInHere').html('');
			$('body').css('overflow', 'auto');
		});
	});
    
    sizer();
</script>
    
</body>
</html>