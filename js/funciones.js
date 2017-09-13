$(document).ready(function() {
    $('#adjunto1').change(function(){
        $('#adjunto2').removeAttr('disabled');
    });
    $('#adjunto2').change(function(){
        $('#adjunto3').removeAttr('disabled');
    });
    
    $('#peticion').change(function() {
    	var select = document.getElementById("peticion").value;
    	if (select == 'Protesis') {
            $("#aviso_solicitud").modal('show');
    		document.getElementById("form-solicitud-seccion1-1").className= "form-group";
    	}
    	else{
    		document.getElementById("form-solicitud-seccion1-1").className= "form-group hidden";
    	}
    });

    $('#pais').change(function() {
    	document.getElementById("estado").disabled = true;
		var id_pais= document.getElementById("pais").value;
		$('#estado').load('inc/estados.php?id_pais='+id_pais);
		document.getElementById("estado").disabled = false;
	});

	$('#estado').change(function() {
		document.getElementById("ciudad").disabled = true;
		var id_estado= document.getElementById("estado").value;
		$('#ciudad').load('inc/localidades.php?id_estado='+id_estado);
		document.getElementById("ciudad").disabled = false;
	});

	$('#t_pais').change(function() {
		document.getElementById("t_estado").disabled = true;
		var id_pais= document.getElementById("t_pais").value;
		$('#t_estado').load('inc/estados.php?id_pais='+id_pais);
		document.getElementById("t_estado").disabled = false;
	});

	$('#t_estado').change(function() {
		document.getElementById("t_ciudad").disabled = true;
		var id_estado= document.getElementById("t_estado").value;
		$('#t_ciudad').load('inc/localidades.php?id_estado='+id_estado);
		document.getElementById("t_ciudad").disabled = false;
	});

	$('#fecha_nac').change(function() {
		var fecha= document.getElementById("fecha_nac").value;

	    if(validate_fecha(fecha)==true) {
	        // Si la fecha es correcta, calculamos la edad
	        var values=fecha.split("-");
	        var dia = values[2];
	        var mes = values[1];
	        var ano = values[0];
	 
	        // cogemos los valores actuales
	        var fecha_hoy = new Date();
	        var ahora_ano = fecha_hoy.getYear();
	        var ahora_mes = fecha_hoy.getMonth()+1;
	        var ahora_dia = fecha_hoy.getDate();
	 
	        // realizamos el calculo
	        var edad = (ahora_ano + 1900) - ano;
	        if ( ahora_mes < mes ) {
	            edad--;
	        }
	        if ((mes == ahora_mes) && (ahora_dia < dia)) {
	            edad--;
	        }
	        if (edad > 1900) {
	            edad -= 1900;
	        }
	 
	        // calculamos los meses
	        var meses=0;
	        if(ahora_mes>mes)
	            meses=ahora_mes-mes;
	        if(ahora_mes<mes)
	            meses=12-(mes-ahora_mes);
	        if(ahora_mes==mes && dia>ahora_dia)
	            meses=11;
	 
	        // calculamos los dias
	        var dias=0;
	        if(ahora_dia>dia)
	            dias=ahora_dia-dia;
	        if(ahora_dia<dia)
	        { 
	            ultimoDiaMes=new Date(ahora_ano, ahora_mes, 0);
	            dias=ultimoDiaMes.getDate()-(dia-ahora_dia);
	        }
	 
	        document.getElementById("edad").value = edad;
	    }
	    else{
	        document.getElementById("edad").value="error";
	    }
	});

	$('#t_fecha_nac').change(function() {
		var fecha= document.getElementById("t_fecha_nac").value;
		
	    if(validate_fecha(fecha)==true) {
	        // Si la fecha es correcta, calculamos la edad
	        var values=fecha.split("-");
	        var dia = values[2];
	        var mes = values[1];
	        var ano = values[0];
	 
	        // cogemos los valores actuales
	        var fecha_hoy = new Date();
	        var ahora_ano = fecha_hoy.getYear();
	        var ahora_mes = fecha_hoy.getMonth()+1;
	        var ahora_dia = fecha_hoy.getDate();
	 
	        // realizamos el calculo
	        var edad = (ahora_ano + 1900) - ano;
	        if ( ahora_mes < mes ) {
	            edad--;
	        }
	        if ((mes == ahora_mes) && (ahora_dia < dia)) {
	            edad--;
	        }
	        if (edad > 1900) {
	            edad -= 1900;
	        }
	 
	        // calculamos los meses
	        var meses=0;
	        if(ahora_mes>mes)
	            meses=ahora_mes-mes;
	        if(ahora_mes<mes)
	            meses=12-(mes-ahora_mes);
	        if(ahora_mes==mes && dia>ahora_dia)
	            meses=11;
	 
	        // calculamos los dias
	        var dias=0;
	        if(ahora_dia>dia)
	            dias=ahora_dia-dia;
	        if(ahora_dia<dia) { 
	            ultimoDiaMes=new Date(ahora_ano, ahora_mes, 0);
	            dias=ultimoDiaMes.getDate()-(dia-ahora_dia);
	        }
	 
	        document.getElementById("t_edad").value = edad;
	    }
	    else{
	        document.getElementById("t_edad").value="error";
	    }
	});
});



