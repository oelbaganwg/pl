/*
Javascript-video-scrubber Demo
Created by Gary Hepting and the Dev Team at Emerge Interactive
Fork, follow and watch on Github at https://github.com/ghepting/javascript-video-scrubber
Visit Emerge Interctive at http://emergeinteractive.com/
*/

var step = 1; // visible frame
var targetStep = 1; // frame to animate to
var images = new Array; // stores all of the frames for quick access
var scrollPos; // scroll position of the window
var totalFrames = 30; // the number of images in the sequence of JPEG files (this could be calculated server-side by scanning the frames folder)
var pageY = 1;

window.requestAnimFrame = (function(){ // reduce CPU consumption, improve performance and make this possible
  return  window.requestAnimationFrame       || 
		  window.webkitRequestAnimationFrame || 
		  window.mozRequestAnimationFrame    || 
		  window.oRequestAnimationFrame      || 
		  window.msRequestAnimationFrame     || 
		  function( callback ){
			window.setTimeout(callback, 1000 / 120);
		  };
})();

(function animloop(){ // the smoothest animation loop possible
  	requestAnimFrame(animloop);
  	targetStep = Math.max( Math.round( pageY / 30 ) , 1 ); // what frame to animate to
  	if(targetStep != step ) { 
		step += (targetStep - step) / 5; 
	} // increment the step until we arrive at the target step
  	changeFrame();
})();

function changeFrame() {
	
	var thisStep = Math.round(step); // calculate the frame number
	
	if(images.length > 0 && images[thisStep]) { // if the image exists in the array
		if(images[thisStep].complete) { // if the image is downloaded and ready
			if($('#video').attr('src') != images[thisStep].src) { // save overhead...?
				$('#video').attr('src',images[thisStep].src); // change the source of our placeholder image
			}
		}
	}
	
}

function getYOffset() { // get distance scrolled from the top
    
	if(typeof(window.pageYOffset)=='number') {
		pageY=window.pageYOffset;
	}else{
		pageY=document.documentElement.scrollTop; // IE
	}
	
	return pageY;
}

function pad(number, length) { // pad numbers with leading zeros for JPEG sequence file names
	var str = '' + number; while (str.length < length) { str = '0' + str; } return str;
}

$(document).ready(function() {
	$('#leftBTN').mouseover(function() {	
		pageY = 1; 
	});
	$('#rightBTN').mouseover(function() {	
		pageY = 1000; 
	});
	pageY = 500; 
});