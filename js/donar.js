//variables globales 
historia='';
id='';

$(function() {
    $('#donar').submit(function(e){
    e.preventDefault();
    window.location.href = 'donativo?donador='+$('#correo').val();
    console.log( "vamonos al formulario" );});
    
    //hace que funcione el autofocus en le modal
    $('.modal').on('shown.bs.modal', function(){$(this).find('[autofocus]').focus();});
});
    
//pone nombre de la historia en los enlaces y el modal
function setinfo(nombre_hist,id_hist){
    historia = nombre_hist;
    id = id_hist;

    x = document.getElementsByClassName("nombre_hist");
    console.log("id a apadrinar: "+id);
    for (i = 0; i < x.length; i++) {
        x[i].innerHTML = historia;
    }
};

        
function verificar(){
    var parametros = {
        "proceso" : 1,
        "correo"  : $('#correo').val()
    };
    
    if(parametros.correo.length >= 6){
        
        $.ajax({
            data:  parametros,
            dataType: 'json',
            url:   $('#registro').attr('action'),
            type:  'post',
            beforeSend:function(){
                $('#nombre').prop('readonly', true);
            },
            success:  function (data) {
                $('#btn-siguiente').prop('disabled', false);
                if(data.hasOwnProperty('error')){
                    console.log("correo incorrecto: "+data.error_message);
                }else{
                    if(data.hasOwnProperty('nombre')){
                        document.getElementById("nombre").value = data.nombre;
                        console.log("se proceso la informacion\n");
                        console.log("nombre del donador: "+data.nombre);
                        console.log("id del donador: "+data.id);
                        console.log("id a apadrinar: "+id);
                        registro = true;
                        }else{
                        registro = false; 
                        $('#nombre').prop('readonly', false);
                        }                  
                }
            }
        });
    }
    $('#registro').on('submit',function(event){
        registrar(registro);
       
        event.preventDefault();
        event.stopImmediatePropagation();
    });
}
    
function registrar(registro){
    $('#nombre').attr('readonly', true);
    $('#correo').attr('readonly', true);
    
    var parametros = {
        "proceso" : 2,
        "nombre"  : $('#nombre').val(),
        "correo"  : $('#correo').val(),
        "page"    : id,
        "historia": historia
    };
    
    if(!registro){
         console.log("Se registra el nuevo donador y se guarda la relacion");
        $.ajax({
            data:  parametros,
            dataType: 'json',
            url:   $('#registro').attr('action'),
            type:  'post',
            success: function (data) {
                console.log("salida:"+data.message);
                mostrar_metodos();
            }
        }); 
    }else{
        parametros.proceso = 3;
        console.log("Se registra la relacion");

        $.ajax({
            data:  parametros,
            dataType: 'json',
            url:   $('#registro').attr('action'),
            type:  'post',
            success: function (data) {
                if(data.hasOwnProperty('error')){
                    console.log("Ocurrio un error: "+data.error_message);
                }else{
                    console.log("salida:"+data.message);
                    mostrar_metodos();
                }
            }
        });        
    }
    
}
    
function mostrar_metodos(){
    $("#rlink").attr("href", 'donativo?ahijado='+id+'&donador='+$('#correo').val());
    $("#preregistro").fadeOut();
    $("#info").fadeIn();
}