$('#checkbox-tyc').on('click',function() {
	var check = this;
	if (check.checked == true) {
		document.getElementById("btn-enviar-solicitud").disabled = false;
	}
	else {
		document.getElementById("btn-enviar-solicitud").disabled = true;
	}

});
$('#btn-cont-ss1').on('click',function() {
	if (validacion1(true)) {
		document.getElementById("form-solicitud-seccion1").className= "hidden";
 		document.getElementById("form-solicitud-seccion2").className= "";
	};
});

$('#btn-cont-ss2').on('click',function() {
	//aqui ocupo validar si es menor de edad. Si es menor de edad de pasa a la seccion 5 automaticamente.
	if (validacion2(true)) {
		if (document.getElementById("edad").value < 18) {
			document.getElementById("form-solicitud-seccion2").className= "hidden";
 			document.getElementById("form-solicitud-seccion4").className= "";
		}
		else{
			document.getElementById("form-solicitud-seccion2").className= "hidden";
 			document.getElementById("form-solicitud-seccion3").className= "";
		}
	};
});

$('#btn-si-ss3').on('click',function() {
 	document.getElementById("form-solicitud-seccion3").className= "hidden";
 	document.getElementById("form-solicitud-seccion4").className= "";

});

$('#btn-no-ss3').on('click',function() {
 	document.getElementById("form-solicitud-seccion3").className= "hidden";
	document.getElementById("form-solicitud-seccion5").className= "";

});

$('#btn-cont-ss4').on('click',function()
{
	if (validacion3(true)) {
		document.getElementById("form-solicitud-seccion4").className= "hidden";
 		document.getElementById("form-solicitud-seccion5").className= "";
	};
});

$('#btn-cont-ss5').on('click',function() {
	if (validacion4(true)) {
		document.getElementById("form-solicitud-seccion5").className= "hidden";
 		document.getElementById("form-solicitud-seccion6").className= "";
	};
});

$('#btn-volver-ss2').on('click',function() {
	document.getElementById("form-solicitud-seccion2").className= "hidden";
	document.getElementById("form-solicitud-seccion1").className= "";
});

$('#btn-volver-ss4').on('click',function() {
	document.getElementById("form-solicitud-seccion4").className= "hidden";
	document.getElementById("form-solicitud-seccion2").className= "";
});

$('#btn-volver-ss5').on('click',function() {
	document.getElementById("form-solicitud-seccion5").className= "hidden";
	document.getElementById("form-solicitud-seccion4").className= "";
});

$('#btn-volver-ss6').on('click',function() {
	document.getElementById("form-solicitud-seccion6").className= "hidden";
	document.getElementById("form-solicitud-seccion5").className= "";
});


function funcionEnviar() {
	document.getElementById("btn-enviar-solicitud").value = "Enviando..";
	document.getElementById("btn-enviar-solicitud").disabled = true;
}

