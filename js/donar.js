// Every time a modal is shown, if it has an autofocus element, focus on it.
var historia;
$('.modal').on('shown.bs.modal', function() {
    $(this).find('[autofocus]').focus();
});
        
function setinfo(id,nombre){
    historia = id;
    nombre = nombre;
    document.getElementById('nombre').firstChild.data = nombre;
}
        
function focusOnInput() {
    document.getElementById('correo_donador').focus();
}

$('#donar').submit(function(e){
    e.preventDefault();
    if(historia){
        //alert('donativo?ahijado='+historia+'&donador='+document.getElementById('correo_donador').value);
        window.location.href = 'donativo?ahijado='+historia+'&donador='+document.getElementById('correo_donador').value; 
    }else{
       // alert('donativo?donador='+document.getElementById('correo_donador').value);
        window.location.href = 'donativo?donador='+document.getElementById('correo_donador').value;
    }

}); 