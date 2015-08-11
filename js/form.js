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