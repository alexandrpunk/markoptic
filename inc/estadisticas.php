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

//consultas para mostrar los estados  y paises en el mapa ->>	

$query_estados2 = mysqli_query($mysqli, "SELECT beneficiario_solicitud.estado, regiones.nombre, count(*) as cantidadporestado FROM `beneficiario_solicitud` inner join regiones on beneficiario_solicitud.estado = regiones.id where beneficiario_solicitud.pais= 42 group by estado order by cantidadporestado DESC;");
while($r_estado2 = $query_estados2->fetch_array())
{
	$r_estados2[] = $r_estado2;
}

$estados2 = "";
foreach ($r_estados2 as $estado2) {
	$estados2 .= "['" .  $estado2["nombre"] . ", Mexico', 'Solicitudes: " . $estado2["cantidadporestado"] ."'],\n";
	}

$query_paises2 = mysqli_query($mysqli, "SELECT beneficiario_solicitud.pais, paises.nombre, count(*) as cantidadporpais FROM `beneficiario_solicitud` inner join paises on beneficiario_solicitud.pais = paises.id group by pais order by cantidadporpais DESC;");
while($r_pais2 = $query_paises2->fetch_array())
{
	$r_paises2[] = $r_pais2;
}

$paises2 = "";
foreach ($r_paises2 as $pais2) {
	$paises2 .= "['" .  $pais2["nombre"] . "', " . $pais2["cantidadporpais"] ."],\n";
	}




$total = $num_od + $num_ca + $num_psi + $num_psd + $num_pii + $num_pid;
$total_p =  $num_psi + $num_psd + $num_pii + $num_pid;


?>


