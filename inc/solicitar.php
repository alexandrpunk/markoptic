<?php

include ("db_config.php");

if(DEBUG == "true"){
    ini_set('display_errors', 1);
}else{
    ini_set('display_errors', 0);
}


    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
    $rfc = filter_var($_POST['rfc'], FILTER_SANITIZE_STRING);
    $monto = filter_var($_POST['monto'], FILTER_SANITIZE_NUMBER_FLOAT);
    $referencia = filter_var($_POST['referencia'], FILTER_SANITIZE_NUMBER_INT);
    $comentario = filter_var($_POST['comentario'], FILTER_SANITIZE_STRING);

/* CONECTAR CON BASE DE DATOS ****************/
$con = mysqli_connect(SERVER, USER, PASS, DB);

if (!$con){die("ERROR DE CONEXION CON MYSQL:". mysql_error());}


//se guarda la informacion
$sql = "INSERT INTO Donativos (nombre,email,direccion,rfc,monto,referencia,comentario) VALUES ('".$nombre."', '".$email."', '".$direccion."', '".$rfc."', '".$monto."', '".$referencia."', '".$comentario."');";


$result = mysqli_query($con, $sql);

if (! $result){
echo "Hubo un error en la suscripcion.".mysql_error();
exit();
}else {
echo "Gacias por suscribirse le mantendremos informado";
}
 
$titulo = 'Fundacion Markoptic - Gracias por tu Donativo';
// Cuerpo o mensaje
$mensaje = '
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Gracias por su Donativo</title>
</head>
<body>
<h1>¡MUCHAS GRACIAS POR TU DONATIVO!</h1>
<p>Estimado(a) '.$nombre.'</p>
<p>Agradecemos tu donativo, el cual nos ayudara a "ayudar" a las personas que lo necesitan</p>
</body>
</html>
';

// Cabecera que especifica que es un HMTL
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Cabeceras adicionales
$cabeceras .= 'From: Donativo Fundacion Markoptic <donativo@fundacionmarkoptic.org.mx>' . "\r\n";
// enviamos el correo!
mail($email, $titulo, $mensaje, $cabeceras);
 echo $mensaje;

?>
 