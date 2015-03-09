$(document).ready(function(){

/* Show jQuery is running */
$('#map').zoommap({
		// Width and Height of the Map
		width: '710px',
		height: '490px',
			
		//Misc Settings
		blankImage: 'images/blank.gif',
		zoomDuration: 100,
		bulletWidthOffset: '10px',
		bulletHeightOffset: '10px',
		
		//ids and classes
		zoomClass: 'zoomable',
		popupSelector: 'div.state-popup',
		popupCloseSelector: 'a.close',
		
		//Return to Parent Map Link
		showReturnLink: true,
		returnId: 'returnlink',
		returnText: '',
		
		//Initial Region to be shown
		map: {
			id: 'value',
			image: 'images/parkwayMap-back.png',
			data: 'popups/campus.html'
		}
	});


});