function validacion1() {
	peticion = document.getElementById("peticion").value;


	if (peticion.length == 0) {
    	alert('Seleccione su peticion');
        return false;
    }

    if(peticion == 'Protesis' && !document.getElementById('chkop1').checked && !document.getElementById('chkop2').checked && !document.getElementById('chkop3').checked && !document.getElementById('chkop4').checked) {
        alert("Seleccione al menos una opcion de protesis");
        return false;
    }
    return true;
}

function validacion2() {
	var nombre = document.getElementById("nombre").value;
	var apellido = document.getElementById("apellido").value;
	var sexo = document.getElementById("sexo").value;
	var fecha_nac = document.getElementById("fecha_nac").value;
	var edad = document.getElementById("edad").value;
	var pais = document.getElementById("pais").value;
	var estado = document.getElementById("estado").value;
	var ciudad = document.getElementById("ciudad").value;
	var direccion = document.getElementById("direccion").value;
	var colonia = document.getElementById("colonia").value;
	var cp = document.getElementById("cp").value;
	var telefono = document.getElementById("telefono").value;
	var email = document.getElementById("email").value;

	if (nombre.length == 0) {
    	alert('Ingrese su nombre');
        return false;
    }
    if (apellido.length == 0) {
    	alert('Ingrese su apellido');
        return false;
    }
    if (sexo.length == 0) {
    	alert('Seleccione su sexo');
        return false;
    }
    if (fecha_nac == "") {
    	alert('Ingrese su fecha de nacimiento');
        return false;
    }
    if (pais.length == 0) {
    	alert('Seleccione su país');
        return false;
    }
    if (estado.length == 0) {
    	alert('Seleccione su estado');
        return false;
    }
    if (ciudad.length == 0) {
    	alert('Seleccione su ciudad o localidad');
        return false;
    }
    if (direccion.length == 0) {
    	alert('Ingrese su dirección');
        return false;
    }
    if (colonia.length == 0) {
    	alert('Ingrese su colonia');
        return false;
    }
    if (cp.length == 0) {
    	alert('Ingrese su código postal');
        return false;
    }
    if (telefono.length == 0) {
    	alert('Ingrese su teléfono');
        return false;
    }
    if (email.length == 0) {
    	alert('Ingrese su email');
        return false;
    }
    return true;
}

function validacion3() {
    t_nombre = document.getElementById("t_nombre").value;
    t_apellido = document.getElementById("t_apellido").value;
    t_sexo = document.getElementById("t_sexo").value;
    t_fecha_nac = document.getElementById("t_fecha_nac").value;
    t_edad = document.getElementById("t_edad").value;
    t_pais = document.getElementById("t_pais").value;
    t_estado = document.getElementById("t_estado").value;
    t_ciudad = document.getElementById("t_ciudad").value;
    t_direccion = document.getElementById("t_direccion").value;
    t_colonia = document.getElementById("t_colonia").value;
    t_cp = document.getElementById("t_cp").value;
    t_telefono = document.getElementById("t_telefono").value;
    t_email = document.getElementById("t_email").value;
    t_parentesco = document.getElementById("t_parentesco").value;

	if (t_nombre.length == 0) {
    	alert('Ingrese su nombre');
        return false;
    }
    if (t_apellido.length == 0) {
    	alert('Ingrese su apellido');
        return false;
    }
    if (t_sexo.length == 0) {
    	alert('Seleccione su sexo');
        return false;
    }
    if (t_fecha_nac == "") {
    	alert('Ingrese su fecha de nacimiento');
        return false;
    }
    if (t_pais.length == 0) {
    	alert('Seleccione su país');
        return false;
    }
    if (t_estado.length == 0) {
    	alert('Seleccione su estado');
        return false;
    }
    if (t_ciudad.length == 0) {
    	alert('Seleccione su ciudad o localidad');
        return false;
    }
    if (t_direccion.length == 0) {
    	alert('Ingrese su dirección');
        return false;
    }
    if (t_colonia.length == 0) {
    	alert('Ingrese su colonia');
        return false;
    }
    if (t_cp.length == 0) {
    	alert('Ingrese su código postal');
        return false;
    }
    if (t_telefono.length == 0) {
    	alert('Ingrese su teléfono');
        return false;
    }
    if (t_email.length == 0) {
    	alert('Ingrese su email');
        return false;
    }
    if (t_parentesco.length == 0) {
    	alert('Ingrese su parentesco');
        return false;
    }
    return true;
}

