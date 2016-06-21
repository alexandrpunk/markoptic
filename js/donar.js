// hace que funcione el autofocus en le modal
var historia;
$('.modal').on('shown.bs.modal', function() {
    $(this).find('[autofocus]').focus();
});
 
//pone el id y el nombre de la historia en los enlaces y el modal
function setinfo(id,nombre){
    historia = id;
    nombre = nombre;

    x = document.getElementsByClassName("nombre_hist");
    for (i = 0; i < x.length; i++) {
        x[i].innerHTML = nombre;
    }
    document.getElementById('registro').onclick = function(){registrar($('#nombre').val(), $('#correo').val(), id, nombre); return false; } ;
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
