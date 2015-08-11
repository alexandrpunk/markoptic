<?php

//Esta linea es para incluir el archivo con las variables

include ("./inc/variables.php");

/* CONECTAR CON BASE DE DATOS **************** */
$con = mysql_connect(HOSTNAME,USER,PASS);

if (!$con){die("ERROR DE CONEXION CON MYSQL:". mysql_error());}

/* ********************************************** */

/* CONECTA CON LA BASE DE DATOS  **************** */

$database = mysql_select_db("suscripcion",$con);

if (!$database){die("ERROR CONEXION CON BD:".mysql_error());}

/* ********************************************** */

//REALIZAR CONSULTA

$sql = "INSERT INTO suscripcion (nombre,apellido,correo) VALUES ('".$_POST['nombre']."', '".$_POST['apellido']."', '".$_POST['email']."');";


$result = mysql_query($sql);

if (! $result){

echo "Hubo un error en la suscripcion.".mysql_error();

exit();

}else {
echo "Gacias por suscribirse le mantendremos informado";

}

?>
