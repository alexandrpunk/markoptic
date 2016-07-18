$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
        
$('input[type=number]').on('mousewheel', function(){
    var el = $(this);
    el.blur();
    setTimeout(function(){
    el.focus();
    }, 10);
})

function refreshCaptcha() {
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}