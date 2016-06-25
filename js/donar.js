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