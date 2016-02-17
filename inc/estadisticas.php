<?php
include ("db_config.php");

$mysqli = mysqli_connect(SERVER, USER, PASS, DB);

mysqli_set_charset($mysqli, "utf8");

$query_od = mysqli_query($mysqli, "SELECT solicitud.id, solicitud.folio, solicitud.peticion, solicitud.descripcion,
									beneficiario_solicitud.nombre, beneficiario_solicitud.apellido, beneficiario_solicitud.sexo, beneficiario_solicitud.edad, beneficiario_solicitud.pais, beneficiario_solicitud.estado
									FROM
									solicitud INNER JOIN beneficiario_solicitud ON solicitud.id = beneficiario_solicitud.id_solicitud
									where beneficiario_solicitud.pais != ''
									&& (folio LIKE 'OD%')");
$num_od = mysqli_num_rows($query_od);

$query_ca = mysqli_query($mysqli, "SELECT solicitud.id, solicitud.folio, solicitud.peticion, solicitud.descripcion,
									beneficiario_solicitud.nombre, beneficiario_solicitud.apellido, beneficiario_solicitud.sexo, beneficiario_solicitud.edad, beneficiario_solicitud.pais, beneficiario_solicitud.estado
									FROM
									solicitud INNER JOIN beneficiario_solicitud ON solicitud.id = beneficiario_solicitud.id_solicitud
									where beneficiario_solicitud.pais != ''
									&& (folio LIKE 'CA%')");
$num_ca = mysqli_num_rows($query_ca);

$query_p = mysqli_query($mysqli, "SELECT solicitud.id, solicitud.folio, solicitud.peticion, solicitud.descripcion,
									beneficiario_solicitud.nombre, beneficiario_solicitud.apellido, beneficiario_solicitud.sexo, beneficiario_solicitud.edad, beneficiario_solicitud.pais, beneficiario_solicitud.estado
									FROM
									solicitud INNER JOIN beneficiario_solicitud ON solicitud.id = beneficiario_solicitud.id_solicitud
									where beneficiario_solicitud.pais != ''
									&& solicitud.peticion = 'Protesis'");
$num_p = mysqli_num_rows($query_p);

$query_psi = mysqli_query($mysqli, "SELECT solicitud.id, solicitud.folio, solicitud.peticion, solicitud.descripcion,
									beneficiario_solicitud.nombre, beneficiario_solicitud.apellido, beneficiario_solicitud.sexo, beneficiario_solicitud.edad, beneficiario_solicitud.pais, beneficiario_solicitud.estado
									FROM
									solicitud INNER JOIN beneficiario_solicitud ON solicitud.id = beneficiario_solicitud.id_solicitud
									where beneficiario_solicitud.pais != ''
									&& solicitud.descripcion = 'Superior Izquierda'");
$num_psi = mysqli_num_rows($query_psi);

$query_psd = mysqli_query($mysqli, "SELECT solicitud.id, solicitud.folio, solicitud.peticion, solicitud.descripcion,
									beneficiario_solicitud.nombre, beneficiario_solicitud.apellido, beneficiario_solicitud.sexo, beneficiario_solicitud.edad, beneficiario_solicitud.pais, beneficiario_solicitud.estado
									FROM
									solicitud INNER JOIN beneficiario_solicitud ON solicitud.id = beneficiario_solicitud.id_solicitud
									where beneficiario_solicitud.pais != ''
									&& solicitud.descripcion = 'Superior Derecha'");
$num_psd = mysqli_num_rows($query_psd);

$query_pii = mysqli_query($mysqli, "SELECT solicitud.id, solicitud.folio, solicitud.peticion, solicitud.descripcion,
									beneficiario_solicitud.nombre, beneficiario_solicitud.apellido, beneficiario_solicitud.sexo, beneficiario_solicitud.edad, beneficiario_solicitud.pais, beneficiario_solicitud.estado
									FROM
									solicitud INNER JOIN beneficiario_solicitud ON solicitud.id = beneficiario_solicitud.id_solicitud
									where beneficiario_solicitud.pais != ''
									&& solicitud.descripcion = 'Inferior Izquierda'");
$num_pii = mysqli_num_rows($query_pii);

$query_pid = mysqli_query($mysqli, "SELECT solicitud.id, solicitud.folio, solicitud.peticion, solicitud.descripcion,
									beneficiario_solicitud.nombre, beneficiario_solicitud.apellido, beneficiario_solicitud.sexo, beneficiario_solicitud.edad, beneficiario_solicitud.pais, beneficiario_solicitud.estado
									FROM
									solicitud INNER JOIN beneficiario_solicitud ON solicitud.id = beneficiario_solicitud.id_solicitud
									where beneficiario_solicitud.pais != ''
									&& solicitud.descripcion = 'Inferior Derecha'");
$num_pid = mysqli_num_rows($query_pid);

$query_menores = mysqli_query($mysqli, "SELECT solicitud.id, solicitud.folio, solicitud.peticion, solicitud.descripcion,
									beneficiario_solicitud.nombre, beneficiario_solicitud.apellido, beneficiario_solicitud.sexo, beneficiario_solicitud.edad, beneficiario_solicitud.pais, beneficiario_solicitud.estado
									FROM
									solicitud INNER JOIN beneficiario_solicitud ON solicitud.id = beneficiario_solicitud.id_solicitud
									where beneficiario_solicitud.pais != ''
									&& beneficiario_solicitud.edad < 18");
$num_menores = mysqli_num_rows($query_menores);

$query_mayores = mysqli_query($mysqli, "SELECT solicitud.id, solicitud.folio, solicitud.peticion, solicitud.descripcion,
									beneficiario_solicitud.nombre, beneficiario_solicitud.apellido, beneficiario_solicitud.sexo, beneficiario_solicitud.edad, beneficiario_solicitud.pais, beneficiario_solicitud.estado
									FROM
									solicitud INNER JOIN beneficiario_solicitud ON solicitud.id = beneficiario_solicitud.id_solicitud
									where beneficiario_solicitud.pais != ''
									&& beneficiario_solicitud.edad >= 18");
$num_mayores = mysqli_num_rows($query_mayores);

$query_mujeres = mysqli_query($mysqli, "SELECT solicitud.id, solicitud.folio, solicitud.peticion, solicitud.descripcion,
									beneficiario_solicitud.nombre, beneficiario_solicitud.apellido, beneficiario_solicitud.sexo, beneficiario_solicitud.edad, beneficiario_solicitud.pais, beneficiario_solicitud.estado
									FROM
									solicitud INNER JOIN beneficiario_solicitud ON solicitud.id = beneficiario_solicitud.id_solicitud
									where beneficiario_solicitud.pais != ''
									&& beneficiario_solicitud.sexo = 'F'");
$num_mujeres = mysqli_num_rows($query_mujeres);

$query_hombres = mysqli_query($mysqli, "SELECT solicitud.id, solicitud.folio, solicitud.peticion, solicitud.descripcion,
									beneficiario_solicitud.nombre, beneficiario_solicitud.apellido, beneficiario_solicitud.sexo, beneficiario_solicitud.edad, beneficiario_solicitud.pais, beneficiario_solicitud.estado
									FROM
									solicitud INNER JOIN beneficiario_solicitud ON solicitud.id = beneficiario_solicitud.id_solicitud
									where beneficiario_solicitud.pais != ''
									&& beneficiario_solicitud.sexo = 'M'");
$num_hombres = mysqli_num_rows($query_hombres);

$query_paises = mysqli_query($mysqli, "SELECT beneficiario_solicitud.pais, paises.nombre, count(*) as cantidadporpais FROM `beneficiario_solicitud` inner join paises on beneficiario_solicitud.pais = paises.id group by pais order by cantidadporpais DESC;");
while($r_pais = $query_paises->fetch_array())
{
	$r_paises[] = $r_pais;
}

$paises = "";
foreach ($r_paises as $pais) {
	$paises .= "['" .  $pais["nombre"] . "', " . $pais["cantidadporpais"] ."],\n";
	}

$query_estados = mysqli_query($mysqli, "SELECT beneficiario_solicitud.estado, regiones.nombre, count(*) as cantidadporestado FROM `beneficiario_solicitud` inner join regiones on beneficiario_solicitud.estado = regiones.id where beneficiario_solicitud.pais= 42 group by estado order by cantidadporestado DESC;");
while($r_estado = $query_estados->fetch_array())
{
	$r_estados[] = $r_estado;
}

$estados = "";
foreach ($r_estados as $estado) {
	$estados .= "['" .  $estado["nombre"] . ", Mexico', '". $estado["nombre"].", Solicitudes: " . $estado["cantidadporestado"] ."'],\n";
	}




$total = $num_od + $num_ca + $num_psi + $num_psd + $num_pii + $num_pid;
$total_p =  $num_psi + $num_psd + $num_pii + $num_pid;


?>


