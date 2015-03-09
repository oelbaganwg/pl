$(document).ready(function() {


	$('.mapItem').corner();
	
	$('.mapItem').hover(
		function() {
			$(this).removeClass('mapItemUnselected');
			$(this).addClass('mapItemSelected');
		}, function() {
			$(this).removeClass('mapItemSelected');
			$(this).addClass('mapItemUnselected');
		}
	);
		
	$("#viewBTN-West").click(function(e) {
		$('#viewEast').fadeOut();
		$('#viewWest').fadeIn();
		$("#viewBTN-West").removeClass('viewBTNUnselected');
		$("#viewBTN-West").addClass('viewBTNSelected');
		$("#viewBTN-East").removeClass('viewBTNSelected');
		$("#viewBTN-East").addClass('viewBTNUnselected');
	});
	
	$("#viewBTN-East").click(function(e) {
		$('#viewWest').fadeOut();
		$('#viewEast').fadeIn();
		$("#viewBTN-East").removeClass('viewBTNUnselected');
		$("#viewBTN-East").addClass('viewBTNSelected');
		$("#viewBTN-West").removeClass('viewBTNSelected');
		$("#viewBTN-West").addClass('viewBTNUnselected');
	});

});
