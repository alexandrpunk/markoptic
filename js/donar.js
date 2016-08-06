//variables globales 
historia='';
id='';

$(function() {
    //redirecciona el modla del boton de solicitar recibo al formulario
    $('#donar').submit(function(e){
    event.preventDefault();
    event.stopImmediatePropagation();
    window.location.href = 'donativo?donador='+$('#correo').val();
    });
    
    //hace que funcione el autofocus en le modal
    $('.modal').on('shown.bs.modal', function(){$(this).find('[autofocus]').focus();});
});
    
//pone nombre de la historia en los enlaces y el modal
function setinfo(nombre_hist,id_hist){
    historia = nombre_hist;
    id = id_hist;
    x = document.getElementsByClassName("nombre_hist");
    for (i = 0; i < x.length; i++) {
        x[i].innerHTML = historia;
    }
};

//revisa si el correo que se ingreso ya esta registrado como donador        
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
                        registro = true;
                        }else{
                        registro = false; 
                        $('#nombre').prop('readonly', false);
                        }                  
                }
            }
        });
    }
    //al hacer submit se envian los datos a la funcion que registra la intencion de apadrinamiento
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
        "nombre"  : $('#nombre').val(),
        "correo"  : $('#correo').val(),
        "page"    : id,
        "historia": historia
    };
    
    if(!registro){
        parametros.proceso = 2;
    }else{
        parametros.proceso = 3;       
    }
    
    $.ajax({
        data:  parametros,
        dataType: 'json',
        url:   $('#registro').attr('action'),
        type:  'post',
        success: function (data) {
            if(data.hasOwnProperty('error')){
                console.log("Ocurrio un error: "+data.error_message);
            }else{
                mostrar_metodos();
            }
        }
    }); 
}
    
function mostrar_metodos(){
    $("#rlink").attr("href", 'donativo?ahijado='+id+'&donador='+$('#correo').val());
    $("#preregistro").fadeOut();
    $("#info").fadeIn();
}