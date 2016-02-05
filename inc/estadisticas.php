<?php
include ("db_config.php");

$mysqli = mysqli_connect(SERVER, USER, PASS, DB);

mysqli_set_charset($mysqli, "utf8");

$query_od = mysqli_query($mysqli, "SELECT * FROM solicitud where peticion = 'Otro Dispositivo'");
$num_od = mysqli_num_rows($query_od);

$query_ca = mysqli_query($mysqli, "SELECT * FROM solicitud where peticion = 'Colchon Antiescaras'");
$num_ca = mysqli_num_rows($query_ca);

$query_p = mysqli_query($mysqli, "SELECT * FROM solicitud where peticion = 'Protesis'");
$num_p = mysqli_num_rows($query_p);

$query_psi = mysqli_query($mysqli, "SELECT * FROM solicitud where descripcion = 'Superior Izquierda'");
$num_psi = mysqli_num_rows($query_psi);

$query_psd = mysqli_query($mysqli, "SELECT * FROM solicitud where descripcion = 'Superior Derecha'");
$num_psd = mysqli_num_rows($query_psd);

$query_pii = mysqli_query($mysqli, "SELECT * FROM solicitud where descripcion = 'Inferior Izquierda'");
$num_pii = mysqli_num_rows($query_pii);

$query_pid = mysqli_query($mysqli, "SELECT * FROM solicitud where descripcion = 'Inferior Derecha'");
$num_pid = mysqli_num_rows($query_pid);

$query_menores = mysqli_query($mysqli, "SELECT * FROM beneficiario_solicitud where edad < 18");
$num_menores = mysqli_num_rows($query_menores);

$query_mayores = mysqli_query($mysqli, "SELECT * FROM beneficiario_solicitud where edad >= 18");
$num_mayores = mysqli_num_rows($query_mayores);

$query_mujeres = mysqli_query($mysqli, "SELECT * FROM beneficiario_solicitud where sexo = 'F'");
$num_mujeres = mysqli_num_rows($query_mujeres);

$query_hombres = mysqli_query($mysqli, "SELECT * FROM beneficiario_solicitud where sexo = 'M'");
$num_hombres = mysqli_num_rows($query_hombres);

$query_paises = mysqli_query($mysqli, "SELECT beneficiario_solicitud.pais, paises.nombre, count(*) as cantidadporpais FROM `beneficiario_solicitud` inner join paises on beneficiario_solicitud.pais = paises.id group by pais order by cantidadporpais DESC;");
while($r_pais = $query_paises->fetch_array())
{
	$r_paises[] = $r_pais;
}

$paises = "";
foreach ($r_paises as $pais) {
	$paises .= $pais["cantidadporpais"] ." son de ". $pais["nombre"] . "<br>";
	}

$query_estados = mysqli_query($mysqli, "SELECT beneficiario_solicitud.estado, regiones.nombre, count(*) as cantidadporestado FROM `beneficiario_solicitud` inner join regiones on beneficiario_solicitud.estado = regiones.id where beneficiario_solicitud.pais= 42 group by estado order by cantidadporestado DESC;");
while($r_estado = $query_estados->fetch_array())
{
	$r_estados[] = $r_estado;
}

$estados = "";
foreach ($r_estados as $estado) {
	$estados .= $estado["cantidadporestado"] ." son de ". $estado["nombre"] . "<br>";
	}




$total = $num_od + $num_ca + $num_psi + $num_psd + $num_pii + $num_pid;
$total_p =  $num_psi + $num_psd + $num_pii + $num_pid;



$mensaje = "
Total de solicitudes ".$total." <br>
Divididos de la siguiente manera: <br>
Colchón anti escaras ".$num_ca." <br>
Otro dispositivo ".$num_od." <br> 
Prótesis Total ".$total_p.", de las cuales están divididos de la siguiente manera: <br>
Pierna derecha ".$num_pid." <br>
Pierna izquierda ".$num_pii." <br>
Brazo derecho ".$num_psd." <br>
Brazo izquierdo ".$num_psi." <br>
<br>
Del total: <br>
". $num_menores ." son menores <br>
". $num_mayores ." son adultos <br>
<br>
".$num_mujeres." son mujeres <br>
".$num_hombres." son hombres <br>
<br>
Divididos en los siguientes paises<br>"
. $paises
."<br>
Y de los estados de Mexico de la siguiente manera: <br>
".$estados."
";

?>


