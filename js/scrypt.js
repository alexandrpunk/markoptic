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



});


function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop-70}, 150, 'linear');
}