function validacion4() {
    
    porque = document.getElementById("porque").value;
    medio_difusion = document.getElementById("medio_difusion").value;
    adjunto1 = document.getElementById("adjunto1").value;
    adjunto2 = document.getElementById("adjunto2").value;
    adjunto3 = document.getElementById("adjunto3").value;
    peticion = document.getElementById("peticion").value;
    vinculacion = document.getElementById("vinculacion").value;

	if (porque == "") {
    	alert('Cuéntanos porque la necesitas');
        return false;
    }
    if (medio_difusion == "") {
    	alert('Menciona la forma por la que te enteraste de nosotros');
        return false;
    }
    
    if (adjunto1 == "" && adjunto2 == "" && adjunto3 == "") {
            alert('Ingrese por lo menos una imagen o vídeo de usted.');
            return false;
    }
    
    if (adjunto1 != "" && document.getElementById("adjunto1").files[0].size > 1024*1024*20) {
    	alert("Tamaño de adjunto 1 excedido");
    	return false;
    }
    if (adjunto2 != "" && document.getElementById("adjunto2").files[0].size > 1024*1024*20) {
    	alert("Tamaño de adjunto 2 excedido");
    	return false;
    }
    if (adjunto3 != "" && document.getElementById("adjunto3").files[0].size > 1024*1024*20) {
    	alert("Tamaño de adjunto 3 excedido");
    	return false;
    }
    if (vinculacion === '') {
    	alert("Seleccione su metodo de vinculacion");
    	return false;
    }
    return true;
}



function calcularEdad(fecha) {
    if(validate_fecha(fecha)==true)
    {
        // Si la fecha es correcta, calculamos la edad
        var values=fecha.split("-");
        var dia = values[2];
        var mes = values[1];
        var ano = values[0];
 
        // cogemos los valores actuales
        var fecha_hoy = new Date();
        var ahora_ano = fecha_hoy.getYear();
        var ahora_mes = fecha_hoy.getMonth()+1;
        var ahora_dia = fecha_hoy.getDate();
 
        // realizamos el calculo
        var edad = (ahora_ano + 1900) - ano;
        if ( ahora_mes < mes ) {
            edad--;
        }
        if ((mes == ahora_mes) && (ahora_dia < dia)) {
            edad--;
        }
        if (edad > 1900) {
            edad -= 1900;
        }
 
        // calculamos los meses
        var meses=0;
        if(ahora_mes>mes)
            meses=ahora_mes-mes;
        if(ahora_mes<mes)
            meses=12-(mes-ahora_mes);
        if(ahora_mes==mes && dia>ahora_dia)
            meses=11;
 
        // calculamos los dias
        var dias=0;
        if(ahora_dia>dia)
            dias=ahora_dia-dia;
        if(ahora_dia<dia) {
            ultimoDiaMes=new Date(ahora_ano, ahora_mes, 0);
            dias=ultimoDiaMes.getDate()-(dia-ahora_dia);
        }
 
        document.getElementById("result").innerHTML="Tienes "+edad+" años, "+meses+" meses y "+dias+" días";
    }
    else{
        document.getElementById("result").innerHTML="La fecha "+fecha+" es incorrecta";
    }
}

function validate_fecha(fecha) {
    var patron=new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");
 
    if(fecha.search(patron)==0) {
        var values=fecha.split("-");
        if(isValidDate(values[2],values[1],values[0])) {
            return true;
        }
    }
    return false;
}

function isValidDate(day,month,year) {
    var dteDate;
    month=month-1;
    dteDate=new Date(year,month,day);
    return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));
}