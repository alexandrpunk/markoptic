$(document).ready(function(){

$(function(){

	$(document).on( 'scroll', function(){
 
		if ($(window).scrollTop() > 50) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});
 
	


});

$('.scroll-top-wrapper').on('click', scrollToTop);
$('.play-wrapper').on('click', spotPlay);
$('.pause-wrapper').on('click', spotPause);

var URLactual = window.location;
if (URLactual == "http://fundacionmarkoptic.org.mx/") {
	document.getElementById('player').play();
	$('.play-wrapper').addClass('hidden');
	$('.pause-wrapper').removeClass('hidden');
};

var aud = document.getElementById('player');
aud.addEventListener("ended", function() {
    $('.pause-wrapper').addClass('hidden');
	$('.play-wrapper').removeClass('hidden');
});





});


function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop-70}, 150, 'linear');
}

function spotPlay(){
	document.getElementById('player').play();
	$('.play-wrapper').addClass('hidden');
	$('.pause-wrapper').removeClass('hidden');
}

function spotPause(){
	document.getElementById('player').pause();
	$('.pause-wrapper').addClass('hidden');
	$('.play-wrapper').removeClass('hidden');
}


