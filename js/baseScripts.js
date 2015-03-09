jQuery(function($){

	$transitionTime = 500;
	$transitionTimeOut = 200;
	$transitionVariable = 'easeOutQuad';

	var URL = window.location.pathname; // Gets page name
	var page = URL.substring(URL.lastIndexOf('/') + 1);
	var propertyURL = URL.replace('parkwaylofts/', '');  
	console.log(propertyURL);
	
	$(document).ready(function() {	
		
		$("#getDirectionsBTN").click(function(e) {
			$('body').css('overflow', 'hidden');
			$("#theDirectionsHolder").fadeIn(500, 'easeOutQuad');
			e.preventDefault();
			return false;
		});
		
		$('#formSubmitBTN').click(function() {
			var postData = $('#register').serialize();
			console.log( postData );
			
		   	 $.ajax({
		        type: 'POST',
		        data: postData,
		        url: 'http://parkwaylofts.com/appRequest.php',
		        success: function(data){
		            console.log(data);
		            alert('Your comment was successfully added');
		        },
		        error: function(data){
		            console.log(data);
		            alert('There was an error adding your comment');
		        }
		    });
	
		    return false;
			
		
		});
		
		$("#becomeVipBTN").click(function(e) {
			$('body').css('overflow', 'hidden');
			$("#theContactHolder").fadeIn(500, 'easeOutQuad');
			$('.contactform-frame').vAlign();
			e.preventDefault();
			return false;
		});
		
		$("#backToForm").click(function(e) {
			$("#theDirectionsHolder").fadeOut(500, 'easeOutQuad');
			$('body').css('overflow', 'auto');
			e.preventDefault();
			return false;
		});
		
		$("#backToPage").click(function(e) {
			$("#theContactHolder").fadeOut(500, 'easeOutQuad');
			$('body').css('overflow', 'auto');
			e.preventDefault();
			return false;
		});
		
		$('#fromNorth').click(function(){
			$('#directionsSlider').animate({'margin-left':'-417px'});
		});
	
		$('#fromSouth').click(function(){
			$('#directionsSlider').animate({'margin-left':'0px'});
		});
		
		/*
$('.homeCell').hover(function() 
			{
				$(".home-tag", this).fadeIn(500, 'easeOutQuad');
				$(".home-tag IMG", this).css('top', '30px');
				$(".home-tag IMG", this).animate({'top':'0px'}, 500, 'easeOutQuad');
			}, function() {
				$(".home-tag", this).fadeOut(250, 'easeOutQuad');
				$(".home-tag IMG", this).animate({'top':'-30px'}, 250, 'easeOutQuad');
			}
		);
*/
		
		$('.unselectedNav').hover(function(){
			$(".navBTNText a", this).animate({'top':'-26px'}, 200, 'easeOutQuad');
			$(".navBackOver", this).animate({'opacity':1}, 200, 'easeOutQuad');
		}, function() {
			$(".navBTNText a", this).animate({'top':'0px'}, 200, 'easeInQuad');
			$(".navBackOver", this).animate({'opacity':0}, 100, 'easeInQuad');
		});
		
		resizer();
		repositionClips();	
		
	});
	
	
	$(window).resize(function() {	
		resizer();
		repositionClips();	
	});
	
	$(window).scroll(function() {	
	
	});	
	
	function repositionClips(){
		
		var outerHeight = $(window).outerHeight();
		
		var outerWidth = $(window).outerWidth();
		var newPos = (outerWidth - 1480) / 2;
		
		if(outerWidth >= 980 && outerWidth <= 1480){
			$('#homeContentHolder').css('left', newPos);
		} else if(outerWidth >= 1480){
			$('#homeContentHolder').css('left', '0px');
		} else if(outerWidth <= 980){
			$('#homeContentHolder').css('left', '-250px');
		}
		
	}
	
	function resizer(){
		$('.contactform-frame').vAlign();
		if(propertyURL == '/contact-us.html'){
			$('.form-frame').vAlign();
		}
	}
			
});