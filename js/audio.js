$(document).ready(function(){

	document.getElementById('player').play();
	$('.play-wrapper').addClass('hidden');
	$('.pause-wrapper').removeClass('hidden');


$('.play-wrapper').on('click', spotPlay);
$('.pause-wrapper').on('click', spotPause);


var aud = document.getElementById('player');
aud.addEventListener("ended", function() {
    $('.pause-wrapper').addClass('hidden');
	$('.play-wrapper').removeClass('hidden');
});



});


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